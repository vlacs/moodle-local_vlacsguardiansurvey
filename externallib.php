<?php

/**
 * External vlacsguardiansurvey API
 *
 * @package    local_vlacsguardiansurvey
 * @category   external
 * @copyright  2014 VLACS
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die;

require_once("$CFG->libdir/externallib.php");

/**
 * vlacsguardiansurvey external functions
 *
 * @package    local_vlacsguardiansurvey
 * @category   external
 * @copyright  2014 VLACS
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class local_vlacsguardiansurvey_external extends external_api {

    /**
     * Returns description of method parameters
     *
     * @return external_function_parameters
     */
    public static function request_survey_answer_parameters() {
        return new external_function_parameters(
            array('enrolmentid' => new external_value(PARAM_INT, 'enrolment id'),
                  'enrolmentcompleteddate' => new external_value(PARAM_INT, 'enrolment completed date'),
                  'studentfullname' => new external_value(PARAM_TEXT, 'student fullname'),
                  'coursename' => new external_value(PARAM_TEXT, 'course name'),
                  'guardianusername' => new external_value(PARAM_USERNAME, 'guardian username'),
                  'guardianemail' => new external_value(PARAM_EMAIL, 'guardian email'),
                  'guardianfirstname' => new external_value(PARAM_TEXT, 'guardian first name'),
                  'guardianlastname' => new external_value(PARAM_TEXT, 'guardian last name'),
                  'guardiancountry' => new external_value(PARAM_ALPHANUMEXT, 'guardian country'),
                  'guardiancity' => new external_value(PARAM_TEXT, 'guardian city'),

            )
        );
    }

    /**
     * Send an email to the huardian.
     *
     * @param $enrolmentid
     * @param $enrolmentcompleteddate
     * @param $coursename
     * @param $studentfullname
     * @param $guardianusername
     * @param $guardianemail
     * @param $guardianfirstname
     * @param $guardianlastname
     * @param $guardiancountry
     * @param $guardiancity
     * @return stdClass
     * @throws moodle_exception
     */
    public static function request_survey_answer($enrolmentid, $enrolmentcompleteddate,
                                                 $coursename, $studentfullname,
            $guardianusername, $guardianemail, $guardianfirstname, $guardianlastname, $guardiancountry, $guardiancity) {
        global $CFG, $DB;
        require_once($CFG->dirroot . "/course/lib.php");

        // Validate parameters.
        $params = self::validate_parameters(self::request_survey_answer_parameters(),
            array('enrolmentid' => $enrolmentid, 'enrolmentcompleteddate' => $enrolmentcompleteddate,
                'coursename' => $coursename, 'studentfullname' => $studentfullname, 'guardianusername' => $guardianusername
                'guardianemail' => $guardianemail, 'guardianfirstname' => $guardianfirstname
                'guardianfirstname' => $guardianfirstname, 'guardianlastname' => $guardianlastname
                'guardiancountry' => $guardiancountry, 'guardiancity' => $guardiancity));

        // now security checks
        $context = context_system::instance();
        try {
            self::validate_context($context);
        } catch (Exception $e) {
            $exceptionparam = new stdClass();
            $exceptionparam->message = $e->getMessage();
            throw new moodle_exception('errorcontextnotvalid', 'webservice', '', $exceptionparam);
        }

        $canrequestguardian = has_capability('local/vlacsguardiansurvey:request', $context);

        require_once($CFG->dirroot . '/local/vlacsguardiansurvey/locallib.php');
        ask_guardian_to_answer_exit_survey($params);

        // TODO
        $result = new stdClass();
        $result->success = true;
        return $result;
    }

    /**
     * Returns description of method result value
     *
     * @return external_single_structure
     */
    public static function request_survey_answer_returns() {
        return new external_single_structure(
                array(
                    'success' => new external_value(PARAM_INT, 'success')
                )
            );
    }

}
