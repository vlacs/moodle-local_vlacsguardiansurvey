<?php

/**
 * Cron test
 *
 * @package    local_vlacsguardiansurvey
 * @copyright  2015 VLA
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @author     Jerome Mouneyrac <jerome@mouneyrac.com>
 */

require_once(dirname(dirname(dirname(dirname(__FILE__)))) . '/config.php');

require_once(dirname(dirname(__FILE__)) . '/lib.php');

local_vlacsguardiansurvey_cron();

