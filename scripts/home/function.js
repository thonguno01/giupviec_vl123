function date_inp(event) {
    inp = $(event.target);
    if (inp.is("input[type='text']")) {
        inp.attr('type', 'date');
        inp.blur();
        inp.focus();
    }
}

function rewrite_name(str) {
    return str
}

function get_district() {
    $.ajax({
        url: '/get-list-district',
        type: 'GET',
        data: {
            cit_id: $('#province').val()
        },
        dataType: "JSON",
        success: function(result) {
            $('#district').html('<option value=""></option>');
            result.forEach(district => {
                $('#district').append(`<option value="${district['cit_id']}">${district['cit_name']}</option>`);
            });
        }
    });
}
<<<<<<< HEAD

function get_list_district(city_id) {
    var list_district;
    $.ajax({
        url: '/get-list-district',
        type: 'GET',
        data: {
            cit_id: city_id
        },
        dataType: "JSON",
        async: !1,
        success: function(result) {
            list_district = result
        }
    });
    return list_district;
}

function show_pass() {
    if ($('[name="password"]').attr('type') == 'password') {
        $('[name="password"]').attr('type', 'text');
        $('#view_pass').html('<i class="fa fa-eye" aria-hidden="true"></i>');
    } else {
        $('[name="password"]').attr('type', 'password');
        $('#view_pass').html('<i class="fa fa-eye-slash" aria-hidden="true"></i>');
    }
}

function show_repass() {
    if ($('[name="repassword"]').attr('type') == 'password') {
        $('[name="repassword"]').attr('type', 'text');
        $('#view_repass').html('<i class="fa fa-eye" aria-hidden="true"></i>');
    } else {
        $('[name="repassword"]').attr('type', 'password');
        $('#view_repass').html('<i class="fa fa-eye-slash" aria-hidden="true"></i>');
    }
}

function removeAscent(str) {
    if (str === null || str === undefined) return str;
    str = str.toLowerCase();
    str = str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g, "a");
    str = str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g, "e");
    str = str.replace(/ì|í|ị|ỉ|ĩ/g, "i");
    str = str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g, "o");
    str = str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g, "u");
    str = str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g, "y");
    str = str.replace(/đ/g, "d");
    str = str.replace(/\s/g, '');
    return str;
}

function getURL() {
    return (window.location.origin + window.location.pathname);
}

function dateToYMD(date) {
    var d = date.getDate();
    var m = date.getMonth() + 1; //Month from 0 to 11
    var y = date.getFullYear();
    return '' + y + '-' + (m <= 9 ? '0' + m : m) + '-' + (d <= 9 ? '0' + d : d);
}

function get_work_schedule() {
    user_schedule = {
        t2_ca1_bd: '',
        t2_ca1_kt: '',
        t2_ca2_bd: '',
        t2_ca2_kt: '',
        t3_ca1_bd: '',
        t3_ca1_kt: '',
        t3_ca2_bd: '',
        t3_ca2_kt: '',
        t4_ca1_bd: '',
        t4_ca1_kt: '',
        t4_ca2_bd: '',
        t4_ca2_kt: '',
        t5_ca1_bd: '',
        t5_ca1_kt: '',
        t5_ca2_bd: '',
        t5_ca2_kt: '',
        t6_ca1_bd: '',
        t6_ca1_kt: '',
        t6_ca2_bd: '',
        t6_ca2_kt: '',
        t7_ca1_bd: '',
        t7_ca1_kt: '',
        t7_ca2_bd: '',
        t7_ca2_kt: '',
        t8_ca1_bd: '',
        t8_ca1_kt: '',
        t8_ca2_bd: '',
        t8_ca2_kt: '',

    };
    if ($('#t2_am').html()) {
        user_schedule['t2_ca1_bd'] = $('#t2_am .start').val();
        user_schedule['t2_ca1_kt'] = $('#t2_am .end').val();
    }
    if ($('#t3_am').html()) {
        user_schedule['t3_ca1_bd'] = $('#t3_am .start').val();
        user_schedule['t3_ca1_kt'] = $('#t3_am .end').val();
    }
    if ($('#t4_am').html()) {
        user_schedule['t4_ca1_bd'] = $('#t4_am .start').val();
        user_schedule['t4_ca1_kt'] = $('#t4_am .end').val();
    }
    if ($('#t5_am').html()) {
        user_schedule['t5_ca1_bd'] = $('#t5_am .start').val();
        user_schedule['t5_ca1_kt'] = $('#t5_am .end').val();
    }
    if ($('#t6_am').html()) {
        user_schedule['t6_ca1_bd'] = $('#t6_am .start').val();
        user_schedule['t6_ca1_kt'] = $('#t6_am .end').val();
    }
    if ($('#t7_am').html()) {
        user_schedule['t7_ca1_bd'] = $('#t7_am .start').val();
        user_schedule['t7_ca1_kt'] = $('#t7_am .end').val();
    }
    if ($('#cn_am').html()) {
        user_schedule['t8_ca1_bd'] = $('#cn_am .start').val();
        user_schedule['t8_ca1_kt'] = $('#cn_am .end').val();
    }
    if ($('#t2_pm').html()) {
        user_schedule['t2_ca2_bd'] = $('#t2_pm .start').val();
        user_schedule['t2_ca2_kt'] = $('#t2_pm .end').val();
    }
    if ($('#t3_pm').html()) {
        user_schedule['t3_ca2_bd'] = $('#t3_pm .start').val();
        user_schedule['t3_ca2_kt'] = $('#t3_pm .end').val();
    }
    if ($('#t4_pm').html()) {
        user_schedule['t4_ca2_bd'] = $('#t4_pm .start').val();
        user_schedule['t4_ca2_kt'] = $('#t4_pm .end').val();
    }
    if ($('#t5_pm').html()) {
        user_schedule['t5_ca2_bd'] = $('#t5_pm .start').val();
        user_schedule['t5_ca2_kt'] = $('#t5_pm .end').val();
    }
    if ($('#t6_pm').html()) {
        user_schedule['t6_ca2_bd'] = $('#t6_pm .start').val();
        user_schedule['t6_ca2_kt'] = $('#t6_pm .end').val();
    }
    if ($('#t7_pm').html()) {
        user_schedule['t7_ca2_bd'] = $('#t7_pm .start').val();
        user_schedule['t7_ca2_kt'] = $('#t7_pm .end').val();
    }
    if ($('#cn_pm').html()) {
        user_schedule['t8_ca2_bd'] = $('#cn_pm .start').val();
        user_schedule['t8_ca2_kt'] = $('#cn_pm .end').val();
    }
    return user_schedule;
}

// đăng xuất
function logout() {
    $.ajax({
        url: '/logout',
        type: 'POST',
        success: function() {
            alert('Đăng xuất thành công!');
            window.location.reload();
        }
    });
}


function open_search() {
    get_hot_location();
    $.ajax({
        url: '/Handles/Home/HomeController/get_list_city',
        type: 'GET',
        dataType: "json",
        success: function(result) {
            html_pc = '<option value=0>Tất cả tỉnh thành</option>';
            html_mb = '<button class="row" data-city-id="0">Tất cả tỉnh thành</button>';
            result.forEach(function(city) {
                html_pc += `<option value="${city['cit_id']}">${city['cit_name']}</option>`;
                html_mb += `<button class="row" data-city-id="${city['cit_id']}">${city['cit_name']}</button>`
            })
            $('#select_province').html(html_pc);
            $('#search_block_province .box_list').html(html_mb);

        }
    });
    $('.search_box').show();
    $('#select_province').select2({
        // placeholder: "Tất cả tỉnh thành"
        dropdownParent: $('.search_box')
    });
    $('#select_province').hide();
}

$('#close_search').click(function() {
    $('.search_box').hide();
})



function opend_location() {
    if (screen.width < 768) {
        if ($('.search_location_popup_mb .block_province').is(':hidden')) {
            $('.search_location_popup_mb .block_province').show();
        } else {
            $('.search_location_popup_mb .block_province').hide();
        }
    } else {
        if ($('.search_location_popup').is(':hidden')) {
            $('.search_location_popup').prop("style", "display:flex");
        } else {
            $('.search_location_popup').hide();
        }
    }
}

function slug(str) {
    str = str.replace(/^\s+|\s+$/g, ''); // trim
    str = str.toLowerCase();
    var AccentsMap = [
        "aàảãáạăằẳẵắặâầẩẫấậ",
        "AÀẢÃÁẠĂẰẲẴẮẶÂẦẨẪẤẬ",
        "dđ", "DĐ",
        "eèẻẽéẹêềểễếệ",
        "EÈẺẼÉẸÊỀỂỄẾỆ",
        "iìỉĩíị",
        "IÌỈĨÍỊ",
        "oòỏõóọôồổỗốộơờởỡớợ",
        "OÒỎÕÓỌÔỒỔỖỐỘƠỜỞỠỚỢ",
        "uùủũúụưừửữứự",
        "UÙỦŨÚỤƯỪỬỮỨỰ",
        "yỳỷỹýỵ",
        "YỲỶỸÝỴ"
    ];
    for (var i = 0; i < AccentsMap.length; i++) {
        var re = new RegExp('[' + AccentsMap[i].substr(1) + ']', 'g');
        var char = AccentsMap[i][0];
        str = str.replace(re, char);
    }

    // remove accents, swap ñ for n, etc
    var from = "ÁÄÂÀÃÅČÇĆĎÉĚËÈÊẼĔȆĞÍÌÎÏİŇÑÓÖÒÔÕØŘŔŠŞŤÚŮÜÙÛÝŸŽáäâàãåčçćďéěëèêẽĕȇğíìîïıňñóöòôõøðřŕšşťúůüùûýÿžþÞĐđßÆa·/_,:;";
    var to = "AAAAAACCCDEEEEEEEEGIIIIINNOOOOOORRSSTUUUUUYYZaaaaaacccdeeeeeeeegiiiiinnooooooorrsstuuuuuyyzbBDdBAa------";
    for (var i = 0, l = from.length; i < l; i++) {
        str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
    }

    str = str.replace(/[^a-z0-9 -]/g, '') // remove invalid chars
        .replace(/\s+/g, '-') // collapse whitespace and replace by -
        .replace(/-+/g, '-'); // collapse dashes

    return str;
};

function action_popup_login() {
    $('.bg_popup_login').show();
}

function seen_notify() {
    $.ajax({
        url: '/Handles/Home/HomeController/seen_notify',
        type: 'GET',
        success: function() {
            $(".notify_num").remove();
        }
    });
}

function clear_notify() {
    $.ajax({
        url: '/Handles/Home/HomeController/clear_notify',
        type: 'GET',
        success: function() {
            $('#noti_list').html('');
        }
    });
}

function delete_notify(id) {
    $.ajax({
        url: '/Handles/Home/HomeController/delete_notify',
        type: 'GET',
        data: {
            id: id
        },
        success: function() {
            $('#noti_item_' + id).remove();
        }
    });
}

function rewrite_employee_link(alias, id) {
    return '/' + alias + '-gv' + id + '.html';
}

function rewrite_new_detail_link(alias, id) {
    return '/' + alias + '-n' + id + '.html';
}

function rewrite_company_link(alias, id) {
    return '/' + alias + '-c' + id + '.html';
}

function rewirte_user_img_href(id, img) {
    return '/upload/users/user_' + id + '/' + img;
}

function rewirte_company_img_href(id, img) {
    return '/upload/companys/company_' + id + '/' + img;
}
function checkAllkitu(str) {
    let regex = /(^[^a-zA-Z0-9])/
    return regex.test(str)
    }
=======
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
