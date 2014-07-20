<?php
// The course id of the course that needs to contains the survey.
// If the course id reference an none existing course, then a course will be created. (so behat/phpunit test can be ran)
$CFG->surveycourseid = 2;

// Uncomment to create a new survey feedback activity that will replace the existing (data for existing one are kept).
// You'll probably need to change the course shortname in create_survey_from_surveydata_file()
//set_config('feedbackid', null, 'local_vlacsguardiansurvey');

// These following lines should be in the install.php file but Moodle put some restriction on what can be ran during install.
// You cannot use create_course() during install, the reason been thant only hardcoded
// $DB calls can be done during install/upgrade process. This is to prevent bad install/upgrade breaks of Moodle.
// So we do the plugin data installation after the Moodle plugin upgrade process.
require_once($CFG->dirroot . '/local/vlacsguardiansurvey/locallib.php');
create_survey_from_surveydata_file();