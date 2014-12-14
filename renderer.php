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

require_once('locallib.php');

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
                        array('redirect' => $survey->enrolmentid)), $stranswer);
                }
                $surveyrow = array();
                $surveyrow[] = $survey->enrolmentid;
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

    protected function render_survey_charts(survey_charts $charts) {
        global $DB;
        $html = '';
        $items = $charts->items;
        $ids = array();
        $strupdate = get_string('editanswerweight', 'local_vlacsguardiansurvey');
        $instructor_idstr = $charts->instructor_idstr;
        $course_idstr = $charts->master_course_idstr;
        $scores = $DB->get_recordset('vgs_teacher_score', array('sis_user_idstr'=>$instructor_idstr));
        list($count_course, $survey_results_course) = local_vlacsguardiansurvey_analyse_course($course_idstr);
        list($count_vlacs, $survey_results_vlacs) = local_vlacsguardiansurvey_analyse_vlacs($items);
        list($count_teacher, $teacherresults) = local_vlacsguardiansurvey_analyse_teacher($instructor_idstr);
        $bardata = array();
        $piedata = array();
        foreach ($items as $item) {
            if ($item->hasvalue == 0) {
                continue;
            }
            $id = $item->id;

            $answers = $DB->get_records('vgs_feedback_answers', array('feedback_item_id'=>$item->id));

            $p = feedback_get_item_class($item->typ);

            $questionhtml = $this->output->heading($item->name, 5, 'main', 'surveyquestion_' . $id);
            $questionhtml .= $this->output->box_start('generalbox surveyanswers', 'surveyanswers_' . $id);
            if ($id == 5) {
                $questionhtml .= html_writer::tag('div', '<button itemid="'.$id.'" id="piesw_vlacs">VLACS</button><button itemid="'.$id.'" id="piesw_course">Course</button><button itemid="'.$id.'" id="piesw_teacher">Teacher</button>', array('id'=>'piechart_switcher'));
                $filterhtml = '<div id="filter_'.$id.'"></div>';
                $questionhtml .= html_writer::tag('p', $filterhtml, array('id'=>'dashboard_div'));
            } else {
                foreach ($answers as $a) {
                    $questionhtml .= ucfirst($a->answertext);
                    if (!empty($a->answerweight)) {
                        $questionhtml .= " ($a->answerweight) ";
                    } else {
                        $questionhtml .= " ";
                    }
                }
                $questionhtml .= html_writer::link(new moodle_url('/local/vlacsguardiansurvey/update.php', array('feedbackitemid'=>$item->id)), $strupdate, array('target', '_blank'));
            }
            $questionhtml .= $this->output->box_end(); // end of surveyanswers

            $result = $p->get_analysed($item);
            if (!is_array($result) || empty($result[2])) {
                continue;
            }
            $ids[$id] = $id;
            $barhtmlid = 'barchart_' . $id;
            $linehtmlid = 'linechart_' . $id;
            $piehtmlid = 'piechart_' . $id;
            $questionhtml .= $this->output->container_start('row-fluid', 'survey-charts-' . $id);
            if ($id == 5) {
                $questionhtml .= $this->output->box('', 'surveypeichart span6 chartbox', $piehtmlid);
            } else {
                $questionhtml .= $this->output->box('', 'surveybarchart span6 chartbox', $barhtmlid);
            }
            $questionhtml .= $this->output->box('', 'surveylinechart span6 chartbox', $linehtmlid);
            $questionhtml .= $this->output->container_end(); // end of row-fluid

            $html .= $this->output->container($questionhtml, '', 'survey-question-' . $id);

            $vals = $result[2];
            $bardata[$id] = array();
            $bardata[$id][] = array('Answer', 'VLACS', 'Course', 'Teacher', 'vlacs total', 'course total', 'teacher total');
            $t = array(array('Answer', 'Responses'));
            if ($id == 5) {
                $piedata[$id] = array('t'=>$t, 'v'=>$t, 'c'=>$t);
            }
            foreach ($vals as $key=>$val) {
                // index start with 1
                $answerindex = $key + 1;
                $sitescore = 0;
                $site_answer_count = 0;
                if (isset($survey_results_vlacs[$item->id][$answerindex])) {
                    $site_answer_count = $survey_results_vlacs[$item->id][$answerindex]->count;
                    $sitescore = $site_answer_count/$count_vlacs;
                }
                $coursescore = 0;
                $course_answer_count = 0;
                if (isset($survey_results_course[$item->id][$answerindex])) {
                    $course_answer_count = $survey_results_course[$item->id][$answerindex]->count;
                    $coursescore = $course_answer_count/$count_course;
                }
                $teacherscore = 0;
                $teacher_answer_count = 0;
                if (isset($teacherresults[$item->id][$answerindex])) {
                    $teacher_answer_count = $teacherresults[$item->id][$answerindex]->count;
                    $teacherscore = $teacher_answer_count/$count_teacher;
                }
                $answertext = trim(html_to_text($val->answertext));
                if ($id == 5) {
                    $piedata[$id]['v'][] = array($answertext, (int)$site_answer_count);
                    $piedata[$id]['c'][] = array($answertext, (int)$course_answer_count);
                    $piedata[$id]['t'][] = array($answertext, (int)$teacher_answer_count);
                } else {
                    $bardata[$id][] = array(ucfirst($answertext),
                                            $sitescore*100,
                                            $coursescore*100,
                                            $teacherscore*100,
                                            $site_answer_count,
                                            $course_answer_count,
                                            $teacher_answer_count
                                        );
                }
            }
        }

        $linechartdata = array();
        foreach ($scores as $time=>$oneset) {
            $timestamp = $oneset->timecreated;
            $questions = unserialize($oneset->score);
            foreach ($questions as $feedbackitemid=>$score) {
                if (empty($linechartdata[$feedbackitemid])) {
                    $linechartdata[$feedbackitemid] = array();
                }
                $linechartdata[$feedbackitemid][$timestamp] = $score;
            }
        }

        $this->page->requires->js_init_call('vlacs_guardian_survey_draw_chart', array($ids, $bardata, $piedata, $linechartdata), true);
        return $html;
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

class survey_charts implements renderable {
    public $items = array();
    public $instructor_idstr = '';
    public $master_course_idstr = '';
    public function __construct($items, $instructor_idstr, $master_course_idstr) {
        $this->items = $items;
        $this->instructor_idstr = $instructor_idstr;
        $this->master_course_idstr = $master_course_idstr;
    }
}
