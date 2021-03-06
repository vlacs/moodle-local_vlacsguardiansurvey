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
function vlags_ask_guardian_to_answer_exit_survey($surveyrequestinfo) {
    global $DB, $CFG;

    // If the guardian user doesn't exist then we create it on this site.
    // We need username, email, first name, last name, city, country (sent in the ws params)
    // Set the authentication to external database.
    $tmp = $DB->get_record('user', array('username' => $surveyrequestinfo['guardianusername']));
    if (empty($tmp)) {
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
        $guardian = $tmp;
        $guardian->firstname = $surveyrequestinfo['guardianfirstname'];
        $guardian->lastname = $surveyrequestinfo['guardianlastname'];
        $guardian->email = $surveyrequestinfo['guardianemail'];
        $guardian->country = $surveyrequestinfo['guardiancountry'];
        $guardian->city = $surveyrequestinfo['guardiancity'];
        $DB->update_record('user', $guardian);
        $surveyrequestinfo['guardianid'] = $guardian->id;
    }

    // Enrol the guardian in the course if he is not already enrolled.
    vlags_enrol_guardian($surveyrequestinfo);

    // Check if the guardian has a exit survey already assigned for the specific enrolment.
    // Reminder: each guardian must answer the exit survey for each enrolment.
    //           However in the Moodle site there is only one feedback activity
    //           for all the exit guardian survey!
    //           We save each guardian feedback submissions into the guardiansurvey table with the
    //           help of a Moodle Session variable and the Moodle Event system.
    $guardiansurvey = $DB->get_record('guardiansurvey',
        array(
            'enrolmentid' => $surveyrequestinfo['enrolmentid'],
            'guardianid' => $surveyrequestinfo['guardianid']
        ));

    if (empty($guardiansurvey)) {
        // Save the enrolment information into into the guardiansurvey table.
        $surveyrequestinfo['id'] = $DB->insert_record('guardiansurvey', $surveyrequestinfo);

        // Sent email to guardian.
        vlags_send_email_to_guardian($surveyrequestinfo);

    } else {
        // If the email has been sent more than 30 days (2592000 seconds) ago resend it.
        if ((time() - $guardiansurvey->emailsentdate) > 2592000) {
                $surveyrequestinfo['id'] = $guardiansurvey->id;
                vlags_send_email_to_guardian($surveyrequestinfo);
        }
    }
}

/**
 * Enrol the guardian into the survey course if he's not already enrolled.
 *
 * @param $surveyrequestinfo
 * @throws moodle_exception
 */
function vlags_enrol_guardian($surveyrequestinfo){
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
function vlags_send_email_to_guardian($surveyrequestinfo) {
    global $CFG, $DB;

    $guardian = $DB->get_record('user', array('username' => $surveyrequestinfo['guardianusername']));

    // Hack to ignore guardians who requested to not received any email anymore about the guardian survey.
    // List of guardian currently bypassed: jbruno4.
    if ($guardian->id == 76686 ) {
        return '';
    }

    $userfrom = get_admin();

    $strparams = new stdClass();
    $strparams->studentfullname = $surveyrequestinfo['studentfullname'];
    $strparams->coursefullname = $surveyrequestinfo['coursename'];
    $strparams->guardianfirstname = $surveyrequestinfo['guardianfirstname'];
    $strparams->guardianlastname = $surveyrequestinfo['guardianlastname'];
    $strparams->surveyurl = $CFG->wwwroot . '/local/vlacsguardiansurvey/index.php?authtoken=' . vlags_generate_auth_token($surveyrequestinfo);
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
 * Sent reminder to guardian.
 *
 * @param $surveyrequestinfo
 */
function vlags_send_reminder_to_guardian($surveyrequestinfo) {
    global $CFG, $DB;

    $surveyrequestinfo = (array) $surveyrequestinfo;

    $guardian = $DB->get_record('user', array('id' => $surveyrequestinfo['guardianid']));

    // Hack to ignore guardians who requested to not received any email anymore about the guardian survey.
    // List of guardian currently bypassed: jbruno4.
    if ($guardian->id == 76686 ) {
        return '';
    }

    $userfrom = get_admin();

    $strparams = new stdClass();
    $strparams->studentfullname = $surveyrequestinfo['studentfullname'];
    $strparams->coursefullname = $surveyrequestinfo['coursename'];
    $strparams->guardianlastname = $guardian->lastname;
    $strparams->guardianfirstname = $guardian->firstname;
    $strparams->surveyurl = $CFG->wwwroot . '/local/vlacsguardiansurvey/index.php?authtoken=' . vlags_generate_auth_token($surveyrequestinfo);
    $strparams->surveylink = html_writer::link($strparams->surveyurl,
        get_string('guardianemailsurveyname', 'local_vlacsguardiansurvey'));

    // The reminder message is different for the first reminder.
    if ($surveyrequestinfo['remindernumber'] < 1) {
        $subject = get_string('guardianremindersubject', 'local_vlacsguardiansurvey', $strparams);
        $messagetext = get_string('guardianremindermessagetext', 'local_vlacsguardiansurvey', $strparams);
        $messagehtml = get_string('guardianremindermessagehtml', 'local_vlacsguardiansurvey', $strparams);
    } else {
        $subject = get_string('guardiansecondremindersubject', 'local_vlacsguardiansurvey', $strparams);
        $messagetext = get_string('guardiansecondremindermessagetext', 'local_vlacsguardiansurvey', $strparams);
        $messagehtml = get_string('guardiansecondremindermessagehtml', 'local_vlacsguardiansurvey', $strparams);
    }

    // Not used yet - maybe VLACS want to add a file or a special email address to reply too.
    $attachment = '';
    $attachname = '';
    $usetrueaddress = true;
    $replyto = '';
    $replytoname = '';

    email_to_user($guardian, $userfrom, $subject, $messagetext,
        $messagehtml, $attachment, $attachname, $usetrueaddress, $replyto, $replytoname);

    // Mark the reminder as sent to the guardian.
    $surveyrequestinfo['remindersentdate'] = time();
    $surveyrequestinfo['remindernumber'] = $surveyrequestinfo['remindernumber'] + 1;
    $DB->update_record('guardiansurvey', $surveyrequestinfo);
}

/**
 * Return the auth token from guardian survey info.
 * If it doesn't exist then it generates the token and assign it to the guardian survey info passed in parameter.
 * @param $surveyrequestinfo
 * @return string
 */
function vlags_generate_auth_token(&$surveyrequestinfo) {

    // create the auth token if it doesn't exist (it can happen for reminder too that didn't have a token created before the authtoken field was added)
    if (empty($surveyrequestinfo['authtoken'])) {
        $surveyrequestinfo['authtoken'] = md5(uniqid(rand(),1));
    }

    return $surveyrequestinfo['authtoken'];
}

/**
 * Automatically log as guardian if we detect the correct auth token.
 *
 * @throws coding_exception
 * @throws moodle_exception
 */
function vlags_login_as_guardian() {
    global $USER, $DB, $CFG, $SESSION;

    // Detect if there is a auth token.
    if (!empty($SESSION->wantsurl)) {
        $query = parse_url($SESSION->wantsurl, PHP_URL_QUERY);
        parse_str($query, $params);
        if (isset($params['authtoken'])) {
            $authtoken = $params['authtoken'];
            clean_param($authtoken, PARAM_ALPHANUM);
        }
    } else {
        $authtoken = optional_param('authtoken', null, PARAM_ALPHANUM);
    }

    // Only attempt to login as user if a token is mentionned.
    if (!empty($authtoken)) {
        // Retrieve the guardian survey link to the token
        $guardiansurvey = $DB->get_record('guardiansurvey', array('authtoken' => $authtoken), '*', MUST_EXIST);

        // Check the $USER is not a different user if ever the user is loggedin.
        if (isloggedin()) {
            if ($USER->id != $guardiansurvey->guardianid) {
                throw new moodle_exception('erroralreadyloggedin', 'local_vlacsguardiansurvey');
            } else {
                // Already logged in so skipped the rest of the function.
                return;
            }
        }

        // the token must not be referencing an already submitted.
        // the token must not be 2 month old.
        $twomonthsago = mktime(0, 0, 0, date("m") - 2, date("d"), date("Y"));
        if (!empty($guardiansurvey->submissionid) || $guardiansurvey->emailsentdate < $twomonthsago) {
            throw new moodle_exception('errorcannotaccesssurvey', 'local_vlacsguardiansurvey');
        }

        // All is good authentication the user as the guardian.
        $guardianuser = $DB->get_record('user', array('id' => $guardiansurvey->guardianid));
        complete_user_login($guardianuser);

        // Redirect to the vlaguardiansurvey page.
        unset($SESSION->wantsurl);
        redirect($CFG->httpswwwroot . '/local/vlacsguardiansurvey/');
    }

    // Detect if the user is not logged, and in this case redirect to saml20 login page.
    if (is_enabled_auth('vlasaml20') and !isloggedin()) {
        redirect($CFG->httpswwwroot . '/auth/vlasaml20/login.php');
    }
}

function vlags_add_guardian_survey_css() {
    global $PAGE, $USER,  $CFG;

    // When the user is not logged in, set your Moodle site to force login.
    if (isloggedin()) {
        // Only modify the css or redirect if we are not an admin.
        if (!has_capability('moodle/site:config', context_system::instance())) {
            $sitefileurl = $PAGE->url->out_omit_querystring();
            if(strpos($sitefileurl, '/mod/feedback/') === false
                && strpos($sitefileurl, '/local/vlacsguardiansurvey/') === false
                && strpos($sitefileurl, '/login/') === false) {
                // Check that the user is either in the feedback module, either in the local plugin.
                // Otherwise the user is somewhere he should not be.
                redirect($CFG->wwwroot . '/local/vlacsguardiansurvey/index.php');
            } else {
                $PAGE->requires->css(new moodle_url('/local/vlacsguardiansurvey/style.css'));
                return true;
            }
        }
    }

    return false;
}

/**
 * Add the course name/completed date/student name on the survey by CSS.
 * Offer a link to pick a different survey.
 * This is used in case the student access the url and so no guardiansurvey table id where saved into the user session
 * (or if the wrong id is saved)
 */
function vlags_add_guardian_survey_javascript() {
    global $PAGE, $USER,  $CFG;

    $feedbackcmid = get_config('local_vlacsguardiansurvey', 'feedbackcmid');
    // Only add information if we are not an admin AND we are on the correct guardian survey.
    if (!has_capability('moodle/site:config', context_system::instance()) &&
        ($PAGE->url->out_omit_querystring() == $CFG->wwwroot . '/mod/feedback/complete.php')
        && optional_param('id', 0, PARAM_INT) == $feedbackcmid) {

        // Check if are meant to be on a guardian survey (i.e. the guardian click on a survey in the list),
        // otherwise redirect to the survey list.
        $enrolmentid = get_config('local_vlacsguardiansurvey', 'current_survey_for_userid_' . $USER->id);
        if (empty($enrolmentid) and !has_capability('moodle/site:config', context_system::instance())) {
            $redirecturl = new moodle_url($CFG->wwwroot . '/local/vlacsguardiansurvey/index.php');
            redirect($redirecturl);
        }

        // Check if we are the correct guardian.
        $guardiansurvey = vlags_check_enrolment_guardian($enrolmentid);

        // Add information to page url;
        $PAGE->requires->yui_module('moodle-local_vlacsguardiansurvey-survey',
            'M.local_vlacsguardiansurvey.survey.init', array(array('guardiansurvey' => $guardiansurvey)));
        $PAGE->requires->strings_for_js(array(), 'local_vlacsguardiansurvey');
    }
}

/**
 * Saved the survey submission id into the guardiansurvey table  (looking a the guardiansurvey id saved in the session).
 *
 * @param \mod_feedback\event\response_submitted $event
 * @throws moodle_exception
 * @throws coding_exception
 */
function vlags_survey_is_submitted(\mod_feedback\event\response_submitted $event) {
    global $USER, $DB, $CFG;

    // Check if it's the correct user.
    $userid = $event->userid;
    if ($userid != $USER->id) {
        set_config('current_survey_for_userid_' . $USER->id, null, 'local_vlacsguardiansurvey');
        throw new coding_exception('something going wrong with the feedback event system in survey_is_submitted()');
    }

    $eventotherdata = $event->other;
    $cmid = $eventotherdata['cmid'];
    $submissionid = $event->objectid;
    $surveyid = get_config('local_vlacsguardiansurvey', 'feedbackcmid');
    // Only save the submission for the correct feedback activity.
    if ($cmid == $surveyid) {
        // Retrieve the enrolment id from the session.
        $enrolmentid = get_config('local_vlacsguardiansurvey', 'current_survey_for_userid_' . $USER->id);
        if (empty($enrolmentid)) {
            $redirecturl = new moodle_exception($CFG->wwwroot . '/local/vlacsguardiansurvey/index.php');
            throw new moodle_exception('answeredunknownsurvey', 'local_vlacsguardiansurvey', $redirecturl);
        }

        // Check if the user is the guardian and can be redirected to the survey.
        $guardiansurvey = vlags_check_enrolment_guardian($enrolmentid);

        // Mark the survey as answered.
        $guardiansurvey->completeddate = time();
        $guardiansurvey->submissionid = $submissionid;
        $DB->update_record('guardiansurvey', $guardiansurvey);

        // Unset the current survey for the guardian.
        set_config('current_survey_for_userid_' . $USER->id, null, 'local_vlacsguardiansurvey');
    }
}

/**
 * Check the USER is the rightfull guardian of an enrolment and return the guardiansurvey row.
 *
 * @param $enrolmentid
 * @return object the guardiansurvey row
 * @throws moodle_exception
 */
function vlags_check_enrolment_guardian($enrolmentid) {
    global $DB, $CFG, $USER;

    // Check if the user is the guardian and can be redirected to the survey.
    $guardiansurvey = $DB->get_record('guardiansurvey',
        array(
            'enrolmentid' => $enrolmentid,
            'guardianid' => $USER->id,
        ));
    // Check that the $USER is the guardian, otherwise it could be an hack attempt.
    if (empty($guardiansurvey)) {
        set_config('current_survey_for_userid_' . $USER->id, null, 'local_vlacsguardiansurvey');
        $redirecturl = new moodle_exception($CFG->wwwroot . '/local/vlacsguardiansurvey/index.php');
        throw new moodle_exception('unallowedtoanswer', 'local_vlacsguardiansurvey', $redirecturl);
    }

    return $guardiansurvey;
}

/**
 * @param $enrolmentid
 */
function vlags_redirect_to_survey($enrolmentid) {
    global $USER, $CFG;

    // Check if the user is the guardian and can be redirected to the survey.
    vlags_check_enrolment_guardian($enrolmentid);

    // Save the enrolment id into a config.
    set_config('current_survey_for_userid_' . $USER->id, $enrolmentid, 'local_vlacsguardiansurvey');

    // Redirect to the feedback.
    $surveyid = get_config('local_vlacsguardiansurvey', 'feedbackcmid');
    $redirecturl = new moodle_url($CFG->wwwroot . '/mod/feedback/complete.php', array('id' => $surveyid,
    'gopage' => 0));
    redirect($redirecturl);
}

/**
 * Create the survey from the surveydata file.
 * mainly called for installation/development/testing.
 */
function vlags_create_survey_from_surveydata_file() {
    global $CFG, $DB;

    // Check if the survey is not already created.
    $surveyid = get_config('local_vlacsguardiansurvey', 'feedbackcmid');
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
        $moduleinfo->name = 'Exit Parent/Guardian Survey (VLACS)';
        $moduleinfo->description = 'Exit Parent/Guardian Survey';
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
        set_config('feedbackcmid', $moduleinfo->coursemodule, 'local_vlacsguardiansurvey');

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

function vlacs_export_xls($data) {
    global $CFG, $DB;
    static $questions = array();
    require_once("$CFG->libdir/excellib.class.php");
    $filename = clean_filename(gmdate("Ymd_Hi"));
    $filename .= '.xls';

    $filearg = '-';
    $workbook = new MoodleExcelWorkbook($filearg);
    $workbook->send($filename);
    $worksheet = array();
    foreach ($data as $feedbackitemid=>$sheet) {
        $tabname = '';
        if (isset($questions[$feedbackitemid])) {
            $tabname = $questions[$feedbackitemid];
        } else {
            $tabname = $DB->get_field('feedback_item', 'name', array('id'=>$feedbackitemid));
            $questions[$feedbackitemid] = $tabname;
        }
        $excelsheet = $workbook->add_worksheet($tabname);
        // question text in the first row
        $excelsheet->write(0, 0, $tabname);
        $rowno = 1;
        foreach ($sheet as $row) {
            // row
            $colno = 0;
            foreach($row as $col) {
                // col
                $excelsheet->write($rowno, $colno, $col);
                $colno++;
            }
            $rowno++;
        }
        $worksheet[] = $excelsheet;
    }
    $workbook->close();
    return $filename;
}

function local_build_excel_data($sis_user_idstr) {
    global $DB;
    $results = array();
    $sql = "SELECT ve.id, vc.name, gs.guardianid AS userid, gs.enrolmentid AS enrolmentID, fc.id AS completedid
              FROM {feedback_completed} fc
              JOIN {guardiansurvey} AS gs ON gs.submissionid=fc.id
              JOIN {vgs_enrolment} AS ve ON ve.enrolment_idstr=gs.enrolmentid
              JOIN {vgs_course} AS vc ON vc.master_course_idstr=ve.master_course_idstr
             WHERE vc.sis_user_idstr=?";
    $rs = $DB->get_recordset_sql($sql, array($sis_user_idstr));
    $count = 0;
    foreach ($rs as $r) {
        $completedid = $r->completedid;
        $answers = $DB->get_records('feedback_value', array('completed'=>$completedid));
        foreach ($answers as $answer) {
            $feedbackitemid = $answer->item;
            if (empty($scores[$feedbackitemid])) {
                 $scores[$feedbackitemid] = array();
            }
            $index = $answer->value;
            if(is_numeric($index)) {
                if (!isset($results[$feedbackitemid])) {
                    $results[$feedbackitemid] = array();
                }
                if (!isset($results[$feedbackitemid][$index])) {
                    $data = new stdClass;
                    // counter
                    $data->count = 1;
                    $results[$feedbackitemid][$index] = $data;
                } else {
                    $results[$feedbackitemid][$index]->count++;
                }
            } else {
                continue;
            }
        }
        $count++;
    }
    return $results;
}

function local_process_data() {
    global $DB;
    $data = array();
    $rs = $DB->get_recordset('vgs_instructor', null, 'firstname');
    foreach ($rs as $teacher) {
        $result = local_build_excel_data($teacher->sis_user_idstr);
        foreach ($result as $feedbackitemid=>$feedbackitem) {
            if (empty($data[$feedbackitemid])) {
                $data[$feedbackitemid] = array();
                // first empty cell
                $data[$feedbackitemid][] = array('');
                $text = vlacs_get_answer_text($feedbackitemid);
                foreach($text as $t) {
                    $data[$feedbackitemid][0][] = $t->answertext;
                }
            }
            $row = array($teacher->lastname . ', ' . $teacher->firstname);
            foreach ($feedbackitem as $answerindex=>$answercount) {
                $row[$answerindex] = $answercount->count;
            }
            $data[$feedbackitemid][] = $row;
        }
    }
    return $data;
}


function local_vlacs_backup_stats_data() {
    global $DB, $CFG;

    $backupdir = $CFG->dataroot . '/vlacs/backup';
    if (!file_exists($backupdir)) {
        mkdir($backupdir, $CFG->directorypermissions, true);
    }
    $records = $DB->get_records('vgs_teacher_score');
    $fileteacherscore = $backupdir . '/teacher_score.json';
    file_put_contents($fileteacherscore, json_encode($records));

    $records = $DB->get_records('vgs_feedback_answers');
    $filefeedbackanswers = $backupdir . '/feedbackanswers.json';
    file_put_contents($filefeedbackanswers, json_encode($records));

    $records = $DB->get_records('feedback_completed');
    $filename = $backupdir . '/feedback_completed.json';
    file_put_contents($filename, json_encode($records));

    $records = $DB->get_records('feedback_item');
    $filename = $backupdir . '/feedback_item.json';
    file_put_contents($filename, json_encode($records));

    $records = $DB->get_records('feedback_tracking');
    $filename = $backupdir . '/feedback_tracking.json';
    file_put_contents($filename, json_encode($records));

    $records = $DB->get_records('feedback_value');
    $filename = $backupdir . '/feedback_value.json';
    file_put_contents($filename, json_encode($records));
    return true;
}
