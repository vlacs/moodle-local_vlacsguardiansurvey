<?php

/**
 * Library for the local plugin vlacsguardiansurvey
 *
 * @package    local_vlacsguardiansurvey
 * @copyright  2014 VLA
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @author     Jerome Mouneyrac <jerome@mouneyrac.com>
 */

// Load the specific $CFG attribut specific to vlacsguardiansurvey local plugin.
require_once($CFG->dirroot . '/local/vlacsguardiansurvey/config.php');

/**
 * Ask the guardian to answer the exit survey.
 * This function create the survey if it doesn't exist, and send an email to the guardian if an email
 * have not been sent the last X days...
 * It is most likely that this function is trigger by a web service call from VLA Moodle site.
 */
function ask_guardian_to_answer_exit_survey($surveyrequestinfo) {
    global $USER, $DB, $CFG;


    // Check if the guardian has a exit survey already assigned for the enrolment.
    $guardiansurvey = $DB->get_record('guardiansurvey',
        array('enrolmentid' => $surveyrequestinfo['enrolmentid']));

    if (empty($guardiansurvey)) {
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
            $guardian->auth = 'external';
            require_once($CFG->dirroot . '/user/lib.php');
            $surveyrequestinfo['guardianid'] = user_create_user($guardian);
        } else {
            $surveyrequestinfo['guardianid'] = $guardian->id;
        }

        // Assign the guardian as a course participant.

        // Sent email to guardian.

        // Mark the exit survey as sent to the guardian for the specific enrolment.
        $surveyrequestinfo['emailsentdate'] = time();
        $DB->insert_record('guardiansurvey', $surveyrequestinfo);

    } else {
        // Check if the email need to be resent.
    }
}

/**
 * Display list of survey that the user need to answer.
 */
function display_guardian_surveys() {

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

    if (empty($surveyid)) {
        $course = $DB->get_record('course', array('id' => $CFG->surveycourseid));

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
        }

        // Add the module.
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

        // Add the survey questions.
        $itemposition = 0;
        require_once($CFG->dirroot . '/local/vlacsguardiansurvey/surveydata.php');
        foreach ($surveydata as $setofquestions) {
            // Display questions break
            $item = new stdClass();
            $item->typ = 'label';
            $item->feedback = $moduleinfo->id;
            $item->name = $setofquestions->name;
            $item->presentation = '<p><b>' . $setofquestions->name . '</b></p>';
            $itemposition = $itemposition + 1;
            $item->position = $itemposition;
            $DB->insert_record('feedback_item', $item);

            // Display the set of question
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