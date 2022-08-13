<<<<<<< HEAD
function action_save(id) {
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
                    $('.btn_like_' + id).html('<img src="/images/like_star_full.svg" alt="them vao yeu thich">')
                } else {
                    alert('Đã bỏ lưu thông tin người giúp việc!');
                    $('.btn_like_' + id).html('<img src="/images/like_star.svg" alt="them vao yeu thich">')
                }
            } else {
                alert('Đã có lỗi xảy ra!');
            }
        }
    });
}


function check_point(user_alias, user_id) {
    $.ajax({
        url: "/Handles/Home/HomeController/check_point",
        type: 'POST',
        data: {},
        dataType: 'json',
        success: function(point) {
            if (point == 0) {
                $('.popup_empty_point').show();
            } else {
                $('#company_point').html(point + ' điểm miễn phí');
                point_action(user_alias, user_id);
            }
        }
    });
}

function point_action(user_alias, user_id) {
    popup = $('.popup_use_point');
    popup.find("#yes,#no").unbind().click(function() {
        popup.hide();
    });
    popup.find("#yes").click(function() {
        use_point(user_alias, user_id);
    });
    popup.find("#no").click(function() {});
    popup.show();
}

function use_point(user_alias, user_id) {
    $.ajax({
        url: "/Handles/Home/HomeController/use_point",
        type: 'POST',
        data: {
            user_id: user_id
        },
        dataType: 'json',
        success: function(output) {
            if (!output['result']) {
                alert('Đã có lỗi xảy ra. Vui lòng thử lại!');
            } else {
                $('.name_email').html(output['email']);
                $('.name_email').addClass('active');
                $('.number_phone').html(output['phone']);
                $('.number_phone').addClass('active');
                $('#see_detail').removeAttr('onclick');
                $('#see_detail').addClass('active');
            }
        }
    });
}

function view_profile(alias, id) {
    window.location.href = 'profile-' + alias + '-pgv' + id + '.html';
}

function close_popup_empty_point() {
    $('.popup_empty_point').hide();
}



function send_mail_notify() {
    employee_id = $('.name_helper').attr('data-id');
    $.ajax({
        url: "/Handles/Home/HomeController/send_mail_notify",
        type: 'POST',
        data: {
            employee_id: employee_id
        }
    });
}
$("#share").click(function() {
    if ($('#share_option').is(':hidden')) {
        $('#share_option').show();
    } else {
        $('#share_option').hide();
    }
});
if (!$('.header .right .user').is(':hidden')) {
    send_mail_notify();
}
=======
$(".slick_slider").slick({
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
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
