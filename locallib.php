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