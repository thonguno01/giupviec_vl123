<<<<<<< HEAD
if (screen.width > 767) {
    $(".box_top .box_tag").slick({
        infinite: true,
        slidesToShow: 5,
        slidesToScroll: 1,
        dots: false,
        arrows: true,
        prevArrow: `<button type='button' class='slick-prev-tag'><img src="/images/slick_prev_tag.png"/></button>`,
        nextArrow: `<button type='button' class='slick-next-tag'><img src="/images/slick_next_tag.png"/></button>`,
    });
}


// hover tin
if (screen.width > 1365) {
    $(document).on('mouseenter', '.job_item', function(e) {
        var $target = $(e.target);
        if (!$target.closest($(this).find('.btn_like')).length &&
            $($(this).find('.btn_like')).is(":visible")) {
            this.querySelector('.icon_location').innerHTML = `<img src="/images/location_icon_hover.svg" alt="dia chi">`;
            this.querySelector('.icon_salary').innerHTML = `<img src="/images/salary_icon_hover.svg" alt="luong">`;
            this.querySelector('.icon_job_location').innerHTML = `<img src="/images/job_location_icon_hover.svg" alt="o cung chu nha">`;
            this.querySelector('.icon_birthday').innerHTML = `<img src="/images/birthday_icon_hover.svg" alt="tuoi">`;
            this.querySelector('.icon_exp').innerHTML = `<img src="/images/exp_icon_hover.svg" alt="kinh nghiem">`;
            if ($(this).find('.btn_like').hasClass('liked')) {} else {
                if ($(this).find('.btn_like').length) {
                    this.querySelector('.btn_like').innerHTML = `<img src="/images/like_star_hover.svg" alt="them vao yeu thich">`;
                }
            }
        }
    });
    $(document).on('mouseleave', '.job_item', function() {
        this.querySelector('.icon_location').innerHTML = `<img src="/images/location_icon.svg" alt="dia chi">`;
        this.querySelector('.icon_salary').innerHTML = `<img src="/images/salary_icon.svg" alt="luong">`;
        this.querySelector('.icon_job_location').innerHTML = `<img src="/images/job_location_icon.svg" alt="o cung chu nha">`;
        this.querySelector('.icon_birthday').innerHTML = `<img src="/images/birthday_icon.svg" alt="tuoi">`;
        this.querySelector('.icon_exp').innerHTML = `<img src="/images/exp_icon.svg" alt="kinh nghiem">`;
        if ($(this).find('.btn_like').hasClass('liked')) {} else {
            if ($(this).find('.btn_like').length) {
                this.querySelector('.btn_like').innerHTML = `<img src="/images/like_star.svg" alt="them vao yeu thich">`;
            }
        }
        // this.querySelector('.btn_like').innerHTML = `<img src="/images/like_star.svg" alt="them vao yeu thich">`;
    });
}

function action_save(id) {
    // alert(id);
    $.ajax({
        url: "action-save-employee",
        type: 'POST',
        data: {
            user_id: id,
        },
        dataType: 'json',
        success: function(result) {
            if (result['result']) {
                if (result['saved']) {
                    alert('Đã lưu thông tin người giúp việc!');
                    $('.btn_like_' + id).addClass('liked');
                    $('.btn_like_' + id).html('<img src="/images/like_star_full.svg" alt="them vao yeu thich">')
                } else {
                    alert('Đã bỏ lưu thông tin người giúp việc!');
                    $('.btn_like_' + id).removeClass('liked');
                    $('.btn_like_' + id).html('<img src="/images/like_star.svg" alt="them vao yeu thich">')
                }
            } else {
                alert('Đã có lỗi xảy ra!');
            }
            $('.job_item').mouseleave();
        }
    });
}


//dieu huong cho phan trang
function getURL() {
    return (window.location.origin + window.location.pathname);
}
//danh sach nguoi giup viec nhieu kinh nghiem
$('#current_exp_page').change(function() {
    max = $('#current_exp_page').attr('max');
    if ($("#current_exp_page").val() > parseInt(max)) {
        $("#current_exp_page").val(max);
    }
    link = getURL() + "?exp_page=" + $("#current_exp_page").val() + '&rate_page=' + $("#current_rate_page").val();
    window.location.href = link;
})

$('#minus_exp_page').click(function() {
    page = $("#current_exp_page").val();
    if (parseInt(page) <= 1) {
        page = 1;
        $("#current_exp_page").val(page);
    } else {
        page--;
        $("#current_exp_page").val(page).change();
    }
})

$('#add_exp_page').click(function() {
        page = $("#current_exp_page").val();
        max = $('#current_exp_page').attr('max');
        if (parseInt(page) >= parseInt(max)) {
            page = max;
            $("#current_exp_page").val(page);
        } else {
            page++;
            $("#current_exp_page").val(page).change();
        }
    })
    //danh sach nguoi giup viec danh gia cao
$('#current_rate_page').change(function() {
    max = $('#current_rate_page').attr('max');
    if ($("#current_rate_page").val() > parseInt(max)) {
        $("#current_rate_page").val(max);
    }
    link = getURL() + "?exp_page=" + $("#current_exp_page").val() + '&rate_page=' + $("#current_rate_page").val();
    window.location.href = link;
})

$('#minus_rate_page').click(function() {
    page = $("#current_rate_page").val();
    if (parseInt(page) <= 1) {
        page = 1;
        $("#current_rate_page").val(page);
    } else {
        page--;
        $("#current_rate_page").val(page).change();
    }
})
$('#add_rate_page').click(function() {
    page = $("#current_rate_page").val();
    max = $('#current_rate_page').attr('max');
    if (parseInt(page) >= parseInt(max)) {
        page = max;
        $("#current_rate_page").val(page);
    } else {
        page++;
        $("#current_rate_page").val(page).change();
    }
})

$(window).scroll(function() {
    var scroll = $(this).scrollTop();
    if (scroll > 0) {
        $('.box_profile .box_left .avt img').each(function() {
            $(this).attr('src', $(this).attr('data-src'));
        })
    }
=======
$(".box_top .box_tag").slick({
    infinite: true,
    slidesToShow: 5,
    slidesToScroll: 1,
    dots: false,
    arrows: true,
    prevArrow: `<button type='button' class='slick-prev-tag'><img src="/images/slick_prev_tag.png"/></button>`,
    nextArrow: `<button type='button' class='slick-next-tag'><img src="/images/slick_next_tag.png"/></button>`,
});

// hover tin 
$(".job_item").hover(function() {
    this.querySelector('.icon_location').innerHTML = `<img src="/images/location_icon_hover.svg" alt="dia chi">`;
    this.querySelector('.icon_salary').innerHTML = `<img src="/images/salary_icon_hover.svg" alt="luong">`;
    this.querySelector('.icon_job_location').innerHTML = `<img src="/images/job_location_icon_hover.svg" alt="o cung chu nha">`;
    this.querySelector('.icon_birthday').innerHTML = `<img src="/images/birthday_icon_hover.svg" alt="tuoi">`;
    this.querySelector('.icon_exp').innerHTML = `<img src="/images/exp_icon_hover.svg" alt="kinh nghiem">`;
    this.querySelector('.btn_like').innerHTML = `<img src="/images/like_star_hover.svg" alt="them vao yeu thich">`;
}, function() {
    this.querySelector('.icon_location').innerHTML = `<img src="/images/location_icon.svg" alt="dia chi">`;
    this.querySelector('.icon_salary').innerHTML = `<img src="/images/salary_icon.svg" alt="luong">`;
    this.querySelector('.icon_job_location').innerHTML = `<img src="/images/job_location_icon.svg" alt="o cung chu nha">`;
    this.querySelector('.icon_birthday').innerHTML = `<img src="/images/birthday_icon.svg" alt="tuoi">`;
    this.querySelector('.icon_exp').innerHTML = `<img src="/images/exp_icon.svg" alt="kinh nghiem">`;
    this.querySelector('.btn_like').innerHTML = `<img src="/images/like_star.svg" alt="them vao yeu thich">`;
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
});