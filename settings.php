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

    // TODO: Still need to display the page, see example https://github.com/moodlehq/moodle-local_hub/blob/master/settings.php

    $settings = new admin_settingpage('local_vlacsguardiansurvey', get_string('pluginname', 'local_vlacsguardiansurvey'));

    $settings->add(new admin_setting_heading('local_vlacsguardiansurvey', get_string('pluginname', 'local_vlacsguardiansurvey'),
                       get_string('pluginname', 'local_vlacsguardiansurvey')));

    $settings->add(new admin_setting_configtext('local_vlacsguardiansurvey_name',
        get_string('courseid', 'local_vlacsguardiansurvey'), get_string('courseid', 'local_vlacsguardiansurvey'),
        5, PARAM_INT));
    $ADMIN->add('localplugins', $settings);
}


