<?php
namespace local_vlacsguardiansurvey\task;

class cron_analytics_task extends \core\task\scheduled_task {
    public function get_name() {
        return get_string('cronanalyticstask', 'local_vlacsguardiansurvey');
    }

    public function execute() {
        global $CFG;
        require_once($CFG->dirroot . '/local/vlacsguardiansurvey/lib.php');
        valcs_generate_teacher_score_weekly();
    }

}
