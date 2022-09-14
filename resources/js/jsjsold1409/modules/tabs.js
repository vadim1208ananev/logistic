import $ from "jquery";

export default () => {
    const tabs = $('.tabs');
    if (!tabs.length) return;

    const setTabs = elem => {
        elem
            .addClass('active').siblings().removeClass('active')
            .parents('.tabs')
            .find('.tabs__block')
            .removeClass('active')
            .eq(elem.index())
            .addClass('active');
    }

    tabs.on('click', '.tabs__title:not(.active)', function() {
        setTabs($(this));
    });
}