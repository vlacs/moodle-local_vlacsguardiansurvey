<?php

require_once(dirname(dirname(dirname(__FILE__))) . '/config.php');
require_login();
require_once(dirname(__FILE__) . '/locallib.php');
require_once(dirname(__FILE__) . '/update_form.php');

$feedbackitemid = required_param('feedbackitemid', PARAM_INT);

$url = new moodle_url($CFG->wwwroot . '/local/vlacsguardiansurvey/update.php', array('feedbackitemid'=>$feedbackitemid));
$PAGE->set_url($url);
$context = context_system::instance();
$title = get_string('surveylist', 'local_vlacsguardiansurvey');
$PAGE->set_context($context);
$PAGE->set_pagelayout('course');
$PAGE->set_heading($title);
$PAGE->set_title($title);

$output = $PAGE->get_renderer('local_vlacsguardiansurvey');

echo $output->header();

$item = $DB->get_record('feedback_item', array('id'=>$feedbackitemid));
$answers = $DB->get_records('vgs_feedback_answers', array('feedback_item_id'=>$feedbackitemid));

$formurl = new moodle_url('/local/vlacsguardiansurvey/update.php', array('feedbackitemid'=>$feedbackitemid));
$mform = new vgs_update_form($formurl, array('question'=>$item,'answers'=>$answers));

if ($mform->is_cancelled()) {
} else if ($formdata = $mform->get_data()) {
    foreach($formdata as $key => $d) {
        if(!preg_match('/^c/', $key)) {
            continue;
        }
        $weight = null;
        if(is_numeric($d)) {
            $weight = number_format($d, 2, '.', '');
        }
        $r = new stdClass;
        $r->id = preg_replace('/c/', '', $key);
        $r->answerweight = $weight;
        $DB->update_record('vgs_feedback_answers', $r);
    }
    echo $OUTPUT->notification(get_string('saved', 'local_vlacsguardiansurvey'), 'notifysuccess');
}

$mform->display();

echo $output->footer();
