<?php

/**
 * Language file for local plugin vlacsguardiansurvey
 *
 * @package    local_vlacsguardianplugin
 * @copyright  2014 VLA
 * @author     Jerome Mouneyrac <jerome@mouneyrac.com>
 */

/** Add few string file containing massive email html */
require_once('guardianemailmessagehtml.php');
require_once('guardianremindermessagehtml.php');
require_once('guardiansecondremindermessagehtml.php');

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
$string['instructor'] = 'Instructor';
$string['errorcannotaccesssurvey'] = 'You can not access this survey because either you already answered, either the survey is outdated (2 months old).
To check your list of available surveys you can manually log in https://survey27.vlacs.org/local/vlacsguardiansurvey';
$string['erroralreadyloggedin'] = 'Someone else is already logged in Moodle please logout first and click again on the email link.';
$string['errorobsoleteperiod'] = 'The obsolete period must be higer than 0.';
$string['export'] = 'Export';
$string['guardianemailmessagetext'] = 'Dear Mr. or Ms. {$a->guardianlastname}:

At the conclusion of each VLACS course, we send a survey to parents or guardians asking for

their opinion on a number of topics. The data we collect is used to help us improve our services

to students as well as to generate reports on the overall progress of the school. Survey

responses are reviewed by VLACS administrators and VLACS instructors, however, we do not

publish information that will identify you or your child.

Student name: {$a->studentfullname}

Course title: {$a->coursefullname}

Please complete the survey by clicking on the link provided below:

 {$a->surveylink}

If you have any questions about this survey please call us at 603-778-2500 or send an email to

info@vlacs.org.

Thank you for allowing us to work with your son or daughter and for taking the time to complete

this survey.

Sincerely,

The Virtual Learning Academy Team';
$string['guardianemailsubject'] = 'Invitation: parent/guardian survey for {$a->studentfullname} - {$a->coursefullname}';
$string['guardianemailsurveyname'] = 'VLACS parent/guardian survey';
$string['guardianremindermessagetext'] = '
Dear Mr. or Ms. {$a->guardianlastname}:

This is a reminder that we are conducting our VLACS parent/guardian survey for

your child {$a->studentfullname} who completed {$a->coursefullname}. Please complete the survey by clicking on the link provided below.  If you

have any questions about this survey you can call us at 603-778-2500 or send an

email to info@vlacs.org.

Here is a link to the survey:

{$a->surveyurl}

This link is uniquely tied to this survey and your email address. Please do not

forward this message.

Thank you!

The Virtual Learning Academy Team';
$string['guardianremindersubject'] = 'Reminder:  VLACS Parent/Guardian Survey';
$string['guardianremindersurveyname'] = 'VLACS guardian survey';
$string['guardiansecondremindermessagetext'] = 'Dear Mr. or Ms. {$a->guardianlastname}:

This is a reminder that we are conducting our VLACS parent/guardian survey.

Please complete the survey by clicking on the link provided below. This will be the

last email reminder asking you to complete the survey. We do appreciate your

feedback.  If you have any questions about this survey you can call us at 603-778-

2500 or send an email to info@vlacs.org. Thank you for taking the time to

complete this survey!

Here is a link to the survey:

{$a->surveyurl}

This link is uniquely tied to this survey and your email address. Please do not

forward this message.

Thank you for your participation!

The Virtual Learning Academy Team';
$string['guardiansecondremindersubject'] = 'Final Reminder:  VLACS Parent/Guardian Survey';
$string['guardiansecondremindersurveyname'] = 'VLACS guardian survey';
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
