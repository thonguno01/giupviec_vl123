function action_save(id) {
    // alert(id);
    $.ajax({
        url: "Handles/Home/HomeController/action_save_new",
        type: 'POST',
        data: {
            new_id: id,
        },
        dataType: 'json',
        success: function(result) {
            if (result['result']) {
                if (result['saved']) {
                    alert('Đã lưu thông tin công việc!');
                    $('.btn_like_' + id).addClass('liked');
                    $('.btn_like_' + id).html('<img src="/images/like_star_full.svg" alt="them vao yeu thich">')
                } else {
                    alert('Đã bỏ lưu thông tin công việc!');
                    $('.btn_like_' + id).removeClass('liked');
                    $('.btn_like_' + id).html('<img src="/images/like_star.svg" alt="them vao yeu thich">')
                }
            } else {
                alert('Đã có lỗi xảy ra!');
            }
        }
    });
}

$(".content .item_parent").hover(function() {
    this.querySelector('.icon_location').innerHTML = `<img src="/images/location_icon_hover.svg" alt="dia chi">`;
    this.querySelector('.icon_salary').innerHTML = `<img src="/images/salary_icon_hover.svg" alt="luong">`;
    this.querySelector('.icon_job_location').innerHTML = `<img src="/images/job_location_icon_hover.svg" alt="o cung chu nha">`;
    this.querySelector('.icon_birthday').innerHTML = `<img src="/images/birthday_icon_hover.svg" alt="tuoi">`;
    this.querySelector('.icon_exp').innerHTML = `<img src="/images/exp_icon_hover.svg" alt="kinh nghiem">`;
    this.querySelector('.icon_job_style').innerHTML = `<img src="/images/job_style_icon_hover.svg" alt="kinh nghiem">`;
    if ($(this).find('.star_prominent').hasClass('liked')) {

    } else {
        if ($(this).find('.star_prominent').length) {
            this.querySelector('.star_prominent').innerHTML = `<img src="/images/like_star_hover.svg" alt="them vao yeu thich">`;
        }

    }
}, function() {
    this.querySelector('.icon_location').innerHTML = `<img src="/images/location_icon.svg" alt="dia chi">`;
    this.querySelector('.icon_salary').innerHTML = `<img src="/images/salary_icon.svg" alt="luong">`;
    this.querySelector('.icon_job_location').innerHTML = `<img src="/images/job_location_icon.svg" alt="o cung chu nha">`;
    this.querySelector('.icon_birthday').innerHTML = `<img src="/images/birthday_icon.svg" alt="tuoi">`;
    this.querySelector('.icon_exp').innerHTML = `<img src="/images/exp_icon.svg" alt="kinh nghiem">`;
    this.querySelector('.icon_job_style').innerHTML = `<img src="/images/job_style_icon.svg" alt="kinh nghiem">`;
    if ($(this).find('.star_prominent').hasClass('liked')) {

    } else {
        if ($(this).find('.star_prominent').length) {
            this.querySelector('.star_prominent').innerHTML = `<img src="/images/like_star.svg" alt="them vao yeu thich">`;
        }
    }
    // this.querySelector('.btn_like').innerHTML = `<img src="/images/like_star.svg" alt="them vao yeu thich">`;
});

function get_email(id) {
    $.ajax({
        url: "Handles/Home/HomeController/get_company_contact",
        type: 'POST',
        data: {
            company_id: id,
        },
        dataType: 'json',
        success: function(output) {
            if (output['result']) {
                $('.email .detail').html(output['email']);
            } else {
                alert('Đã có lỗi xảy ra!');
            }
        }
    });
}

function get_phone(id) {
    $.ajax({
        url: "Handles/Home/HomeController/get_company_contact",
        type: 'POST',
        data: {
            company_id: id,
        },
        dataType: 'json',
        success: function(output) {
            if (output['result']) {
                $('.phone .detail').html(output['phone']);
            } else {
                alert('Đã có lỗi xảy ra!');
            }
        }
    });
}


$('#current_page').change(function() {
    max = $('#current_page').attr('max');
    if ($("#current_page").val() > parseInt(max)) {
        $("#current_page").val(max);
    }
    link = getURL() + "?page=" + $("#current_page").val();
    window.location.href = link;
})

$('#minus_page').click(function() {
    page = $("#current_page").val();
    if (parseInt(page) <= 1) {
        page = 1;
        $("#current_page").val(page);
    } else {
        page--;
        $("#current_page").val(page).change();
    }
})

$('#add_page').click(function() {
    page = $("#current_page").val();
    max = $('#current_page').attr('max');
    if (parseInt(page) >= parseInt(max)) {
        page = max;
        $("#current_page").val(page);
    } else {
        page++;
        $("#current_page").val(page).change();
    }
})

$('#share_option').hide();
$("#share").click(function() {
    if ($('#share_option').is(':hidden')) {
        $('#share_option').show();
    } else {
        $('#share_option').hide();
    }
})