This plugin is used to receive a web service call from VLA Moodle site.
It creates a new Guardian exit survey and request guardian to answer the survey.
It also display the list of the guardian surveys.

Note that when we speak about "survey" we are using the VLACS term.
The VLACS survey is using the Moodle Feedback module, not the Moodle Survey module.

### Settings
1. set up survey site running 2.7
2. enable feedback activity module in Moodle
3. copy the local plugin on the survey site local folder. 
4. run the upgrade process. The plugin is installed.
5. enable web service in Moodle (enablewebservices) and enable the REST protocol.
6. create a temporary testing token linked to the service (restrict the IP address to the server IP as we will do a local test - later you will need to restrict to the IP making the webservice, so vla prod server). You need to copy this token into the client call in test/PHP-REST/client.php
7. set the email feature in the Moodle administration as the site will send emails to the guardians.
8. you need to edit your theme. See below.
9. copy your token into the /test/PHP-REST/client.php. Run it. The guardian survey is automatically created with a guardian test user and a survey request has been sent.
10. check that all works. User has been created, enrolled into the new course. In the Moodle admin edit the user change the auth method for manual and change the password. Connect as this user and go to http://survey27.vlacs.org/local/vlacsguardiansurvey/. You should be able to answer the survey.
11. you can now delete the test guardian user from the Moodle admin and manually delete the enrolment created in guardiansurvey table in the DB.
12. set a new token on the survey site, and set $CFG->survey2_token and $CFG->survey2_url in vla prod config.php


### Theme modification
In order to add specific enrolment survey information on the survey pages,
you need to edit /theme/clean/layout/*.php (except maintenance.php).

Just before any output, before ```echo $OUTPUT->doctype()```:
```
// These lines are required to add display more information on the feedback survey.
require_once($CFG->dirroot . '/local/vlacsguardiansurvey/locallib.php');
vlags_login_as_guardian();
if (!vlags_add_guardian_survey_css()) {
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
<?php vlags_add_guardian_survey_javascript(); ?>
```

