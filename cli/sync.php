<?php

define('CLI_SCRIPT', true);

require_once(dirname(dirname(dirname(dirname(__FILE__)))) . '/config.php');
require_once(dirname(dirname(__FILE__)) . '/lib.php');
require_once(dirname(dirname(__FILE__)) . '/locallib.php');

//local_vlacsguardiansurvey_cron();
//valcs_generate_teacher_score_weekly();
local_vlacsreporting_sync_teachers();
local_vlacsreporting_sync_enrolment();
