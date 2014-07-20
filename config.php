<?php
$CFG->surveycourseid = 2;

// This should be in the install.php file but Moodle put some restriction on what can be ran during install.
// You cannot use create_course() during install, the reason been thant only hardcoded
// $DB calls can be done during install/upgrade process. This is to prevent bad install/upgrade breaks of Moodle.
// So we do the plugin data installation after the Moodle plugin upgrade process.
require_once($CFG->dirroot . '/local/vlacsguardiansurvey/locallib.php');
create_survey_from_surveydata_file();