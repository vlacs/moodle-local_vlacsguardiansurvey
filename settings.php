<?php

/**
 * This file adds the settings pages to the navigation menu
 *
 * @package   local_vlacsguardiansettings
 * @copyright 2014 VLA
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die;

$ADMIN->add('root', new admin_category('guardiansurvey', get_string('pluginname', 'local_vlacsguardiansurvey')));

$ADMIN->add('guardiansurvey', new admin_externalpage('vlacsguardiansurveydashboard',
    get_string('dashboard', 'local_vlacsguardiansurvey'),
    $CFG->wwwroot."/local/vlacsguardiansurvey/dashboard.php",
    'moodle/site:config'));

$ADMIN->add('guardiansurvey', new admin_externalpage('vlacsguardiansurveysettings',
    get_string('settings', 'local_vlacsguardiansurvey'),
    $CFG->wwwroot."/local/vlacsguardiansurvey/admin/settings.php",
    'moodle/site:config'));

$ADMIN->add('guardiansurvey', new admin_externalpage('vlacsguardiansurveyexport',
    get_string('export', 'local_vlacsguardiansurvey'),
    $CFG->wwwroot."/local/vlacsguardiansurvey/export.php",
    'moodle/site:config'));
