<?php

defined('MOODLE_INTERNAL') || die();

require_once("$CFG->libdir/formslib.php");

class vgs_update_form extends moodleform {
    function definition() {
        $mform = $this->_form;

        $question = $this->_customdata['question'];
        $answers  = $this->_customdata['answers'];

        $mform->addElement('hidden', 'feedbackitemid', $question->id);
        $mform->setType('feedbackitemid', PARAM_INT);
        $mform->addElement('header', 'question', $question->name);
        foreach($answers as $a) {
            $id = $a->id;
            $mform->addElement('text', "c{$id}", $a->answertext);
            $mform->setDefault("c{$id}", number_format($a->answerweight, 2, '.', ''));
            $mform->setType("c{$id}", PARAM_INT);
        }


        $this->add_action_buttons(false, get_string('savechanges'));

        //$this->set_data($data);
    }
}
