<?php

//define('CLI_SCRIPT', true);
require_once(dirname(dirname(dirname(__FILE__))) . "/config.php");
require_once(dirname(__FILE__) . '/lib.php');
require_once(dirname(__FILE__) . '/locallib.php');

function vlacs_export_xls($data) {
    global $CFG, $DB;
    static $questions = array();
    require_once("$CFG->libdir/excellib.class.php");
    $filename = md5(time());
    $filename .= clean_filename('-' . gmdate("Ymd_Hi"));
    $filename .= '.xls';

    $filearg = '-';
    $workbook = new MoodleExcelWorkbook($filearg);
    $workbook->send($filename);
    $worksheet = array();
    foreach ($data as $feedbackitemid=>$sheet) {
        $tabname = '';
        if (isset($questions[$feedbackitemid])) {
            $tabname = $questions[$feedbackitemid];
        } else {
            $tabname = $DB->get_field('feedback_item', 'name', array('id'=>$feedbackitemid));
            $questions[$feedbackitemid] = $tabname;
        }
        $excelsheet = $workbook->add_worksheet($tabname);
        $rowno = 0;
        foreach ($sheet as $row) {
            $colno = 0;
            foreach($row as $col) {
                $excelsheet->write($rowno, $colno, $col);
                $colno++;
            }
            $rowno++;
        }
        $worksheet[] = $excelsheet;
    }
    $workbook->close();
    return $filename;
}

function local_build_excel_data($sis_user_idstr) {
    global $DB;
    $results = array();
    $sql = "SELECT ve.id, vc.name, gs.guardianid AS userid, gs.enrolmentid AS enrolmentID, fc.id AS completedid
              FROM {feedback_completed} fc
              JOIN {guardiansurvey} AS gs ON gs.submissionid=fc.id
              JOIN {vgs_enrolment} AS ve ON ve.enrolment_idstr=gs.enrolmentid
              JOIN {vgs_course} AS vc ON vc.master_course_idstr=ve.master_course_idstr
             WHERE vc.sis_user_idstr=?";
    $rs = $DB->get_recordset_sql($sql, array($sis_user_idstr));
    $count = 0;
    foreach ($rs as $r) {
        $completedid = $r->completedid;
        $answers = $DB->get_records('feedback_value', array('completed'=>$completedid));
        foreach ($answers as $answer) {
            $feedbackitemid = $answer->item;
            if (empty($scores[$feedbackitemid])) {
                 $scores[$feedbackitemid] = array();
            }
            $index = $answer->value;
            if(is_numeric($index)) {
                if (!isset($results[$feedbackitemid])) {
                    $results[$feedbackitemid] = array();
                }
                if (!isset($results[$feedbackitemid][$index])) {
                    $data = new stdClass;
                    // counter
                    $data->count = 1;
                    $results[$feedbackitemid][$index] = $data;
                } else {
                    $results[$feedbackitemid][$index]->count++;
                }
            } else {
                continue;
            }
        }
        $count++;
    }
    return $results;
}

function local_process_data() {
    global $DB;
    $data = array();
    $rs = $DB->get_recordset('vgs_instructor', null, 'firstname');
    foreach ($rs as $teacher) {
        $result = local_build_excel_data($teacher->sis_user_idstr);
        foreach ($result as $feedbackitemid=>$feedbackitem) {
            if (empty($data[$feedbackitemid])) {
                $data[$feedbackitemid] = array();
                // first empty cell
                $data[$feedbackitemid][] = array('');
                $text = vlacs_get_answer_text($feedbackitemid);
                foreach($text as $t) {
                    $data[$feedbackitemid][0][] = $t->answertext;
                }
            }
            $row = array($teacher->lastname . ', ' . $teacher->firstname);
            foreach ($feedbackitem as $answerindex=>$answercount) {
                $row[$answerindex] = $answercount->count;
            }
            $data[$feedbackitemid][] = $row;
        }
    }
    return $data;
}

$data = local_process_data();
vlacs_export_xls($data);
