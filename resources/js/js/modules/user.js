import $ from "jquery";

export default () => {
    const user = $('.user-block');

    if (!user.length) return;

    const btn = user.find('.user-block__btn');
    const popup = user.find('.user-block__window');

    btn.on('click',function() {
        popup.toggleClass('active');
        if (popup.hasClass('active')) {
            $(window).on('click', closeAdditionalWindows);
        } else {
            $(window).off('click', closeAdditionalWindows);
        }
    });

    const closeAdditionalWindows = (e) => {
        if (!popup.is(e.target) && popup.has(e.target).length === 0 && !btn.is(e.target) && btn.has(e.target).length === 0) {
            popup.removeClass('active');
            $(window).off('click', closeAdditionalWindows);
        }
    }
}