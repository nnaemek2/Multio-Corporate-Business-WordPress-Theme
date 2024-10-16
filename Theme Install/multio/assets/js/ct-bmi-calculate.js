jQuery(function($) {
	"use strict";
	$(document).on('click','.ct-bmi-calc1',function(e){
    var formValidate = $(this).closest('form')[0];
    if(formValidate.checkValidity()){
        e.preventDefault();
        var thisForm =  $(this).parent('form');
        var weight = thisForm.find('.weight').val();
        var height = thisForm.find('.height').val();
        var result = (parseInt(weight) / Math.pow(parseInt(height) / 100, 2)).toFixed(2);
        thisForm.parent().find('.bmi-result').html(result);

        var result_wrap = thisForm.parent().find('.ct-bmi-result');
        var data_chart = result_wrap.data('chart');
        var data_array = data_chart.split(',');
        var bmi_status = '';
        if (result < 18.5)
        {
            bmi_status = data_array[0];
        }
        else if (result >= 18.5 && result <= 24.99)
        {
            bmi_status = data_array[1];
        }
        else if (result >= 25 && result <= 29.99)
        {
            bmi_status = data_array[2];
        }
        else
        {
            bmi_status = data_array[3];
        }
        thisForm.parent().find('.bmi-status').html(bmi_status);

        thisForm.parent().find('.ct-bmi-result').show();
    }
});

$(document).on('click','.ct-bmi-calc2',function(e){
    var formValidate = $(this).closest('form')[0];
    if(formValidate.checkValidity()){
        e.preventDefault();
        var thisForm =  $(this).parent('form');
        var weight = thisForm.find('.weight').val();
        var ft = thisForm.find('.ft').val();
        var inc = thisForm.find('.inc').val();
        var result = (703 * parseInt(weight) / Math.pow((parseInt(ft)*12) + parseInt(inc), 2)).toFixed(2);
        thisForm.parent().find('.bmi-result').html(result);

        var result_wrap = thisForm.parent().find('.ct-bmi-result');
        var data_chart = result_wrap.data('chart');
        var data_array = data_chart.split(',');
        var bmi_status = '';
        if (result < 18.5)
        {
            bmi_status = data_array[0];
        }
        else if (result >= 18.5 && result <= 24.99)
        {
            bmi_status = data_array[1];
        }
        else if (result >= 25 && result <= 29.99)
        {
            bmi_status = data_array[2];
        }
        else
        {
            bmi_status = data_array[3];
        }
        thisForm.parent().find('.bmi-status').html(bmi_status);

        thisForm.parent().find('.ct-bmi-result').show();
    }
});
$(document).on('click','.type-select.bmi-radio', function(e){
    e.preventDefault();
    if ( $(this).val() === 'int' ) {
        $(this).parents('.bmi-form-wrap').find('.m-form').show();
        $(this).parents('.bmi-form-wrap').find('.i-form').hide();
    } else if ( $(this).val() === 'us' ) {
        $(this).parents('.bmi-form-wrap').find('.m-form').hide();
        $(this).parents('.bmi-form-wrap').find('.i-form').show();
    }
    var attr = $(this).attr('checked');
    if (attr === 'checked') {
        $(this).parents('.radio-types').find('.type-select').attr("checked", false);
        $(this).attr('checked', true);
    }
});
});
