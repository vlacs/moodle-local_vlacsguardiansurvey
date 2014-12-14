<?php
namespace local_vlacsguardiansurvey\task;

class cron_sync_task extends \core\task\scheduled_task {
    public function get_name() {
        return get_string('cronsynctask', 'local_vlacsguardiansurvey');
    }

    public function execute() {
        global $CFG;
        require_once($CFG->dirroot . '/local/vlacsguardiansurvey/lib.php');
        local_vlacsreporting_sync_teachers();
        local_vlacsreporting_sync_enrolment();
    }

}
