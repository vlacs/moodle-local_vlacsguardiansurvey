<?php

/**
 * Language file for local plugin vlacsguardiansurvey
 *
 * @package    local_vlacsguardianplugin
 * @copyright  2014 VLA
 * @author     Jerome Mouneyrac <jerome@mouneyrac.com>
 */


$string['pluginname'] = 'VLACS Parent/Guardian Survey';
$string['answer'] = 'Answer';
$string['answered'] = 'Answered';
$string['answeredunknownsurvey'] = 'Sorry, an unexpected error happened. Click on Continue to go to your survey list.
Pick the correct survey from the list and answer it again.';
$string['course'] = 'Course';
$string['coursecompleted'] = 'Course Completed';
$string['courseid'] = 'Course ID';
$string['courseidhelp'] = 'Course ID (get it from the url)';
$string['dashboard'] = 'Dashboard';
$string['errorobsoleteperiod'] = 'The obsolete period must be higer than 0.';
$string['guardianemailmessagehtml'] = 'Dear {$a->guardianfirstname},<br /><br />
    Please let us know about your experience at VLACS by answering our
 {$a->surveylink} for {$a->studentfullname}, who recently completed
 <strong>{$a->coursefullname}</strong>. (You will need your VLACS username and
 password to access the survey -- please <a
 href="http://helpdesk.vlacs.org">contact us</a> if you have any questions!)
 <br/><br/>Thank you,<br/>The VLACS Team';
$string['guardianemailmessagetext'] = 'Dear {$a->guardianfirstname},

    Please let us know about your experience at VLACS by answering our Parent/Guardian survey ({$a->surveyurl}) for {$a->studentfullname}, who recently completed "{$a->coursefullname}". (You will need your VLACS username and password to access the survey -- please contact us (http://helpdesk.vlacs.org) if you have any questions!)

 Thank you,
 The VLACS Team';
$string['instructor'] = 'Instructor';
$string['guardianemailsubject'] = 'Invitation: parent/guardian survey for {$a->studentfullname} - {$a->coursefullname}';
$string['guardianemailsurveyname'] = 'VLACS parent/guardian survey';
$string['nosurveys'] = 'No Parent/Guardian Exit survey to answer. Well done!';
$string['obsoleteperiod'] = 'Survey duration in days';
$string['obsoleteperiodhelp'] = 'Number of days after what the guardian can not answer survey anymore - the period start from the enrolment completed date.';
$string['reference'] = 'Reference';
$string['save'] = 'Save';
$string['saved'] = 'Saved';
$string['settings'] = 'Parent/Guardian survey settings';
$string['settingsupdated'] = 'Settings updated.';
$string['student'] = 'Student';
$string['surveyanswered'] = 'Survey answered';
$string['surveyid'] = 'Survey ID';
$string['surveyidhelp'] = 'Survey ID (get it from the url)';
$string['surveylist'] = 'Parent/Guardian surveys';
$string['unallowedtoanswer'] = 'Sorry, you are not allowed to answer this feedback. Click on Continue to go to your survey list.
Pick the correct survey from the list and answer it again.';
$string['chooseinstructor'] = 'Choose an instructor';
$string['choosecourse'] = 'Choose a course';
$string['cronanalyticstask'] = 'Analysing survey results';
$string['cronsynctask'] = 'Syncing enrolment and course info';
$string['editanswerweight'] = 'Edit answer weight';
