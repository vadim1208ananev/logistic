import $ from "jquery";

export default () => {
    const routes = $('.form__routes');

    if (!routes.length) return;

    routes.on('change', 'input', function() {

        const form = $(this).parents('form');
        const activeRoute = form.find($('.route.active'));
        const route = form.find($(`[data-route=${$(this).val()}]`));
        const routeRadio = route.find('input');
        const routeSelect = route.find('select');

        if (routeRadio.length) {
            routeRadio.attr( 'checked', true );
            activeRoute.find('select').val('');
        }

        if (routeSelect.length) {
            routeSelect.find($('option:first')).attr( 'selected', true );
            activeRoute.find('input').attr( 'checked', false );
        }

        activeRoute.removeClass('active');
        route.addClass('active');
    });
}
