$(document).ready(function() {

    "use strict";

    var $validator = $("#wizardForm").validate({
    rules: {
        workFor: {
            required: true
        },
        gr1: {
            required: true
        },
        gr2: {
            required: true
        },
        gr3: {
            required: true
        },
        gr4: {
            required: true
        },
        over16: {
            required: true
        },
        hours: {
            required: true
        },
        past: {
            required: true
        },
        parks: {
            required: true
        },
        egs: {
            required: true
        },
        teams: {
            required: true
        },
        role: {
            required: true
        },
      }
    });

    $('#rootwizard').bootstrapWizard({
        'tabClass': 'nav nav-tabs',
        onTabShow: function(tab, navigation, index) {
            var $total = navigation.find('li').length;
            var $current = index+1;
            var $percent = ($current/$total) * 100;
            $('#rootwizard').find('.progress-bar').css({width:$percent+'%'});
        },
        'onNext': function(tab, navigation, index) {
            var $valid = $("#wizardForm").valid();
            if(!$valid) {
                $validator.focusInvalid();
                return false;
            }
        },
        'onTabClick': function(tab, navigation, index) {
            var $valid = $("#wizardForm").valid();
            if(!$valid) {
                $validator.focusInvalid();
                return false;
            }
        },
    });


});
