<?php

/**
 * Library for the local plugin vlacsguardiansurvey
 *
 * @package    local_vlacsguardiansurvey
 * @copyright  2014 VLA
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @author     Jerome Mouneyrac <jerome@mouneyrac.com>
 */

/**
 * Ask the guardian to answer the exit survey.
 * This function create the survey if it doesn't exist, and send an email to the guardian if an email
 * have not been sent the last X days...
 * It is most likely that this function is trigger by a web service call from VLA Moodle site.
 */
function ask_guardian_to_answer_exit_survey() {
    global $USER, $DB;

    // Check the student guardian.
    $student2guardian = $DB->get_record('student2guardian', array('student_user_idstr' => $USER->username));

    // Check if the student guardian has a exit survey already assigned.
    $guardiansurvey = $DB->get_record('guardiansurvey', array('student2guardian' => $student2guardian->id));

    if (empty($guardiansurvey)) {
        // Create a new exit survey if none exit.

            // Retrieve all the feedback module of the course containing the survey

            // If none feedback existing with the name ... then create it

        // Assign the exit survey to the guardian.

        // Sent email to guardian.

        // Mark the exit survey as sent to the guardian.

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

function create_survey_from_surveydata_file() {

}