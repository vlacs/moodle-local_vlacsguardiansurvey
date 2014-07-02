<?php

/**
 * This file adds the settings pages to the navigation menu
 *
 * @package   local_vlacsguardiansettings
 * @copyright 2014 VLA
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die;

if ($ADMIN->fulltree) {
    $settings->add(new admin_setting_heading('block_vlacsguardiansurvey', get_string('pluginname', 'block_vlacsguardiansurvey'),
                       get_string('pluginname', 'block_vlacsguardiansurvey')));

    $settings->add(new admin_setting_configtext('block_vlacsguardiansurvey_name',
        get_string('courseid', 'block_vlacsguardiansurvey'), get_string('courseid', 'block_vlacsguardiansurvey'),
        5, PARAM_INT));
}


