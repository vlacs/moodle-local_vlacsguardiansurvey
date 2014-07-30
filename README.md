This plugin is used to receive a web service call from VLA Moodle site.
It creates a new Guardian exit survey and request guardian to answer the survey.
It also display the list of the guardian surveys.

Note that when we speak about "survey" we are using the VLACS term.
The VLACS survey is using the Moodle Feedback module, not the Moodle Survey module.

### Settings
1. upgrade the survey site to 2.7
2. enable feedback activity module in Moodle
3. copy the local plugin on the survey site local folder.
4. Edit the course id containing the survey in the config.php file of the local plugin.
5. run the upgrade process. The plugin is installed and the guardian survey is automatically created.
6. add this php line into your theme layout/default.php page: ```<?php require_once($CFG->dirroot . '/local/vlacsguardiansurvey/lib.php'); // Display the course/student/completed date info on the exit guardian survey with a bit of JS. Also offer the choice to switch to a different survey => redirect to the survey list. display_survey_info(); ?>```
7. Enable web service in Moodle (enablewebservices) and enable the REST protocol.
8. Create a token linked to the service. You need to copu this token into the client call in VLACS code (the call should be done when the enrolment is marked as completed)
9. Set the email feature in the Moodle administration as the site will send emails to the guardians.
10. You need to edit your theme. See below.


### Theme modification
In order to add specific enrolment survey information on the survey pages,
you need to edit /theme/clean/layout/columns3.php.

Just after the ```<HEAD>``` tag:
```
// These lines are required to add display more information on the feedback survey.
require_once($CFG->dirroot . '/local/vlacsguardiansurvey/locallib.php');
if (!add_guardian_survey_css()) {
    $regionmainclass = 'span8 pull-right';
} else {
    $regionmainclass = '';
}
```
Replace
```
<section id="region-main" class="span8 pull-right">
```
by
```
<section id="region-main" class="<?php echo $regionmainclass; ?>">
```
Just before the ```</BODY>``` tag:
```
<?php add_guardian_survey_javascript(); ?>
```

### Specification
See the [specifications in the wiki](https://github.com/Bepaw/moodle-local_vlacsguardiansurvey/wiki/Specifications).
