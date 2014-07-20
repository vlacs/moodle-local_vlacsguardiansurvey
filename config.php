<?php
//----------------------- MOST LIKELY NEEDS TO BE MODIFIED -----------------------
// The course id of the course that needs to contains the survey.
// If the course id reference an none existing course, then a course will be created. (so behat/phpunit test can be ran)
$surveycourseid = 10;
// Note: once this script is run, you cannot change the surveycourseid.
//       If you really need to change the course, then you will need to uncomment the following line:
// set_config('courseid', $surveycourseid, 'local_vlacsguardiansurvey');

//------------------------ MOST LIKELY DOESN'T NEED TO BE MODIFIED -----------------------
// Which role shortname we enrol the guardian in the course.
$CFG->surveyguardianrole = 'student';

// Uncomment to create a new survey feedback activity (the existing one is kept).
// You'll probably need to change the course shortname in create_survey_from_surveydata_file()
//set_config('feedbackid', null, 'local_vlacsguardiansurvey');


// ------------------------ DON'T CHANGE -----------------------
// The code related to the course id.
$courseid = get_config('local_vlacsguardiansurvey', 'courseid');
if (empty($courseid)) {
    set_config('courseid', $surveycourseid, 'local_vlacsguardiansurvey');
}

// These following lines should be in the install.php file but Moodle put some restriction on what can be ran during install.
// You cannot use create_course() during install, the reason been thant only hardcoded
// $DB calls can be done during install/upgrade process. This is to prevent bad install/upgrade breaks of Moodle.
// So we do the plugin data installation after the Moodle plugin upgrade process.
require_once($CFG->dirroot . '/local/vlacsguardiansurvey/locallib.php');
create_survey_from_surveydata_file();
