<?php

/**
 * REST client for VLACS
 * from https://github.com/moodlehq/sample-ws-clients/tree/master/PHP-REST
 * Return JSON format
 *
 * @copyright  2014 VLACS
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @author Jerome Mouneyrac
 */

require_once('../../../config.php');

/// Setup.
// TOKEN NEED TO BE CHANGED.
$token = 'acabec9d20933913f14301785324f579';
$domainname = $CFG->wwwroot;
$restformat = 'json';

/// Test data.
$functionname = 'local_vlacguardiansurvey_request_survey_answer';
// PARAMS NEED TO BE CHANGED.
$params = array('enrolmentid' => 2, 'enrolmentcompleteddate' => time(), 'coursename' => 'Mathematic 101',
                'studentfullname' => 'Anna Pakin', 'guardianusername' => 'guardianjohndoe',
                'guardianemail' => 'guardianjohndoe@vlacs.org', 'guardianfirstname' => 'John',
                'guardianlastname' => 'Doe',
                'guardiancountry' => 'USA', 'guardiancity' => 'Boston');

/// The rest call.
header('Content-Type: text/plain');
$serverurl = $domainname . '/webservice/rest/server.php'. '?wstoken=' . $token . '&wsfunction='.$functionname;
require_once('./curl.php');
$curl = new curl;
$restformat = ($restformat == 'json')?'&moodlewsrestformat=' . $restformat:'';
$resp = $curl->post($serverurl . $restformat, $params);
print_r($resp);
