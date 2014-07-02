<?php

/**
 * The survey questions that need to be added to a survey when a new survey is created.
 *
 * @package    local_vlacsguardiansurvey
 * @copyright  2014 VLA
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @author     Jerome Mouneyrac <jerome@mouneyrac.com>
 */

$surveydata = array();

$question1 = new stdClass();
$question1->name = 'Before my child began the course,
I participated in a welcome voice call with his/her instructor that also included my child';
$question1->comment = 'If you answered \'no\', please explain';
$question1->type = 'yesno';

$question2 = new stdClass();
$question2->name = 'I(or another parent/guardian) participated in a monthly voice call
with the instructor and my son/daughter to discuss course progress';
$question2->comment = 'If you answered \'rarely or never\', please explain';
$question2->type = 'list';
$question2->list = array('rarely', 'never');

$question3 = new stdClass();
$question3->name = 'Why did your son/daughter enroll in a VLACS course(s)?';
$question3->type = 'list';
$question3->list = array('To retake a failed course', 'to meet a course competency requirement at school',
    'for a course needed to graduate on time with class', 'as an alternative to dropping out of school',
    'to graduate early', 'Acceleartion(course earlier than normal)',
    'to earn college credit', 'personal preference', 'part of a homeschool curriculum',
    'course not offered at school', 'to solve a scheduling conflict', 'hospital/homebound',
    'part of a GED/adult ed program', 'part of an internship/ELO',
    'because all students are required to take an online class at school', 'Reason not listed, please comment');

$question4 = new stdClass();
$question4->name = 'Have you communicated with VLACS personnel(counselor, admission,technology, general information, etc.)?';
$question4->type = 'yesno';

$question5 = new stdClass();
$question5->name = 'If you communicated with VLACS personnel, please rate your experience.';
$question5->type = 'list';
$question5->list = array('Excellent', 'Very good', 'Good', 'Fair', 'Poor');

$question6 = new stdClass();
$question6->name = 'Has your son/daughter communicated with VLACS personnel(counselor,
admission,technology, general information, etc.)?';
$question6->type = 'yesno';

$question7 = new stdClass();
$question7->name = 'If your son/daughter communicated with VLACS personnel, please rate the experience.';
$question7->type = 'list';
$question7->list = array('Excellent', 'Very good', 'Good', 'Fair', 'Poor');

$question8 = new stdClass();
$question8->name = 'Would you encourage your child to participate in other VLACS courses?';
$question8->type = 'yesno';

$question9 = new stdClass();
$question9->name = 'Would you recommend VLACS to other parents?';
$question9->type = 'yesno';

$question10 = new stdClass();
$question10->name = 'My son\'s/daughter\'s experience regarding technical issues associated with VLACS applications
(e.g., online course material, online classroom,VLACS communicator, dead links within courses Adobe Connect, etc.)';
$question10->type = 'list';
$question10->list = array('Excellent', 'Very good', 'Good', 'Fair', 'Poor');

$question11 = new stdClass();
$question11->name = 'Most questions related to technical issues were answered';
$question11->type = 'list';
$question11->list = array('Strongly agree', 'Agree', 'Neither agree or disagree', 'Disagree', 'Strongly disagree');

$question12 = new stdClass();
$question12->name = 'Most technical issues were resolved';
$question12->type = 'list';
$question12->list = array('Strongly agree', 'Agree', 'Neither agree or disagree', 'Disagree', 'Strongly disagree');

$question13 = new stdClass();
$question13->name = 'Overall, communication with my son\'s daughter\'s instructor was';
$question13->type = 'list';
$question13->list = array('Excellent', 'Very good', 'Good', 'Fair', 'Poor');

$question14 = new stdClass();
$question14->name = 'My son\'s/daughter\'s instructor was helpful and encouraging, bringing out the best in him/her';
$question14->type = 'list';
$question14->list = array('Strongly agree', 'Agree', 'Neither agree or disagree', 'Disagree', 'Strongly disagree');

$question15 = new stdClass();
$question15->name = 'Please comment on the quality of your experience with the course instructor or VLACS instructors
in general';
$question15->type = 'text';

$question16 = new stdClass();
$question16->name = 'I used the Academic Help Desk';
$question16->type = 'yesno';

$question17 = new stdClass();
$question17->name = 'My son/daughter used the academic help desk';
$question17->type = 'yesno';

$question18 = new stdClass();
$question18->name = 'My son\'s/daughter\'s instructor was knowledgeable about the course and subject';
$question18->type = 'list';
$question18->list = array('Strongly agree', 'Agree', 'Neither agree or disagree', 'Disagree', 'Strongly disagree');

$question19 = new stdClass();
$question19->name = 'My son/daughter has completed acourse at a public or private middle school or high school,
and the difficulties or challenges of this VLACS course was';
$question19->type = 'list';
$question19->list = array('Much harder', 'Harder', 'Same', 'Somewhat easier', 'Much easier',
    'hasn\'t taken a course at a public or private school');

$question20 = new stdClass();
$question20->name = 'Please estimate the hours per week that your son/daughter spent working on his/her course was
(please include work done at home and if applicable in a school as part of a computer lab, study hall,
or scheduled online class):';
$question20->type = 'list';
$question20->list = array('1 hour or less', '1-2 hours', '3-4 hours', '5-7 hours', '8-10 hours', '10 hours or more');

$surveydata['protocols'] = new stdClass();
$surveydata['protocols']->questions = array($question1, $question2);
$surveydata['protocols']->name = 'Are all communications protocols followed?';

$surveydata['reasons'] = new stdClass();
$surveydata['reasons']->questions = array($question3);
$surveydata['reasons']->name = 'Reason for taking course through VLACS';

$surveydata['customerservice'] = new stdClass();
$surveydata['customerservice']->questions = array($question4, $question5, $question6, $question7, $question8, $question9);
$surveydata['customerservice']->name = 'Customer Service';

$surveydata['technicalissues'] = new stdClass();
$surveydata['technicalissues']->questions = array($question10, $question11, $question12);
$surveydata['technicalissues']->name = 'Technical issues';

$surveydata['cominstructor'] = new stdClass();
$surveydata['cominstructor']->questions = array($question13, $question14, $question15);
$surveydata['cominstructor']->name = 'Communication with Instructor';

$surveydata['helpdesk'] = new stdClass();
$surveydata['cominstructor']->questions = array($question16, $question17);
$surveydata['cominstructor']->name = 'Academic help desk';

$surveydata['rigor'] = new stdClass();
$surveydata['cominstructor']->questions = array($question18, $question19, $question20);
$surveydata['cominstructor']->name = 'Rigor of courses';
