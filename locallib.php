<?php

/**
 * Library for the local plugin vlacsguardiansurvey
 *
 * @package    local_vlacsguardiansurvey
 * @copyright  2014 VLA
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @author     Jerome Mouneyrac <jerome@mouneyrac.com>
 */

defined('MOODLE_INTERNAL') || die();

// Load the specific $CFG attribut specific to vlacsguardiansurvey local plugin.
require_once($CFG->dirroot . '/local/vlacsguardiansurvey/config.php');

/**
 * Ask the guardian to answer the exit survey.
 * This function create the survey if it doesn't exist, and send an email to the guardian if an email
 * have not been sent the last X days...
 * It is most likely that this function is trigger by a web service call from VLA Moodle site.
 */
function ask_guardian_to_answer_exit_survey($surveyrequestinfo) {
    global $DB, $CFG;

    // If the guardian user doesn't exist (check the username/email) then we create it on this site.
    // We need username, email, first name, last name, city, country (sent in the ws params)
    // Set the authentication to external database.
    $guardian = $DB->get_record('user', array('username' => $surveyrequestinfo['guardianusername'],
        'email' => $surveyrequestinfo['guardianemail']));
    if (empty($guardian)) {
        // create the guardian in the database.
        $guardian = new stdClass();
        $guardian->username = $surveyrequestinfo['guardianusername'];
        $guardian->firstname = $surveyrequestinfo['guardianfirstname'];
        $guardian->lastname = $surveyrequestinfo['guardianlastname'];
        $guardian->email = $surveyrequestinfo['guardianemail'];
        $guardian->country = $surveyrequestinfo['guardiancountry'];
        $guardian->city = $surveyrequestinfo['guardiancity'];
        $guardian->confirmed = 1;
        $guardian->auth = 'db';
        $guardian->mnethostid = 1;
        require_once($CFG->dirroot . '/user/lib.php');
        $surveyrequestinfo['guardianid'] = user_create_user($guardian);
    } else {
        $surveyrequestinfo['guardianid'] = $guardian->id;
    }

    // Enrol the guardian in the course if he is not already enrolled.
    enrol_guardian($surveyrequestinfo);

    // Check if the guardian has a exit survey already assigned for the specific enrolment.
    // Reminder: each guardian must answer the exit survey for each enrolment.
    //           However in the Moodle site there is only one feedback activity
    //           for all the exit guardian survey!
    //           We save each guardian feedback submissions into the guardiansurvey table with the
    //           help of a Moodle Session variable and the Moodle Event system.
    $guardiansurvey = $DB->get_record('guardiansurvey',
        array('enrolmentid' => $surveyrequestinfo['enrolmentid']));

    if (empty($guardiansurvey)) {
        // Save the enrolment information into into the guardiansurvey table.
        $surveyrequestinfo['id'] = $DB->insert_record('guardiansurvey', $surveyrequestinfo);

        // Sent email to guardian.
        send_email_to_guardian($surveyrequestinfo);

    } else {
        // If the email has been sent more than 30 days (2592000 seconds) ago resend it.
        if ((time() - $guardiansurvey->emailsentdate) > 2592000) {
                $surveyrequestinfo['id'] = $guardiansurvey->id;
                send_email_to_guardian($surveyrequestinfo);
        }
    }
}

/**
 * Enrol the guardian into the survey course if he's not already enrolled.
 *
 * @param $surveyrequestinfo
 * @throws moodle_exception
 */
function enrol_guardian($surveyrequestinfo){
    global $CFG, $DB;

    $surveycourseid = get_config('local_vlacsguardiansurvey', 'courseid');

    // First we retrieve the courses where the user is enrolled in Moodle.
    $enrolledcourses = enrol_get_users_courses($surveyrequestinfo['guardianid'], true,
        'id, shortname, fullname, idnumber, visible');

    if (empty($enrolledcourses[$surveycourseid])) {

        // Check manual enrolment plugin instance is enabled/exist.
        $instance = null;
        $enrolinstances = enrol_get_instances($surveycourseid, true);
        foreach ($enrolinstances as $courseenrolinstance) {
            if ($courseenrolinstance->enrol == "manual") {
                $instance = $courseenrolinstance;
                break;
            }
        }
        if (empty($instance)) {
            $errorparams = new stdClass();
            $errorparams->courseid = $surveycourseid;
            throw new moodle_exception('nomanualenrolinstance',
                'local_vlacsguardiansurvey', $errorparams);
        }

        // The enrolment info.
        $guardianrole = $DB->get_record('role', array('shortname' => $CFG->surveyguardianrole));
        $enrolment = array();
        $enrolment['userid'] = $surveyrequestinfo['guardianid'];
        $enrolment['roleid'] = $guardianrole->id;
        $enrolment['courseid'] = $surveycourseid;
        $enrolment['timestart'] = isset($enrolment['timestart']) ? $enrolment['timestart'] : 0;
        $enrolment['timeend'] = isset($enrolment['timeend']) ? $enrolment['timeend'] : 0;
        $enrolment['status'] = (isset($enrolment['suspend']) && !empty($enrolment['suspend'])) ?
            ENROL_USER_SUSPENDED : ENROL_USER_ACTIVE;

        // Check that the plugin accept enrolment (it should always the case).
        $enrol = enrol_get_plugin('manual');
        if (!$enrol->allow_enrol($instance)) {
            $errorparams = new stdClass();
            $errorparams->roleid = $enrolment['roleid'];
            $errorparams->courseid = $enrolment['courseid'];
            $errorparams->userid = $enrolment['userid'];
            throw new moodle_exception('cannotenrol', 'enrol_manual', '', $errorparams);
        }

        // Finally enrol the guardian in the course.
        $enrol->enrol_user($instance, $enrolment['userid'], $enrolment['roleid'],
            $enrolment['timestart'], $enrolment['timeend'], $enrolment['status']);
    }
}

/**
 * Sent email to guardian.
 *
 * @param $surveyrequestinfo
 */
function send_email_to_guardian($surveyrequestinfo) {
    global $CFG, $DB;

    $guardian = $DB->get_record('user', array('username' => $surveyrequestinfo['guardianusername'],
        'email' => $surveyrequestinfo['guardianemail']));
    $userfrom = get_admin();

    $strparams = new stdClass();
    $strparams->studentfullname = $surveyrequestinfo['studentfullname'];
    $strparams->coursefullname = $surveyrequestinfo['coursename'];
    $strparams->surveyurl = $CFG->wwwroot . '/local/vlacsguardiansurvey/index.php';
    $strparams->surveylink = html_writer::link($strparams->surveyurl,
        get_string('guardianemailsurveyname', 'local_vlacsguardiansurvey'));

    $subject = get_string('guardianemailsubject', 'local_vlacsguardiansurvey', $strparams);
    $messagetext = get_string('guardianemailmessagetext', 'local_vlacsguardiansurvey', $strparams);
    $messagehtml = get_string('guardianemailmessagehtml', 'local_vlacsguardiansurvey', $strparams);

    // Not used yet - maybe VLACS want to add a file or a special email address to reply too.
    $attachment = '';
    $attachname = '';
    $usetrueaddress = true;
    $replyto = '';
    $replytoname = '';

    email_to_user($guardian, $userfrom, $subject, $messagetext,
        $messagehtml, $attachment, $attachname, $usetrueaddress, $replyto, $replytoname);

    // Mark the exit survey as sent to the guardian for the specific enrolment.
    $surveyrequestinfo['emailsentdate'] = time();
    $DB->update_record('guardiansurvey', $surveyrequestinfo);
}

/**
 * Display the course name/completed date/student name on the survey by CSS.
 * Offer a link to pick a different survey.
 * This is used in case the student access the url and so no guardiansurvey table id where saved into the user session
 * (or if the wrong id is saved)
 */
function display_survey_info() {

}

/**
 * Saved the survey submission id into the guardiansurvey table  (looking a the guardiansurvey id saved in the session)
 */
function survey_is_submitted() {

}

/**
 * Create the survey from the surveydata file.
 * mainly called for installation/development/testing.
 */
function create_survey_from_surveydata_file() {
    global $CFG, $DB;

    // Check if the survey is not already created.
    $surveyid = get_config('local_vlacsguardiansurvey', 'feedbackid');
    $surveycourseid = get_config('local_vlacsguardiansurvey', 'courseid');

    if (empty($surveyid)) {
        $course = $DB->get_record('course', array('id' => $surveycourseid));

        // If course doesn't exist, then ww need to create it (for behat/phpunit tests).
        if (empty($course)) {
            require_once($CFG->dirroot . '/course/lib.php');
            $course = new stdClass();
            $course->fullname = 'VLA surveys';
            $course->shortname = 'VLAsurveys';
            $course->category = 1;
            $course->format = 'topics';
            $course->visible = 1;
            $course = create_course($course);
            // Overwrite the wrong course id.
            set_config('courseid', $course->id, 'local_vlacsguardiansurvey');
        }

        // Add the feedback (the guardian survey in VLACS term) activity.
        $moduleinfo = new stdClass();
        $moduleinfo->module = 7;
        $moduleinfo->modulename = 'feedback';
        $moduleinfo->groupmode = 0;
        $moduleinfo->groupingid = null;
        $moduleinfo->groupmembersonly = null;
        $moduleinfo->introeditor['text'] = 'this is an intro';
        $moduleinfo->introeditor['format'] = FORMAT_HTML;
        $moduleinfo->visible = 1;
        $moduleinfo->section = 1;
        $moduleinfo->name = 'Exit Guardian Survey (VLACS)';
        $moduleinfo->description = 'Exit Guardian Survey';
        $moduleinfo->timeopen = 0;
        $moduleinfo->timeclose = 0;
        $siteaftersubmit = new moodle_url($CFG->wwwroot . '/local/vlacsguardiansurvey/index.php', array());
        $moduleinfo->site_after_submit = $siteaftersubmit->out();
        $moduleinfo->page_after_submit = 'Thank you';
        // Hack to bypass draft processing of feedback_add_instance.
        $moduleinfo->introeditor['itemid'] = false;
        $moduleinfo->page_after_submit_editor['itemid'] = false;
        $moduleinfo->page_after_submit_editor['text'] = $moduleinfo->page_after_submit;
        $moduleinfo->page_after_submit_editor['format'] = FORMAT_HTML;
        require_once($CFG->dirroot . '/course/modlib.php');
        $moduleinfo = add_moduleinfo($moduleinfo, $course, null);

        // Save the moduleinfo id.
        set_config('feedbackid', $moduleinfo->id, 'local_vlacsguardiansurvey');

        // Add the survey questions to the feedback activity.
        $itemposition = 0;
        require_once($CFG->dirroot . '/local/vlacsguardiansurvey/surveydata.php');
        foreach ($surveydata as $setofquestions) {
            // Add questions set break.
            $item = new stdClass();
            $item->typ = 'label';
            $item->feedback = $moduleinfo->id;
            $item->name = $setofquestions->name;
            $item->presentation = '<p><b>' . $setofquestions->name . '</b></p>';
            $itemposition = $itemposition + 1;
            $item->position = $itemposition;
            $DB->insert_record('feedback_item', $item);

            // Add the questions set to the feedback activity.
            foreach($setofquestions->questions as $question) {
                $item = new stdClass();
                switch ($question->type) {
                    case 'yesno':
                    case 'list':
                        if ($question->type == 'yesno') {
                            $answers = array('yes', 'no');
                        } else {
                            $answers = $question->list;
                        }

                        $firstanswer = true;
                        $item->presentation = '';
                        foreach($answers as $answer) {
                            if ($firstanswer) {
                                $firstanswer = false;
                                $item->presentation = 'r>>>>>' . $answer;
                            } else {
                                $item->presentation .= '
                                |' . $answer;
                            }
                        }
                        $item->typ = 'multichoice';
                        break;
                    case 'text':
                        $item->presentation = '60|5'; // 60 character width, 5 rows.
                        $item->typ = 'textarea';
                        break;
                    default :
                        throw new coding_exception('The surveydata question type "'.$question->type.'" is not supported');
                        break;
                }
                $item->feedback = $moduleinfo->id;
                $item->name = $question->name;
                $item->hasvalue = 1;
                $itemposition = $itemposition + 1;
                $item->position = $itemposition;
                $item->required = 1;
                $DB->insert_record('feedback_item', $item);
            }
        }
    }
}