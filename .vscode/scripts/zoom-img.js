$('.slider-for-popup').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: true,
    fade: true,
    asNavFor: '.slider-nav-popup',
    prevArrow: `<button type='button' class='slick-prev pull-left'><img src="../images/arrow-left.svg"/></button>`,
    nextArrow: `<button type='button' class='slick-next pull-right'><img src="../images/arrow-right.svg"/></button>`,
});
$('.slider-nav-popup').slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    asNavFor: '.slider-for-popup',
    arrows: false,
    dots: false,
    prevArrow: `<button type='button' class='slick-prev pull-left'><img src="../images/arrow-left.svg"/></button>`,
    nextArrow: `<button type='button' class='slick-next pull-right'><img src="../images/arrow-right.svg"/></button>`,
    centerMode: false,
    focusOnSelect: false,
    responsive: [{
        breakpoint: 376,
        settings: {
            slidesToShow: 3,
            slidesToScroll: 1,
            infinite: true,
            arrows: true,
        }
    }]
});

document.getElementById('close_zoom_img').onclick = function(e) {
    document.getElementById('zoom_img').style.display = "none"

}