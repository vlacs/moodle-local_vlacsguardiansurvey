<?php

/**
 * Event observers definition.
 *
 * @package local_vlacsguardiansurvey
 * @category event
 * @copyright 2014 VLACS
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

$observers = array(

    // Survey response submitted.
    array(
        'eventname' => '\mod_feedback\event\response_submitted',
        'callback' => 'survey_is_submitted',
        'includefile' => '/local/vlacsguardiansurvey/locallib.php'
    )
);