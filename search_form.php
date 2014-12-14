<?php

defined('MOODLE_INTERNAL') || die();

require_once("$CFG->libdir/formslib.php");

class local_vlacsguardiansurvey_search_form extends moodleform {
    protected $formdata;

    function local_vlacsguardiansurvey_search_form($action, $data) {
        $this->formdata = $data;
        parent::moodleform($action);
    }
    function definition() {
        global $DB, $CFG;
        $mform = $this->_form;

        $rs = $DB->get_recordset('vgs_instructor', null, 'firstname');
        $teachers = array();
        foreach ($rs as $r) {
            $r->middlename = '';
            $r->alternatename = '';
            $r->lastnamephonetic = '';
            $r->firstnamephonetic = '';
            $teachers[$r->sis_user_idstr] = fullname($r);
        }

        $rs = $DB->get_recordset('vgs_course', null, 'name');
        $courses = array();
        foreach ($rs as $r) {
            $courses[$r->master_course_idstr] = $r->name;
        }
        $mform->addElement('header', 'search', get_string('search'));
        $mform->addElement('select', "teacher", get_string('instructor', 'local_vlacsguardiansurvey'), $teachers);
        $mform->addElement('select', "course", get_string('course'), $courses);
        $mform->setType("teacher", PARAM_TEXT);

        $this->add_action_buttons(false, get_string('search'));

        $this->set_data($this->formdata);
    }
}
