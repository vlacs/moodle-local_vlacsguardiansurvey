<?php

// get our moodle on

require_once('../../config.php');
require_once($CFG->libdir . '/moodlelib.php');
require_once($CFG->libdir . '/weblib.php');
require_once($CFG->libdir . '/dmllib.php');

// require login

require_login(0, false);

// title and navbar

$title = get_string('surveylist', 'block_vlacsguardiansurvey');
$nav = array(
    array('name' => $title)
);

print_header($title, $title, build_navigation($nav));

// List of the exit surveys.
echo 'View';

print_footer();

?>
