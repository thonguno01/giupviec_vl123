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
                window.location.href = '/tim-viec-lam-' + tag['alias'] + '-vlt' + tag['id'] + 'c' + city_id + 'd' + district_id + '.html';
            } else {
                if (district_id > 0 || city_id > 0) {
                    if (search_key != '') {
                        window.location.href = '/tim-viec-lam-tai-' + slug($('#display_location').val()) + '-vlt0' + 'c' + city_id + 'd' + district_id + '.html?search_key=' + search_key;
                    } else {
                        window.location.href = '/tim-viec-lam-tai-' + slug($('#display_location').val()) + '-vlt0' + 'c' + city_id + 'd' + district_id + '.html';
                    }
                } else {
                    if (search_key != '') {
                        window.location.href = '/tim-viec-lam-giup-viec-vlt0c0d0.html?search_key=' + search_key;
                    } else {
                        window.location.href = '/tim-viec-lam-giup-viec-vlt0c0d0.html';
                    }
                }
            }
        }
    });
})

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
            $('.content .item_parent').mouseleave();
        }
    });
}

$(document).on('mouseenter', '.content .item_parent', function(e) {
    var $target = $(e.target);
    if (!$target.closest($(this).find('.star_prominent')).length &&
        $($(this).find('.star_prominent')).is(":visible")) {
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
    }
});

$(document).on('mouseleave', '.content .item_parent', function() {
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