import $ from "jquery";
import "select2/dist/js/select2.min";

import handleNavigation from './modules/navigation';
import handleInput from './modules/input';
import handleSelect from './modules/select';
import handleTabs from './modules/tabs';
import handleDatepicker from './modules/datepicker';
import handleRoute from './modules/route';
import handleCalculator from './modules/calculator';
import handleFileInput from './modules/file';

//import '../scss/main.scss';

$(document).ready(() => {
    handleNavigation();
    handleInput();
    handleSelect();
    handleTabs();
    handleDatepicker();
    handleRoute();
    handleCalculator();
    handleFileInput();

    var weight_type='KG';
    $('.weight_type').html(weight_type);
    $(document).on('change', "input[name='weight_type']", function() {
        if ($(this).is(':checked')) {
            weight_type = 'POUNDS';
        } else {
            weight_type = 'KG';
        }
        $('.weight_type').html(weight_type);
    });

    var dimension_type='CM';
    $('.dimension_type').html(dimension_type);
    $(document).on('change', "input[name='dimension_type']", function() {
        if ($(this).is(':checked')) {
            dimension_type='INCHES';
        } else { dimension_type='CM'; }
        $('.dimension_type').html(dimension_type);

    });

    $(document).on('keyup', "input[name^='l'], input[name^='w'], input[name^='h']", function () {

        var const_coeffiient=6000;
        var $el = $(this);
        var $unit_num = $el.parent().parent().parent();
        if ($unit_num.find("input[name^='l']").val() && $unit_num.find("input[name^='w']").val() &&
            $unit_num.find("input[name^='h']").val()) {
            var l = $unit_num.find("input[name^='l']").val();
            var w = $unit_num.find("input[name^='w']").val();
            var h = $unit_num.find("input[name^='h']").val();
            var total_weight = (l * w * h) / const_coeffiient;
            $unit_num.find("input[name^='total_weight_units']").val(total_weight.toFixed(2));
        }
    });
  /*  function initialize() {
        var input = document.getElementById('shipment-origin');
        new google.maps.places.Autocomplete(input);
        var input1 = document.getElementById('shipment-destination');
        new google.maps.places.Autocomplete(input1);
    }

    google.maps.event.addDomListener(window, 'load', initialize)*/

});
