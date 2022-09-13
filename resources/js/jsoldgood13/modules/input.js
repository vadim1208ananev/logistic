import $ from "jquery";

export default () => {
    const inputs = $('.input__holder input, .input__holder textarea');

    if (!inputs.length) return;

    const close = $('.input__holder button');

    inputs.on('focus', function() {
        $(this).parent('.input__holder').addClass('active');
    });

    inputs.on('blur', function() {
        if (!$(this).val().length > 0) {
            $(this).parent('.input__holder').removeClass('active');
        }
    });

    inputs.on('input', function() {
        if ($(this).val().length > 0) {
            $(this).parent('.input__holder').addClass('filled');
        } else {
            $(this).parent('.input__holder').removeClass('filled');
        }
    });

    if (close.length) {
        close.on('click', function() {
            $(this).siblings('input').val('');
            $(this).parent('.input__holder').removeClass('filled').removeClass('active');
        });
    }
}