<?php

/**
 * Renderer for use with the vlacsguardiansurvey output
 *
 * @package    local
 * @subpackage vlacsguardiansurvey
 * @copyright  2014 VLACS
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

/**
 * Standard HTML output renderer for vlacsguardiansurvey
 */
class local_vlacsguardiansurvey_renderer extends plugin_renderer_base {

    /**
     * Renderer for the survey list of a guardian.
     *
     * @param survey_guardian_list $surveylist
     * @return string html table of surveys
     */
    protected function render_survey_guardian_list(survey_guardian_list $surveylist) {
        global $CFG;

        $surveylisthtml = '';

        if(!empty($surveylist->surveys)) {
            $strreference = get_string('reference', 'local_vlacsguardiansurvey');
            $strstudent = get_string('student', 'local_vlacsguardiansurvey');
            $strcourse = get_string('course', 'local_vlacsguardiansurvey');
            $strcoursecompleted = get_string('coursecompleted', 'local_vlacsguardiansurvey');
            $strsurveyanswered = get_string('surveyanswered', 'local_vlacsguardiansurvey');
            $stranswer = get_string('answer', 'local_vlacsguardiansurvey');
            $stranswered = get_string('answered', 'local_vlacsguardiansurvey');

            $surveys_table = new html_table();
            $surveys_table->attributes = array('class' => 'table table-hover');
            $surveys_table->head = array($strreference, $strstudent, $strcourse,
                $strcoursecompleted, $strsurveyanswered);
            
            foreach($surveylist->surveys as $survey) {
                if ($survey->completeddate) {
                    $answered = $stranswered;
                } else {
                    $surveyredirecturl = $CFG->wwwroot . '/local/vlacsguardiansurvey/index.php';
                    $answered = html_writer::link(new moodle_url($surveyredirecturl,
                        array('redirect' => $survey->id)), $stranswer);
                }
                $surveyrow = array();
                $surveyrow[] = $survey->id;
                $surveyrow[] = $survey->studentfullname;
                $surveyrow[] = $survey->coursename;
                $surveyrow[] = userdate($survey->enrolmentcompleteddate);
                $surveyrow[] = $answered;
                $surveys_table->data[] = $surveyrow;
            }
            
            $surveylisthtml .= html_writer::table($surveys_table);
            
        } else {
            $surveylisthtml .= get_string('nosurveys', 'local_vlacsguardiansurvey');
        }

        return $surveylisthtml;
    }

}

/**
 * Collection of all survey for index.php page
 */
class survey_guardian_list implements renderable {

    /** @var array list of badges */
    public $surveys = array();

    /**
     * Initializes the list of surveys to display
     *
     * @param array $surveylist Surveys to render
     */
    public function __construct($surveylist) {
        $this->surveys = $surveylist;
    }
}
