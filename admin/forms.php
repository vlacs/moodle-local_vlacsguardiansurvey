<?php

/**
* Administration forms of the vlacsguardiansurvey
* @package   local_vlacsguardiansurvey
* @copyright 2014 VLA
* @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
*/
require_once($CFG->libdir . '/formslib.php');

/**
* Form to set guardian survey settings.
*/
class vlacsguardiansurvey_settings_form extends moodleform {

    /**
     * Form definition.
     */
    public function definition() {
        $mform = & $this->_form;

        $obsoleteperiod = get_config('local_vlacsguardiansurvey', 'obsoleteperiod');
        if (empty($obsoleteperiod)) {
            $obsoleteperiod = VLAGS_OBSOLETEPERIOD;
        }

        $mform->addElement('header', 'moodle', get_string('settings', 'local_vlacsguardiansurvey'));

        $mform->addElement('text', 'obsoleteperiod', get_string('obsoleteperiod', 'local_vlacsguardiansurvey')
        , array('class' => 'admintextfield'));
        $mform->setType('obsoleteperiod', PARAM_INT);
        $mform->setDefault('obsoleteperiod', $obsoleteperiod);

        $this->add_action_buttons(false, get_string('save', 'local_vlacsguardiansurvey'));
    }

    /**
    * Validate fields
    */
    function validation($data, $files) {
        $errors = parent::validation($data, $files);

        $obsoleteperiod = $this->_form->_submitValues['obsoleteperiod'];
        if ($obsoleteperiod <= 0) {
            $errors['obsoleteperiod'] = get_string('errorobsoleteperiod', 'local_vlacsguardiansurvey');
        }

        return $errors;
    }

}