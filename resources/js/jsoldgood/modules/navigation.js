import $ from "jquery";

export default () => {
    const body = $('body');
    const burger = $('.header__burger');
    const navigation = $('.header__wrapper');

    burger.on('click', function(e) {
        e.preventDefault();
        $(this).toggleClass('active');
        navigation.toggleClass('active');
        body.toggleClass('fixed');
    });

    function addNavigationHandler() {
        if (navigation.hasClass('active')) {
            body.addClass('fixed');
        }
        navigation.on('click', '.main-menu__item.parent .main-menu__link', function(e) {
            e.preventDefault();
            const subMenu = $(this).next('.main-menu__sub');
            if (!subMenu.length) return;
            subMenu.slideToggle();
        });
    }

    function removedNavigationHandler() {
        navigation.off();
        $('.main-menu__sub').removeAttr('style');
        body.removeClass('fixed');
    }

    function handleWindowResizing() {
        if (window.innerWidth < 992) {
            removedNavigationHandler();
            addNavigationHandler();
        } else {
            removedNavigationHandler();
        }
    }

    handleWindowResizing();

    $(window).on('resize', handleWindowResizing);
}