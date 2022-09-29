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

    $(".wizard-inner [role=presentation] [role=tab]").on('click',function() {

        $(".wizard-inner [role=presentation]").removeClass('active');
        $("[type=button][href^='#step']").removeClass('active');
        $(this).parent().addClass('active')
    });
    $("[type=button][href^='#step']").on('click',function(e){
        e.preventDefault()
        var attr_href=$(this).attr('href')
        var selecter=`.wizard-inner [href='${attr_href}']`;
        $(".wizard-inner [role=presentation] [role=tab]").removeClass('active');

        $(selecter).trigger('click')
    })


});
