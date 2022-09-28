import $ from "jquery";

import handleDatepicker from './modules/datepicker';

import "air-datepicker/air-datepicker.css"


$(document).ready(() => {
    handleDatepicker();
         var selected_weight='kg'
        $("input[name='weight_type']").on('click',function () {
          selected_weight = $("input[name='weight_type']:checked").val();
            $("input[name^='container_weight']").attr("placeholder",`Weight (${selected_weight})`)
            $('.weight_type').html(selected_weight);
            });
    var selected_dimension='cm'
    $("input[name='dimension_type']").on('click',function () {
        selected_dimension = $("input[name='dimension_type']:checked").val();
        $('.dimension_type').html(selected_dimension);

    });



});
