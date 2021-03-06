<?php

/**
 * Page for listing the survey of one user
 *
 * @package    local_vlacsguardiansurvey
 * @copyright  2014 VLA
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @author     Jerome Mouneyrac <jerome@mouneyrac.com>
 */

require_once(dirname(dirname(dirname(__FILE__))) . '/config.php');

require_login();

require_once('locallib.php');

$url = new moodle_url($CFG->wwwroot . '/local/vlacsguardiansurvey/index.php', array());
$PAGE->set_url($url);

require_login();

$redirect = optional_param('redirect', null, PARAM_TEXT);
if (!empty($redirect)) {
    vlags_redirect_to_survey($redirect);
    die();
}

$context = context_system::instance();
$title = get_string('surveylist', 'local_vlacsguardiansurvey');
$PAGE->set_context($context);
$PAGE->set_pagelayout('course');
$PAGE->set_heading($title);
$PAGE->set_title($title);

$output = $PAGE->get_renderer('local_vlacsguardiansurvey');
// Retrieve the list of the guardian surveys that the guardian need to answer.
$surveys = $DB->get_records('guardiansurvey', array('guardianid' => $USER->id));
// Remove obsolete surveys from the list.
foreach($surveys as $key => $survey) {
    $obsoleteperiod = get_config('local_vlacsguardiansurvey', 'obsoleteperiod');
    if (empty($obsoleteperiod)) {
        $obsoleteperiod = VLAGS_OBSOLETEPERIOD;
    }
    $obsoleteperiod = 60 * 60 * 24 * $obsoleteperiod;
    if ((time() - $survey->enrolmentcompleteddate) > $obsoleteperiod) {
        unset($surveys[$key]);
    }
}
$surveylist = new survey_guardian_list($surveys);

echo $output->header();
echo $output->render($surveylist);
echo $output->footer();

