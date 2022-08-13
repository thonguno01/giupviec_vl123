$(".banner2-list").slick({
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    dots: true,
    arrows: false,
    autoplay: true,
    autoplaySpeed: 3000,
    prevArrow: `<button type='button' class='slick-prev pull-left'><img src="/images/arrow-left.svg"/></button>`,
    nextArrow: `<button type='button' class='slick-next pull-right'><img src="/images/arrow-right.svg"/></button>`,
    responsive: [{
            breakpoint: 1025,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false,
            }
        },
        {
            breakpoint: 769,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false,
            }
        },
        {
            breakpoint: 376,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false,
            }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
    ]
});
$(".customer-list").slick({
    infinite: true,
    slidesToShow: 4,
    slidesToScroll: 1,
    dots: false,
    arrows: true,
    prevArrow: `<button type='button' class='slick-prev pull-left'><img src="/images/arrow-left.svg"/></button>`,
    nextArrow: `<button type='button' class='slick-next pull-right'><img src="/images/arrow-right.svg"/></button>`,
    responsive: [{
            breakpoint: 1025,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1,
                infinite: true,
                arrows: true,
            }
        },
        {
            breakpoint: 769,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
                arrows: true,
            }
        },
        {
            breakpoint: 376,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                infinite: true,
                arrows: true,
            }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
    ]
});
//trademark-list
$(".trademark-list").slick({
    infinite: true,
    slidesToShow: 6,
    slidesToScroll: 1,
    dots: false,
    arrows: true,
    prevArrow: `<button type='button' class='slick-prev pull-left'><img src="/images/arrow-left.svg"/></button>`,
    nextArrow: `<button type='button' class='slick-next pull-right'><img src="/images/arrow-right.svg"/></button>`,
    responsive: [{
            breakpoint: 1025,
            settings: {
                slidesToShow: 5,
                slidesToScroll: 1,
                infinite: true,
                arrows: true,
            }
        },
        {
            breakpoint: 769,
            settings: {
                slidesToShow: 4,
                slidesToScroll: 1,
                arrows: true,
            }
        },
        {
            breakpoint: 376,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1,
                infinite: true,
                arrows: true,
            }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
    ]
});
const toggle = document.querySelector(".menu-toggle");
const menu = document.querySelector(".menu");
const activeClass = "is-show";
toggle.addEventListener("click", function() {
    menu.classList.add(activeClass);
});
window.addEventListener("click", function(e) {
    if (!menu.contains(e.target) && !e.target.matches(".menu-toggle")) {
        menu.classList.remove(activeClass);
    }
});
//redirect
function button_7() {
    location.replace("https://chamcong.timviec365.com/")
}