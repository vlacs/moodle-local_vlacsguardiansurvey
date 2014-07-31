<?php

/**
 * On this page administrator can change vlacs guardian settings
 * @package   local_vlacsguardiansurvey
 * @copyright 2014 VLA
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
require('../../../config.php');
require_once($CFG->libdir . '/adminlib.php');
require_once($CFG->dirroot . '/local/vlacsguardiansurvey/config.php');
require_once($CFG->dirroot . '/local/vlacsguardiansurvey/admin/forms.php');

admin_externalpage_setup('vlacsguardiansurveysettings');

$vlacsguardiansurveysettingsform = new vlacsguardiansurvey_settings_form(null,
    array());
$fromform = $vlacsguardiansurveysettingsform->get_data();

echo $OUTPUT->header();

if (!empty($fromform) and confirm_sesskey()) {

    //Save settings
    set_config('obsoleteperiod', $fromform->obsoleteperiod, 'local_vlacsguardiansurvey');

    //display confirmation
    echo $OUTPUT->notification(get_string('settingsupdated', 'local_vlacsguardiansurvey'), 'notifysuccess');
}

$vlacsguardiansurveysettingsform->display();

echo $OUTPUT->footer();