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

require_once('../../../../config.php');

/// Setup.
// TOKEN NEED TO BE CHANGED.
$token = '7cb794c8f5a49a9928723cc70a7f8e9b';
$domainname = $CFG->wwwroot;
$restformat = 'json';

/// Test data.
$functionname = 'local_vlacsguardiansurvey_request_survey_answer';
// PARAMS CAN BE CHANGED BUT ATTRIBUTS KEPT IN THE SAME ORDER!
$enrolmentid = 5;
$params = array('enrolmentid' => $enrolmentid,
                'enrolmentcompleteddate' => time(),
                'studentfullname' => 'Anna Pakin',
                'coursename' => 'Mathematic 101',
                'guardianusername' => 'guardianjohndoe',
                'guardianemail' => 'guardianjohndoe@vlacs.org',
                'guardianfirstname' => 'John',
                'guardianlastname' => 'Doe',
                'guardiancountry' => 'us',
                'guardiancity' => 'Boston');

/// The rest call.
header('Content-Type: text/plain');
$serverurl = $domainname . '/webservice/rest/server.php'. '?wstoken=' . $token . '&wsfunction='.$functionname;
require_once('./curl.php');
$curl = new curl;
$restformat = ($restformat == 'json')?'&moodlewsrestformat=' . $restformat:'';
$resp = $curl->post($serverurl . $restformat, $params);
print_r($resp);
