<?php

/**
 * Web service for local vlacsguardiansurvey
 * @package    local_vlacsguardiansurvey
 * @subpackage db
 * @copyright  2014
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

$functions = array(
        'local_vlacsguardiansurvey_request_survey_answer' => array(
                'classname'   => 'local_vlacsguardiansurvey_external',
                'methodname'  => 'request_survey_answer',
                'classpath'   => 'local/vlacsguardiansurvey/externallib.php',
                'description' => 'Ask the guardian by email to answer the exit survey.',
                'type'        => 'write'
        )
);

$services = array(
    'VLACS Guardian Survey Web Service'  => array(
        'functions' => array ('local_vlacsguardiansurvey_request_survey_answer'),
        'enabled' => 1,
        'restrictedusers' => 0,
        'shortname' => 'local_vlacsguardiansurvey_service',
        'downloadfiles' => 0,
        'uploadfiles' => 0
    ),
);