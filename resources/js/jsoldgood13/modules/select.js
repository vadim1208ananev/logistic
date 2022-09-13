import $ from "jquery";

export default () => {
    const selects = $('select');
    if (!selects.length) return;

    selects.each((i, select) => {
        const parent = $(select).parent();
        $(select).select2({
            dropdownParent: parent
        });
    })
}
