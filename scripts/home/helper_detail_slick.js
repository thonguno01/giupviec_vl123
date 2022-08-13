$(window).scroll(function() {
    var scroll = $(this).scrollTop();
    if (scroll > 0 && !$('.slick_slider').hasClass('add_slick')) {
        $('.slick_slider').addClass('add_slick');
        $(".slick_slider").slick({
            infinite: false,
            slidesToShow: 3,
            slidesToScroll: 1,
            dots: false,
            arrows: true,
            nextArrow: `<button type='button' class='slick-next-tag'><img src="/images/helper_detail/slick_next_tag.png "/></button>`,
            prevArrow: `<button type='button' class='slick-prev-tag'><img src="/images/helper_detail/slick_prev_tag.png"/></button>`,
            responsive: [{
                breakpoint: 767,
                settings: {
                    rows: 3,
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }]
        });
    }
});