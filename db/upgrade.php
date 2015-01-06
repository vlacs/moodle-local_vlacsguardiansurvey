<?php

/**
 * Upgrade code for vlacs guardian survey
 *
 * @package   local_vlacsguardiansurvey
 * @copyright 2014 VLA
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
require_once(dirname(dirname(__FILE__)) . '/lib.php');

/**
 * upgrade process
 * @param int $oldversion The old version of the assign module
 * @return bool
 */
function xmldb_local_vlacsguardiansurvey_upgrade($oldversion) {
    global $DB;

    $dbman = $DB->get_manager();

    if ($oldversion < 2014073101) {

        // Changing type of field enrolmentid on table guardiansurvey to char.
        $table = new xmldb_table('guardiansurvey');
        $field = new xmldb_field('enrolmentid', XMLDB_TYPE_CHAR, '255', null, XMLDB_NOTNULL, null, null, 'submissionid');

        // Launch change of type for field enrolmentid.
        $dbman->change_field_type($table, $field);

        // Local savepoint reached.
        upgrade_plugin_savepoint(true, 2014073101, 'local', 'vlacsguardiansurvey');
    }

    if ($oldversion < 2014073102) {

        // Define field emailsentdate to be dropped from guardiansurvey.
        $table = new xmldb_table('guardiansurvey');
        $field = new xmldb_field('firstaccessdate');

        // Conditionally launch drop field emailsentdate.
        if ($dbman->field_exists($table, $field)) {
            $dbman->drop_field($table, $field);
        }

        // Define field emailsentdate to be dropped from guardiansurvey.
        $table = new xmldb_table('guardiansurvey');
        $field = new xmldb_field('lastaccessdate');

        // Conditionally launch drop field emailsentdate.
        if ($dbman->field_exists($table, $field)) {
            $dbman->drop_field($table, $field);
        }

        // Local savepoint reached.
        upgrade_plugin_savepoint(true, 2014073102, 'local', 'vlacsguardiansurvey');
    }

    if ($oldversion < 2015010600) {

        // Define field remindersentdate to be added to guardiansurvey.
        $table = new xmldb_table('guardiansurvey');
        $field = new xmldb_field('remindersentdate', XMLDB_TYPE_INTEGER, '10', null, null, null, null, 'emailsentdate');

        // Conditionally launch add field remindersentdate.
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }

        // Define field remindernumber to be added to guardiansurvey.
        $table = new xmldb_table('guardiansurvey');
        $field = new xmldb_field('remindernumber', XMLDB_TYPE_INTEGER, '4', null, null, null, '0', 'remindersentdate');

        // Conditionally launch add field remindernumber.
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }

        // Local savepoint reached.
        upgrade_plugin_savepoint(true, 2015010600, 'local', 'vlacsguardiansurvey');
    }

    if ($oldversion < 2015010601) {

        // Define field authtoken to be added to guardiansurvey.
        $table = new xmldb_table('guardiansurvey');
        $field = new xmldb_field('authtoken', XMLDB_TYPE_CHAR, '255', null, null, null, null, 'remindernumber');

        // Conditionally launch add field authtoken.
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }

        // Local savepoint reached.
        upgrade_plugin_savepoint(true, 2015010601, 'local', 'vlacsguardiansurvey');
    }



    if ($oldversion < 2014073115) {

        // Define table vgs_feedback_answers to be created.
        $table = new xmldb_table('vgs_feedback_answers');

        // Adding fields to table vgs_feedback_answers.
        $table->add_field('id', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, XMLDB_SEQUENCE, null);
        $table->add_field('answerindex', XMLDB_TYPE_INTEGER, '10', null, null, null, null);
        $table->add_field('answertext', XMLDB_TYPE_TEXT, null, null, null, null, null);
        $table->add_field('answerweight', XMLDB_TYPE_NUMBER, '20, 2', null, null, null, '1.0');
        $table->add_field('feedback_item_id', XMLDB_TYPE_INTEGER, '10', null, null, null, null);

        // Adding keys to table vgs_feedback_answers.
        $table->add_key('primary', XMLDB_KEY_PRIMARY, array('id'));

        // Conditionally launch create table for vgs_feedback_answers.
        if (!$dbman->table_exists($table)) {
            $dbman->create_table($table);
        }

        // Define table vgs_instructor to be created.
        $table = new xmldb_table('vgs_instructor');

        // Adding fields to table vgs_instructor.
        $table->add_field('id', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, XMLDB_SEQUENCE, null);
        $table->add_field('sis_user_idstr', XMLDB_TYPE_CHAR, '255', null, null, null, null);
        $table->add_field('firstname', XMLDB_TYPE_CHAR, '255', null, null, null, null);
        $table->add_field('lastname', XMLDB_TYPE_CHAR, '255', null, null, null, null);
        $table->add_field('timecreated', XMLDB_TYPE_INTEGER, '10', null, null, null, null);
        $table->add_field('timemodified', XMLDB_TYPE_INTEGER, '10', null, null, null, null);

        // Adding keys to table vgs_instructor.
        $table->add_key('primary', XMLDB_KEY_PRIMARY, array('id'));

        // Conditionally launch create table for vgs_instructor.
        if (!$dbman->table_exists($table)) {
            $dbman->create_table($table);
        }



        // Define table vgs_course to be created.
        $table = new xmldb_table('vgs_course');

        // Adding fields to table vgs_course.
        $table->add_field('id', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, XMLDB_SEQUENCE, null);
        $table->add_field('sis_user_idstr', XMLDB_TYPE_CHAR, '255', null, null, null, null);
        $table->add_field('master_course_idstr', XMLDB_TYPE_CHAR, '255', null, null, null, null);
        $table->add_field('name', XMLDB_TYPE_CHAR, '255', null, null, null, null);
        $table->add_field('timecreated', XMLDB_TYPE_INTEGER, '10', null, null, null, null);
        $table->add_field('timemodified', XMLDB_TYPE_INTEGER, '10', null, null, null, null);
        $table->add_field('department_idstr', XMLDB_TYPE_CHAR, '255', null, null, null, null);

        // Adding keys to table vgs_course.
        $table->add_key('primary', XMLDB_KEY_PRIMARY, array('id'));

        // Conditionally launch create table for vgs_course.
        if (!$dbman->table_exists($table)) {
            $dbman->create_table($table);
        }


        // Define table vgs_enrolment to be created.
        $table = new xmldb_table('vgs_enrolment');

        // Adding fields to table vgs_enrolment.
        $table->add_field('id', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, XMLDB_SEQUENCE, null);
        $table->add_field('master_course_idstr', XMLDB_TYPE_CHAR, '255', null, null, null, null);
        $table->add_field('enrolment_idstr', XMLDB_TYPE_CHAR, '255', null, null, null, null);
        $table->add_field('sis_user_idstr', XMLDB_TYPE_CHAR, '255', null, null, null, null);

        // Adding keys to table vgs_enrolment.
        $table->add_key('primary', XMLDB_KEY_PRIMARY, array('id'));

        // Conditionally launch create table for vgs_enrolment.
        if (!$dbman->table_exists($table)) {
            $dbman->create_table($table);
        }

        // Define table vgs_results to be created.
        $table = new xmldb_table('vgs_teacher_score');

        // Adding fields to table vgs_results.
        $table->add_field('id', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, XMLDB_SEQUENCE, null);
        $table->add_field('sis_user_idstr', XMLDB_TYPE_CHAR, '255', null, null, null, null);
        $table->add_field('timecreated', XMLDB_TYPE_INTEGER, '10', null, null, null, null);
        $table->add_field('timemodified', XMLDB_TYPE_INTEGER, '10', null, null, null, null);
        $table->add_field('snapshot', XMLDB_TYPE_TEXT, null, null, null, null, null);
        $table->add_field('score', XMLDB_TYPE_TEXT, null, null, null, null, null);

        // Adding keys to table vgs_results.
        $table->add_key('primary', XMLDB_KEY_PRIMARY, array('id'));

        // Conditionally launch create table for vgs_results.
        if (!$dbman->table_exists($table)) {
            $dbman->create_table($table);
        }

        local_vlacsreporting_sync_feedback_answers();
        // Vlacsguardiansurvey savepoint reached.
        upgrade_plugin_savepoint(true, 2014073115, 'local', 'vlacsguardiansurvey');
    }

    if ($oldversion < 2015010101) {

        // Define table vgs_instructor_course to be created.
        $table = new xmldb_table('vgs_instructor_course');

        // Adding fields to table vgs_instructor_course.
        $table->add_field('id', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, XMLDB_SEQUENCE, null);
        $table->add_field('sis_user_idstr', XMLDB_TYPE_CHAR, '255', null, XMLDB_NOTNULL, null, null);
        $table->add_field('master_course_idstr', XMLDB_TYPE_CHAR, '255', null, XMLDB_NOTNULL, null, null);

        // Adding keys to table vgs_instructor_course.
        $table->add_key('primary', XMLDB_KEY_PRIMARY, array('id'));

        // Conditionally launch create table for vgs_instructor_course.
        if (!$dbman->table_exists($table)) {
            $dbman->create_table($table);
        }

        // Vlacsguardiansurvey savepoint reached.
        upgrade_plugin_savepoint(true, 2015010101, 'local', 'vlacsguardiansurvey');
    }

    return true;
}
