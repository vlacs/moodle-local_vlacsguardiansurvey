<?php

require_once($CFG->libdir.'/filelib.php');

define('VLACS_SYNC_URL', 'https://courses.vlacs.org/blocks/vlareporting/api.php');
define('VLACS_SYNC_TOKEN', '51cff780-5409-11e4-88d8-30f9ede8467f');

function local_vlacsguardiansurvey_get_sync_url($params = array()) {
    $params['token'] = sha1(VLACS_SYNC_TOKEN);
    $url = new moodle_url(VLACS_SYNC_URL, $params);
    return $url;
}

function local_vlacs_presentation_to_answers($string) {
    $possibilities = preg_replace('/^(d|m|c|r)(\>){5}/', '', $string);
    $possibilities = preg_replace("/(\\n|\\r)/", '', $possibilities);
    $possibilities = preg_replace("/(\\s)*(\\+)*(\\s)*$/", '', $possibilities);
    return array_map("trim", explode('|', $possibilities));
}

function local_vlacsguardiansurvey_analyse_vlacs($items) {
    global $DB;
    $results = array();
    // site wide
    $sql = 'SELECT fa.answerindex,fa.answerweight*count(fv.id) AS score,fa.answerweight,count(fv.id) AS count
              FROM {vgs_feedback_answers} fa
              JOIN {feedback_value} AS fv
                   ON fv.item=fa.feedback_item_id AND fa.answerindex=cast(fv.value as int)
             WHERE fa.feedback_item_id=?
                   GROUP BY fa.answerindex,fa.answerweight
                   ORDER BY fa.answerindex';
    foreach ($items as $feedbackitem) {
        $count = 0;
        $results[$feedbackitem->id] = array();
        $feedbackitemid = $feedbackitem->id;
        $rs = $DB->get_recordset_sql($sql, array($feedbackitemid));
        $results[$feedbackitemid] = array();
        foreach ($rs as $r) {
            $count += $r->count;
            $results[$feedbackitemid][$r->answerindex] = $r;
        }
    }
    return array($count, $results);
}

function local_vlacsguardiansurvey_analyse_teacher($sis_user_idstr) {
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
                $score = vlacs_get_answer_weight($feedbackitemid, $index);
                if (!isset($results[$feedbackitemid])) {
                    $results[$feedbackitemid] = array();
                }
                if (!isset($results[$feedbackitemid][$index])) {
                    $data = new stdClass;
                    // accumulate total score
                    $data->totalscore = $score;
                    // fixed score for each answer
                    $data->score = $score;
                    // counter
                    $data->count = 1;
                    $results[$feedbackitemid][$index] = $data;
                } else {
                    $results[$feedbackitemid][$index]->count++;
                    $results[$feedbackitemid][$index]->totalscore += $score;
                }
            } else {
                continue;
            }
        }
        $count++;
    }
    return array($count, $results);
}

function local_vlacsguardiansurvey_analyse_course($course_idstr) {
    global $DB;
    $results = array();
    // this query looks all enrolment in this course
    $sql = "SELECT ve.id, vc.name, gs.guardianid AS userid, gs.enrolmentid AS enrolmentID,
                    fc.id AS completedid
              FROM {feedback_completed} fc
              JOIN {guardiansurvey} AS gs ON gs.submissionid=fc.id
              JOIN {vgs_enrolment} AS ve ON ve.enrolment_idstr=gs.enrolmentid
              JOIN {vgs_course} AS vc ON vc.master_course_idstr=ve.master_course_idstr
             WHERE vc.master_course_idstr=?";
    $rs = $DB->get_recordset_sql($sql, array($course_idstr));
    $count = 0;
    foreach ($rs as $r) {
        // feedback id
        $completedid = $r->completedid;
        $answers = $DB->get_records('feedback_value', array('completed'=>$completedid));
        $getweightsql = "SELECT vfa.answerweight
                  FROM {vgs_feedback_answers} vfa
                 WHERE vfa.feedback_item_id=? AND vfa.answerindex=?";
        foreach ($answers as $answer) {
            $feedbackitemid = $answer->item;
            $index = $answer->value;
            if(is_numeric($index)) {
                $score = $DB->get_field_sql($getweightsql, array($feedbackitemid, $index));
                if (!isset($results[$feedbackitemid])) {
                    $results[$feedbackitemid] = array();
                }
                if (!isset($results[$feedbackitemid][$index])) {
                    $results[$feedbackitemid][$index] = new stdClass;
                    $results[$feedbackitemid][$index]->score = (float)$score;
                    $results[$feedbackitemid][$index]->count = 1;
                } else {
                    $results[$feedbackitemid][$index]->score += (float)$score;
                    $results[$feedbackitemid][$index]->count++;
                }
            } else {
                continue;
            }
        }
        $count++;
    }
    return array($count,$results);
}

function local_vlacsguardiansurvey_cron() {
    global $DB, $CFG;
}

function local_vlacsreporting_sync_feedback_answers() {
    global $DB, $CFG;
    $id = get_config('local_vlacsguardiansurvey', 'feedbackcmid');

    $cm = get_coursemodule_from_id('feedback', $id, 0, false, MUST_EXIST);
    $course = $DB->get_record("course", array("id"=>$cm->course), '*', MUST_EXIST);
    $feedback = $DB->get_record("feedback", array("id"=>$cm->instance), '*', MUST_EXIST);
    $params = array('feedback'=>$feedback->id, 'hasvalue'=>1);
    $questions = $DB->get_records('feedback_item', $params, 'position');

    foreach ($questions as $q) {
        switch($q->typ) {
        case 'multichoice':
            $answers = local_vlacs_presentation_to_answers($q->presentation);
            $index = 1;
            foreach ($answers as $key => $text) {
                $answer = new stdclass;
                $answer->answerindex = $index;
                $answer->answertext = $text;
                $answer->feedback_item_id = $q->id;
                $answer->weight = 0;
                if (!$r = $DB->get_record('vgs_feedback_answers', array('answerindex'=>$index, 'feedback_item_id'=>$q->id))) {
                    $DB->insert_record('vgs_feedback_answers', $answer);
                } else {
                    if ($r->answertext != $text) {
                        $r->answertext = $text;
                        $DB->update_record('vgs_feedback_answers', $r);
                    }
                }
                $index++;
            }
            break;
        case 'textfield':
        case 'textarea':
            //$item->choices = false;
            break;
        case 'pagebreak':
        case 'label':
            continue(2);
        default:
            // Do something in the error log or die.
            print $q->typ;
            die('error'); // TODO: Change this. :<
        }
    }

}

function local_vlacsreporting_sync_teachers() {
    global $DB, $CFG;
    $url = local_vlacsguardiansurvey_get_sync_url(array('action'=>'export_teachers'));
    $json = file_get_contents($url->out(false));
    //$filepath = __DIR__ . '/t.json';
    //$json = file_get_contents($filepath);
    $teachers = json_decode($json);
    foreach($teachers as $t) {
        if($r = $DB->get_record('vgs_instructor', array('sis_user_idstr'=>$t->sis_user_idstr))) {
            $t->id = $r->id;
            $t->timemodified = time();
            $DB->update_record('vgs_instructor', $t);
        } else {
            $now = time();
            $t->imecreated = $now;
            $t->timemodified = $now;
            $DB->insert_record('vgs_instructor', $t);
        }
        if (!empty($t->courses)) {
            foreach ($t->courses as $c) {
                $c->sis_user_idstr = $t->sis_user_idstr;
                if($r = $DB->get_record('vgs_course', array('master_course_idstr'=>$c->master_course_idstr))) {
                    $c->id = $r->id;
                    $DB->update_record('vgs_course', $c);
                } else {
                    $DB->insert_record('vgs_course', $c);
                }
                if(!$j = $DB->get_record('vgs_instructor_course', array('sis_user_idstr'=>$t->sis_user_idstr, 'master_course_idstr'=>$c->master_course_idstr))) {
                    $j = new stdclass;
                    $j->sis_user_idstr = $t->sis_user_idstr;
                    $j->master_course_idstr = $c->master_course_idstr;
                    $DB->insert_record('vgs_instructor_course', $j);
                }
            }
        }
    }
}

function local_vlacsreporting_sync_enrolment() {
    global $DB, $CFG;
    $url = local_vlacsguardiansurvey_get_sync_url(array('action'=>'export_enrolment'));
    $json = file_get_contents($url->out(false));
    $data = json_decode($json);
    foreach ($data as $course_idstr => $enrolments) {
        if (!is_object($enrolments)) {
            continue;
        } else {

        }
        foreach ($enrolments as $e) {
            $enrolment_idstr = $e->enrolment_idstr;
            $sisuseridstr = $e->sis_user_idstr;
            if (!$r = $DB->get_record('vgs_enrolment', array('master_course_idstr'=>$course_idstr, 'enrolment_idstr'=>$enrolment_idstr))) {
                $r = new stdclass;
                $r->master_course_idstr = $course_idstr;
                $r->enrolment_idstr = $enrolment_idstr;
                $r->sis_user_idstr = $sisuseridstr;
                $DB->insert_record('vgs_enrolment', $r);
            }
        }
    }
}

function local_vlacsreporting_sync_courses() {
    global $DB, $CFG;
    $http = new curl(array('debug'=>false));
    $params = array(
        'token'=>sha1(VLACS_REPORTING_UUID),
        'action'=>'get_courses'
    );
    $json = $http->get(VLACS_REPORTING_URL, $params);
    $courses = json_decode($json);
    foreach($courses as $c) {
        if($DB->record_exists('vgs_course', array('idstr'=>$c->idstr))) {
            // update
        } else {
            // insert
        }
    }
}

function local_vlacsreporting_sync_results() {
    global $DB, $CFG;
    $http = new curl(array('debug'=>false));
    $params = array(
        'token'=>sha1(VLACS_REPORTING_UUID),
        'courseidster'=>'',
        'useridster'=>'',
        'action'=>'get_results'
    );
    $json = $http->get(VLACS_REPORTING_URL, $params);
    $results = json_decode($json);
}

function vlacs_get_answer_weight($feedbackitemid, $answerindex) {
    global $CFG, $DB;
    static $scores = array();
    $getweightsql = "SELECT vfa.answerweight
              FROM {vgs_feedback_answers} vfa
             WHERE vfa.feedback_item_id=? AND vfa.answerindex=?";
    if (empty($scores[$feedbackitemid][$answerindex])) {
        $score = $DB->get_field_sql($getweightsql, array($feedbackitemid, $answerindex));
        $scores[$feedbackitemid][$answerindex] = $score;
    } else {
        $score = $scores[$feedbackitemid][$answerindex];
    }
    return $score;
}

function vlacs_get_answer_text($feedbackitemid) {
    global $CFG, $DB;
    static $texts = array();
    $gettextsql = "SELECT vfa.answerindex,vfa.answertext
                     FROM {vgs_feedback_answers} vfa
                    WHERE vfa.feedback_item_id=?";
    if (empty($texts[$feedbackitemid])) {
        $texts[$feedbackitemid] = $DB->get_records_sql($gettextsql, array($feedbackitemid));
    }
    return $texts[$feedbackitemid];
}

function valcs_generate_teacher_score_weekly() {
    global $DB, $CFG;
    $rs = $DB->get_recordset('vgs_instructor', null, 'firstname');
    $day = date('Ymd');
    foreach ($rs as $r) {
        list($count, $results) = local_vlacsguardiansurvey_analyse_teacher($r->sis_user_idstr);
        if (!empty($count)) {
            $record = new stdClass;
            $record->sis_user_idstr = $r->sis_user_idstr;
            $record->datecreated = $day;
            // backup it in case we change answer weight and want to regenerate score
            $snapshot = new stdClass;
            $snapshot->responsecount = $count;
            $snapshot->data = $results;
            $record->snapshot = serialize($snapshot);
            $score = array();
            foreach ($results as $qid=>$q) {
                $total = 0;
                foreach ($q as $answerindex=>$answer) {
                    //echo "count: " . $answer->count . "\n";
                    $weight = vlacs_get_answer_weight($qid, $answerindex);
                    //echo "weight: " . $weight . "\n";
                    $total += $weight*$answer->count;
                }
                //echo "total count: " . $count . "\n";
                $avg = $total/$count;
                $score[$qid] = $avg;
                //echo "avg:" . ($avg). "\n";
                //echo "\n";
            }
            $record->score = serialize($score);
            if ($s = $DB->get_record('vgs_teacher_score', array('sis_user_idstr'=>$r->sis_user_idstr, 'timecreated'=>$day))) {
                $record->id = $s->id;
                $record->timemodified = time();
                $DB->update_record('vgs_teacher_score', $record);
            } else {
                $record->timecreated = time();
                $DB->insert_record('vgs_teacher_score', $record);
            }
        }
    }
    return;
}
