This plugin is used to receive a web service call from VLA Moodle site.
It creates new Guardian exit survey and request guardian to answer the survey.
It also display the list of the guardian surveys.

### Settings
1. upgrade the survey site to 2.7
2. copy the local plugin on the survey site local folder.
3. Edit the course id containing the survey in the config.php file of the local plugin.
4. run the upgrade process. The plugin is installed and the guardian survey is automatically created.
5. add this php line into your theme layout/default.php page:
`<?php  `
`require_once($CFG->dirroot . '/local/vlacsguardiansurvey/lib.php');  `
`// Display the course/student/completed date info on the exit guardian survey with a bit of JS. Also offer the choice to switch to a different survey => redirect to the survey list.  `
`display_survey_info();  `
`?>`

See the [Specifications](https://github.com/Bepaw/moodle-local_vlacsguardiansurvey/wiki/Specifications).