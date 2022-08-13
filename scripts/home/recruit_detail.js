$(".slick_slider_recruit").slick({
    infinite: true,
    slidesToShow: 3,
    slidesToScroll: 1,
    dots: false,
    arrows: true,
    // autoplay: true,
    nextArrow: `<button type='button' class='slick-next-tag'><img src="/images/helper_detail/slick_next_tag.png "/></button>`,
    prevArrow: `<button type='button' class='slick-prev-tag'><img src="/images/helper_detail/slick_prev_tag.png"/></button>`,
    responsive: [{
            breakpoint: 767,
            settings: {
                rows: 3,
                dots: false,
                arrows: true,
                infinite: true,
                speed: 300,
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
    ]
});

$(".block").hover(function() {
    this.querySelector('.img_add').innerHTML = `<img src="/images/recruit_detail/add_trang.svg " alt="Địa điểm ">`;
    this.querySelector('.img_money').innerHTML = `<img src="/images/recruit_detail/money_trang.svg " alt="Địa điểm ">`;
    this.querySelector('.img_exp').innerHTML = `<img src="/images/recruit_detail/exp_trang.svg " alt="Địa điểm ">`;
    this.querySelector('.img_job_gt').innerHTML = `<img src="/images/recruit_detail/job_trang.svg " alt="Địa điểm ">`;
    this.querySelector('.img_star').innerHTML = ` <button> <img src="/images/recruit_detail/star_trang.svg " alt="yêu thích "></button>`;
}, function() {
    this.querySelector('.img_add').innerHTML = `<img src="/images/recruit_detail/address.svg" alt="Địa điểm ">`;
    this.querySelector('.img_money').innerHTML = `<img src="/images/recruit_detail/money.svg " alt="Địa điểm ">`;
    this.querySelector('.img_exp').innerHTML = `<img src="/images/recruit_detail/exp.svg " alt="Địa điểm ">`;
    this.querySelector('.img_job_gt').innerHTML = `<img src="/images/recruit_detail/job.svg "  alt="Địa điểm ">`;
    this.querySelector('.img_star').innerHTML = `<button><img src="/images/recruit_detail/starPNG.svg" alt="Địa điểm "></button>`;
});