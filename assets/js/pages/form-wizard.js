$(document).ready(function() {

    "use strict";

    var $validator = $("#wizardForm").validate({
    rules: {
        email: {
            required: true
        },
        madeItOk: {
            required: true
        },
        didWrong: {
            required: true
        },
        inFuture: {
            required: true
        },
        feelUnbanned: {
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
