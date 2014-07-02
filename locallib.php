<?php

/**
 *
 */
function sent_guardian_survey_email() {
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