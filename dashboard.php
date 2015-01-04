<?php
/**
 * Dashboard
 *
 * @package local_vlacsguardiansurvey
 */

require_once(dirname(dirname(dirname(__FILE__))) . "/config.php");
require_once($CFG->dirroot . "/mod/feedback/lib.php");
$teacher_idstr = optional_param('teacher', null, PARAM_TEXT);
$course_idstr = optional_param('course', null, PARAM_TEXT);
require_login();
$context = context_system::instance();

set_config('feedbackcmid', 1, 'local_vlacsguardiansurvey');
$id = get_config('local_vlacsguardiansurvey', 'feedbackcmid');

$cm = get_coursemodule_from_id('feedback', $id, 0, false, MUST_EXIST);
$course = $DB->get_record("course", array("id"=>$cm->course), '*', MUST_EXIST);
$feedback = $DB->get_record("feedback", array("id"=>$cm->instance), '*', MUST_EXIST);

$url = new moodle_url('/local/vlacsguardiansurvey/dashboard.php');
$PAGE->set_url($url);
$PAGE->set_pagelayout('course');
require_capability('mod/feedback:viewreports', $context);
$PAGE->set_context($context);
$output = $PAGE->get_renderer('local_vlacsguardiansurvey');
$gcharturl = new moodle_url('https://www.google.com/jsapi');
$PAGE->requires->js($gcharturl, true);
$PAGE->requires->js('/local/vlacsguardiansurvey/chart.js', true);

$strfeedbacks = get_string("modulenameplural", "feedback");
$strfeedback  = get_string("modulename", "feedback");
$PAGE->set_heading($course->fullname);
$PAGE->set_title($feedback->name);
$PAGE->navbar->add('edit', $url);

echo $OUTPUT->header();
echo $OUTPUT->heading(format_string($feedback->name));

$completedscount = feedback_get_completeds_group_count($feedback);

echo $OUTPUT->box_start('mod_introbox');
$countstring = get_string('completed_feedbacks', 'feedback').': '.$completedscount;
echo $OUTPUT->container(html_writer::tag('strong', $countstring));


$params = array('feedback'=>$feedback->id, 'hasvalue'=>1);
$items = $DB->get_records('feedback_item', $params, 'position');

if (is_array($items)) {
    $responsestring = get_string('questions', 'feedback').': ' .count($items);
    echo $OUTPUT->container(html_writer::tag('strong', $responsestring));
} else {
    $items=array();
}
echo $OUTPUT->box_end(); // end .mod_introbox


$selected_teacher = '';
$selected_course = '';
if (!empty($teacher_idstr)) {
    $selected_teacher = $teacher_idstr;
}
if (!empty($course_idstr)) {
    $selected_course = $course_idstr;
}
$selecturl = new moodle_url('/local/vlacsguardiansurvey/dashboard.php');
$rs = $DB->get_recordset('vgs_instructor', null, 'firstname');
$teachers = array();
foreach ($rs as $r) {
    $r->middlename = '';
    $r->alternatename = '';
    $r->lastnamephonetic = '';
    $r->firstnamephonetic = '';
    $teachers[$r->sis_user_idstr] = fullname($r);
}
//public function single_select($url, $name, array $options, $selected = '', $nothing = array('' => 'choosedots'), $formid = null) {
echo $OUTPUT->single_select($selecturl, 'teacher', $teachers, $selected_teacher, array(''=>'Choose an instructor'));

$sql = "SELECT vc.*
          FROM {vgs_instructor_course} vic
          JOIN {vgs_course} vc
               ON vic.master_course_idstr=vc.master_course_idstr
         WHERE vic.sis_user_idstr=?";
$rs = $DB->get_recordset_sql($sql, array($teacher_idstr));
$courses = array();
$courses[] = '';
foreach ($rs as $r) {
    $courses[$r->master_course_idstr] = $r->name;
}
$selecturl->param('teacher', $teacher_idstr);
echo $OUTPUT->single_select($selecturl, 'course', $courses, $selected_course, array(''=>'Choose a course'));

if (!empty($selected_teacher) && !empty($selected_course)) {
    $surveylist = new survey_charts($items, $selected_teacher, $selected_course);
    echo $output->render($surveylist);
}

echo $OUTPUT->footer();
