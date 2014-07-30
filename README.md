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
5. run the upgrade process. The plugin is installed.
6. Enable web service in Moodle (enablewebservices) and enable the REST protocol.
7. Create a token linked to the service. You need to copu this token into the client call in VLACS code (the call should be done when the enrolment is marked as completed)
8. Set the email feature in the Moodle administration as the site will send emails to the guardians.
9. You need to edit your theme. See below.
10. Copy your token into the /test/PHP-REST/client.php. Run it. The guardian survey is automatically created with a guardian test user and a survey request has been sent.
11. Check all works, you can now delete the test guardian user and the enrolment created in guardiansurvey table.


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
