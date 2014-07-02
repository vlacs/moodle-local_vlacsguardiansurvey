<?php

$settings->add(new admin_setting_heading('block_vlacsguardiansurvey', get_string('pluginname', 'block_vlacsguardiansurvey'),
                   get_string('pluginname', 'block_vlacsguardiansurvey')));

$settings->add(new admin_setting_configtext('block_vlacsguardiansurvey_name',
    get_string('courseid', 'block_vlacsguardiansurvey'), get_string('courseid', 'block_vlacsguardiansurvey'),
    5, PARAM_INT));


