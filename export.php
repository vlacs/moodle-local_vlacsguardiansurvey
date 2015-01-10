<?php

require_once(dirname(dirname(dirname(__FILE__))) . "/config.php");
require_login();
$action = optional_param('action', '', PARAM_ACTION);
require_once($CFG->libdir . '/adminlib.php');
require_once(dirname(__FILE__) . '/lib.php');
require_once(dirname(__FILE__) . '/locallib.php');

admin_externalpage_setup('vlacsguardiansurveyexport');

$exporturl = new moodle_url('/local/vlacsguardiansurvey/export.php');
if ($action == 'download') {
    $data = local_process_data();
    vlacs_export_xls($data);
    die;
}

echo $OUTPUT->header();

$downloadurl = new moodle_url('/local/vlacsguardiansurvey/export.php', array('action'=>'download'));
$cancelurl = new moodle_url('/local/vlacsguardiansurvey/dashboard.php');
echo $OUTPUT->confirm("Do you want to download excel export?", $downloadurl, $cancelurl);

echo $OUTPUT->footer();
