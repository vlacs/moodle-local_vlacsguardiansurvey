<?php

require_once($CFG->dirroot.'/blocks/vlaredirect/lib.php');
require_once($CFG->dirroot.'/blocks/vlacsguardiansurvey/locallib.php');

class block_vlacsguardiansurvey extends block_base {

    function init() {
        $this->title = get_string('pluginname', 'block_vlacsguardiansurvey');
        $this->version = 2014070100;
    }

    function get_content() {
        global $COURSE, $USER, $CFG;

        if (isset($this->content)) {
            return $this->content;
        }

        if ($COURSE->id != SITEID and !empty($CFG->surveys_enabled)) {
            $cre = vlacs_redirect::course2enrolment($USER->id, $COURSE->id);

            if(empty($cre)) {
                return $this->content;
            }

            // Check if the guardian user needs to have the survey answered.
            $sph = get_record('viewm_student_progress', 'enrolment_idstr', $cre->enrolment_idstr);

            // Fake percent_complete > 90001
            $sph = new stdClass();
            $sph->percent_complete = 9001;

            if($sph->percent_complete > 9000) {
                sent_guardian_survey_email();
            }

            $this->content = new object;
            $this->content->text = 'test';
            $this->content->footer = '';
        }

        return $this->content;
    }

    /**
     * Has instance config
     * @return boolean
     **/
    function instance_allow_config() {
        return true;
    }
}

?>
