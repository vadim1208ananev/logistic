import $ from "jquery";

export default () => {
    const inputs = $('.file-input');

    if (!inputs.length) return;

    inputs.on('change', 'input', function() {
        const fileName = $(this).siblings('span');
        fileName.text($(this)[0].files[0].name);
    })
}