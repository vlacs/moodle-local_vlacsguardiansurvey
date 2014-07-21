This plugin is used to receive a web service call from VLA Moodle site.
It creates a new Guardian exit survey and request guardian to answer the survey.
It also display the list of the guardian surveys.

Note that when we speak about "survey" we are using the VLACS term.
The VLACS survey is using the Moodle Feedback module, not the Moodle Survey module.

### Settings
See the [Specifications](https://github.com/Bepaw/moodle-local_vlacsguardiansurvey/wiki/Specifications).


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
