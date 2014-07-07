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
require_once('locallib.php');

require_login();

$url = new moodle_url($CFG->wwwroot . '/local/vlacsguardiansurvey/index.php', array());
$PAGE->set_url($url);

require_login();
$context = context_system::instance();
$title = get_string('surveylist', 'local_vlacsguardiansurvey');
$PAGE->set_context($context);
$PAGE->set_pagelayout('course');
$PAGE->set_heading($title);



$PAGE->set_title($title);

echo $OUTPUT->header();
echo 'LIST OF SURVEYS';
create_survey_from_surveydata_file();
echo $OUTPUT->footer();

