$('#action_search').unbind();
$('#action_search').click(function() {
    district_id = $('#district_id').val();
    // tag_id = $('#tag_id').val();
    city_id = $('#select_province').val();
    search_key = $('#search_key').val();
    $.ajax({
        url: '/Handles/Home/HomeController/get_tag',
        type: 'GET',
        data: {
            tag_name: search_key
        },
        dataType: "JSON",
        success: function(tag) {
            // alert(tag['alias']);
            if (tag) {
                window.location.href = '/tim-viec-lam-' + tag['alias'] + '-t' + tag['id'] + 'c' + city_id + 'd' + district_id + '.html';
            } else {
                if (district_id > 0 || city_id > 0) {
                    if (search_key != '') {
                        window.location.href = '/tim-viec-lam-tai-' + slug($('#display_location').val()) + '-t0' + 'c' + city_id + 'd' + district_id + '.html?search_key=' + search_key;
                    } else {
                        window.location.href = '/tim-viec-lam-tai-' + slug($('#display_location').val()) + '-t0' + 'c' + city_id + 'd' + district_id + '.html';
                    }
                } else {
                    if (search_key != '') {
                        window.location.href = '/tim-viec-lam-giup-viec-t0c0d0.html?search_key=' + search_key;
                    } else {
                        window.location.href = '/tim-viec-lam-giup-viec-t0c0d0.html';
                    }
                }
            }
        }
    });
})

$(".block").hover(function() {
    this.querySelector('.img_add').innerHTML = `<img src="/images/recruit_detail/add_trang.svg " alt="Địa điểm ">`;
    this.querySelector('.img_money').innerHTML = `<img src="/images/recruit_detail/money_trang.svg " alt="Địa điểm ">`;
    this.querySelector('.img_exp').innerHTML = `<img src="/images/recruit_detail/exp_trang.svg " alt="Địa điểm ">`;
    this.querySelector('.img_job_gt').innerHTML = `<img src="/images/recruit_detail/job_trang.svg " alt="Địa điểm ">`;
    if ($(this).find('.img_star button').hasClass('liked')) {

    } else {
        if ($(this).find('.img_star button').length) {
            this.querySelector('.img_star button').innerHTML = `<img src="/images/like_star_hover.svg" alt="them vao yeu thich">`;
        }

    }
}, function() {
    this.querySelector('.img_add').innerHTML = `<img src="/images/recruit_detail/address.svg" alt="Địa điểm ">`;
    this.querySelector('.img_money').innerHTML = `<img src="/images/recruit_detail/money.svg " alt="Địa điểm ">`;
    this.querySelector('.img_exp').innerHTML = `<img src="/images/recruit_detail/exp.svg " alt="Địa điểm ">`;
    this.querySelector('.img_job_gt').innerHTML = `<img src="/images/recruit_detail/job.svg "  alt="Địa điểm ">`;
    if ($(this).find('.img_star button').hasClass('liked')) {

    } else {
        if ($(this).find('.img_star button').length) {
            this.querySelector('.img_star button').innerHTML = `<img src="/images/like_star.svg" alt="them vao yeu thich">`;
        }

    }
});

function action_apply(new_id) {
    $.ajax({
        url: "Handles/Home/HomeController/action_apply",
        type: 'POST',
        data: {
            new_id: new_id,
        },
        dataType: 'json',
        success: function(output) {
            alert(output['message']);
            if (output['result']) {
                html = `<img src="/images/recruit_detail/tich_chon.svg" alt="ứng tuyển"><span>Đã ứng tuyển </span>`;
                $('.done button').html(html);
                $('.done button').removeClass('ung-tuyen');
                $('.done button').addClass('da-ung-tuyen');
                $('.done button').removeAttr('onclick');
            }
        }
    });
}

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

function view_contact(id) {
    $.ajax({
        url: "Handles/Home/HomeController/get_company_contact",
        type: 'POST',
        data: {
            company_id: id,
        },
        dataType: 'json',
        success: function(output) {
            if (output['result']) {
                $('.name_email').html(output['email']);
                $('.name_email').addClass('active');
                $('.number_phone').html(output['phone']);
                $('.number_phone').addClass('active');
                $('#box-3 .see_detail').addClass('active');
                $('#box-3 .see_detail').removeAttr('onclick');
            } else {
                alert('Đã có lỗi xảy ra!');
            }
        }
    });
}
$("#share").click(function() {
    if ($('#share_option').is(':hidden')) {
        $('#share_option').show();
    } else {
        $('#share_option').hide();
    }
})