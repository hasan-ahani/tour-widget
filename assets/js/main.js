(function ($) {

    $('.tour-widget .tabs li').click(function (e) {
        let t = $(this),
            target = t.data('tab');
        $('.tour-widget .tabs li').removeClass('active');
        $('.tour-widget .tab-content').removeClass('active');


        t.addClass('active');
        $(target).addClass('active');
    })
    $('.tour-widget .tour-item ').mouseleave(function () {
        $('.tour-widget-detail').removeClass('hover');
    }).mouseenter(function (v) {
        let t = $(this),
            img = $('img', t).clone(),
            title = $('.tour-name', t).text(),
            start_date = t.data('start-date'),
            end_date = t.data('start-date'),
            duration = t.data('duration'),
            detail = $('.cart-item-detail');
        $('img', detail).remove();
        detail.prepend(img)
        $('strong', detail).html(title);
        $('.end_date span', detail).html(end_date);
        $('.start_date span', detail).html(start_date);
        $('.duration span', detail).html(duration);

        $('.tour-widget-detail').addClass('hover');

    }).mousemove( function(e) {

        $('.tour-widget-detail').css({
            left: e.pageX + 'px',
            top: e.pageY + 'px',
        });
    });

})(jQuery)
