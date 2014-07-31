<?php

/**
 * Upgrade code for vlacs guardian survey
 *
 * @package   local_vlacsguardiansurvey
 * @copyright 2014 VLA
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

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


    return true;
}
