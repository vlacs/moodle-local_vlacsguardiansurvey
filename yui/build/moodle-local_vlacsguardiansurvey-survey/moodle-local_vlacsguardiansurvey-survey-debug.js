YUI.add('moodle-local_vlacsguardiansurvey-survey', function (Y, NAME) {

var guardiansurvey = [];

SURVEY = function() {
    SURVEY.superclass.constructor.apply(this, arguments);
};
SURVEY.prototype = {
    initializer: function() {
        // Add the information about the survey.
        guardiansurvey = this.get('guardiansurvey');
        var enrolmentinfo = '<h3>For '+ guardiansurvey.studentfullname + ' - ' + guardiansurvey.coursename + '</h3>';
        var changesurvey = '<div class="changesurvey"><a href="' + M.cfg.wwwroot +
            '/local/vlacsguardiansurvey/index.php">Select a different course/student survey</a></div>';
        Y.one('#region-main > div > h2').insert(enrolmentinfo + changesurvey, 'after');
    }
};

Y.extend(SURVEY, Y.Base, SURVEY.prototype, {
    NAME : 'moodle-local_vlacsguardiansurvey-survey',
    ATTRS : {
        guardiansurvey : {
            validator : Y.Lang.isObject
        }
    }
});

M.local_vlacsguardiansurvey = M.local_vlacsguardiansurvey || {};

M.local_vlacsguardiansurvey.survey = M.local_vlacsguardiansurvey.survey || {};

M.local_vlacsguardiansurvey.survey.init = M.local_vlacsguardiansurvey.survey.init || function(params) {
    return new SURVEY(params);
};

}, '@VERSION@', {"requires": ["node", "transition"]});
