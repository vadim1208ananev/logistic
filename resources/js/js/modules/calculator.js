import $ from "jquery";

export default () => {

    // On Incoterms button clicks
    const incoterms = $('#incoterms');
    const pickupAddress = $('input[name=pickup_address]');
    const finalDestinationAddress = $('input[name=final_destination_address]');

    if (incoterms.length && pickupAddress.length && finalDestinationAddress.length) {
        incoterms.change(function () {
            const el = $(this).val();
            if (el === 'EXW') {
                pickupAddress.prop('required', true).parents('.input').removeClass('hidden');
                finalDestinationAddress.prop('required', true).parents('.input').removeClass('hidden');
            } else {
                pickupAddress.prop('required', false).parents('.input').addClass('hidden');
                finalDestinationAddress.prop('required', false).parents('.input').addClass('hidden');
            }
        });
    }

    // Add dynamic containers fields
    if ($('.calculator__buttons').length) {
        const maxFields = 50;

        const addContainerBtn = $("#add_container");
        const removeContainerBtn = $("#remove_container");
        const containerClassName = ".calculator__container";
        let containerCount = 0;
        let containerField = "";

        const addUnitBtn = $("#add-button");
        const removeUnitBtn = $("#remove-button");
        const unitClassName = ".calculator__unit";
        let unitCount = 0;
        let unitField = "";

        function totalFields(elem) {
            return $(elem).length;
        }

        function addNewContainer() {
            const container = $("#container-1");
            if (!container.length) return;

            containerCount = totalFields(containerClassName) + 1;
            containerField = container.clone();
            containerField.prop("id", "container-" + containerCount);
            containerField.find('.calculator__container-title').text("Container#" + containerCount);
            containerField.find('#container-size-1').prop("id", "container-size-" + containerCount).prev('label').prop("for", "container-size-" + containerCount);
            containerField.find('#container-weight-1').prop("id", "container-weight-" + containerCount).prev('label').prop("for", "container-weight-" + containerCount);
            containerField.find("input").val("");
            $(containerClassName + ":last").after($(containerField));
        }

        function addNewUnit() {
            const unit = $("#units-1");
            if (!unit.length) return;

            unitCount = totalFields(unitClassName) + 1;
            unitField = unit.clone();
            unitField.prop("id", "units-" + unitCount);
            unitField.find('.calculator__unit-title').text("Pallet#" + unitCount)
            unitField.find("#length_1").prop("id", "length_" + unitCount).prev('label').prop("for", "length_" + unitCount);
            unitField.find("#width_1").prop("id", "width_" + unitCount).prev('label').prop("for", "width_" + unitCount);
            unitField.find("#height_1").prop("id", "height_" + unitCount).prev('label').prop("for", "height_" + unitCount);
            unitField.find("#total_weight_units_1").prop("id", "total_weight_units_" + unitCount).prev('label').prop("for", "total_weight_units_" + unitCount);
            unitField.find("#gross_weight_1").prop("id", "gross_weight_" + unitCount).prev('label').prop("for", "gross_weight_" + unitCount);
            unitField.find("input").val("");
            $(unitClassName + ":last").after($(unitField));
        }

        function removeLastField(className) {
            if (totalFields(className) > 1) {
                $(className + ":last").remove();
            }
        }

        function enableButtonRemove(className, buttonRemove) {
            if (totalFields(className) === 2) {
                buttonRemove.removeAttr("disabled");
            }
        }

        function disableButtonRemove(className, buttonRemove) {
            if (totalFields(className) === 1) {
                buttonRemove.attr("disabled", "disabled");
            }
        }

        function disableButtonAdd(className, buttonAdd) {
            if (totalFields(className) === maxFields) {
                buttonAdd.attr("disabled", "disabled");
            }
        }

        function enableButtonAdd(className, buttonAdd) {
            if (totalFields(className) === (maxFields - 1)) {
                buttonAdd.removeAttr("disabled");
            }
        }

        function initDynamicButtons(add, remove, className, fn) {
            if (add.length && remove.length) {
                add.on('click', function() {
                    fn();
                    enableButtonRemove(className, remove);
                    disableButtonAdd(className, $(this));
                });

                remove.on('click', function() {
                    removeLastField(className);
                    disableButtonRemove(className, $(this));
                    enableButtonAdd(className, add);
                });
            }
        }

        initDynamicButtons(addContainerBtn, removeContainerBtn, containerClassName, addNewContainer);
        initDynamicButtons(addUnitBtn, removeUnitBtn, unitClassName, addNewUnit);
    }

    // Dynamic shipment
    const calculatorRadio = $('.calculator__radio');
    const shipmentBlock = $('#shipment');
    const unitsBlock = $('#units');

    if (calculatorRadio.length) {
        calculatorRadio.on('change', 'input', function() {
            const value = $(this).val();
            if (value === 'units') {
                unitsBlock.removeClass('hidden')
                unitsBlock.find('.required').prop('required', true);
                shipmentBlock.addClass('hidden');
                shipmentBlock.find('.required').prop('required', false);
            } else {
                shipmentBlock.removeClass('hidden')
                shipmentBlock.find('.required').prop('required', true);
                unitsBlock.addClass('hidden');
                unitsBlock.find('.required').prop('required', false);
            }
        })
    }
}