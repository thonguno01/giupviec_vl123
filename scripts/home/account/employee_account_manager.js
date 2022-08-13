$('#option-1').click(function() {
    document.getElementById('dynamic').style.display = "none";
    document.getElementById('static').style.display = "block";
})

$('#option-2').click(function() {
    document.getElementById('dynamic').style.display = "block";
    document.getElementById('static').style.display = "none";
})

// nut mo rong menu bar

$('#collapse_profile').click(function() {
    if ($('.menu_manager').is(':hidden')) {
        $('.menu_manager').show();
        $(this).html(`<img src="/images/btn_collapse_col.svg" alt="thu gon">`)
    } else {
        $('.menu_manager').hide();
        $(this).html(`<img src="/images/btn_expand_col.svg" alt="mo rong">`)
    }
})

function collapse_profile() {
    if (screen.width < 1024) {
        $('.menu_manager').hide();
        $('#collapse_profile').html(`<img src="/images/btn_expand_col.svg" alt="mo rong">`)
    } else {
        $('.menu_manager').show();
        $('#collapse_profile').html(`<img src="/images/btn_collapse_col.svg" alt="thu gon">`)
    }
}
collapse_profile();
$(window).resize(function() {
    collapse_profile();
});

// het nut mo rong menu bar

// nut mo cac the

$('#general').click(function() {
    window.location.href = '/account-manager';
})

$('#job_apply').click(function() {
    window.location.href = '/account-manager/list-apply';
})

$('#job_accept').click(function() {
    window.location.href = '/account-manager/list-accepted';
})

$('#job_saved').click(function() {
    window.location.href = '/account-manager/list-saved';
})

$('#profile_detail').click(function() {
    window.location.href = '/account-manager/profile';
})

$('#change_password').click(function() {
<<<<<<< HEAD
        window.location.href = '/account-manager/change-password';
    })
    // het nut mo cac the 

// lấy dữ liệu tỉnh thành
$('#province').change(function() {
    get_district();
})

=======
        window.location.href = 'account-manager/change-password';
    })
    // het nut mo cac the 

>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
//bo luu
function unsave(id) {
    $.ajax({
        url: 'unsave-new',
        type: 'POST',
        data: {
            id: id
        },
        success: function() {
            $('#save_new_' + id).remove();
            alert('Đã bỏ lưu tin!');
        }
    });
}

//bo ung tuyen
function unapply(id) {
    $.ajax({
        url: 'unapply-new',
        type: 'POST',
        data: {
            id: id
        },
        success: function() {
            $('#apply_' + id).remove();
            alert('Đã bỏ ứng tuyển!');
        }
    });
}

<<<<<<< HEAD

=======
//dang xuat
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
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769

//confirm popup

function logout_action() {
    popup = $('.confirm_logout');
    popup.find("#yes,#no").unbind().click(function() {
        popup.hide();
    });
    popup.find("#yes").click(function() {
        logout();
    });
    popup.find("#no").click(function() {});
    popup.show();
}

function unapply_action(id) {
    popup = $('.confirm_unapply');
    popup.find("#yes,#no").unbind().click(function() {
        popup.hide();
    });
    popup.find("#yes").click(function() {
        unapply(id);
    });
    popup.find("#no").click(function() {});
    popup.show();
}

function unsave_action(id) {
    popup = $('.confirm_unsave');
    popup.find("#yes,#no").unbind().click(function() {
        popup.hide();
    });
    popup.find("#yes").click(function() {
        unsave(id);
    });
    popup.find("#no").click(function() {});
    popup.show();
}

//het confirm popup



function add_select2() {
    $('#province').select2({
        placeholder: "Chọn Tỉnh/Thành phố",
        minimumResultsForSearch: -1,
        dropdownParent: $('.block_profile')
    });
    $('#stay').select2({
        minimumResultsForSearch: -1,
        dropdownParent: $('.block_profile')
    });
    $('#district').select2({
        placeholder: "Chọn Quận/Huyện",
        minimumResultsForSearch: Infinity,
        dropdownParent: $('.block_profile')
    });
    $('#job_style').select2({
        placeholder: "Có thể chọn cùng lúc nhiều loại công việc",
        minimumResultsForSearch: Infinity,
        dropdownParent: $('.block_profile')
    });
    $('#experience').select2({
        placeholder: "Lựa chọn kinh nghiệm",
        minimumResultsForSearch: Infinity,
        dropdownParent: $('.block_profile')
    });
    $('#education').select2({
        placeholder: "Lựa chọn trình độ học vấn",
        minimumResultsForSearch: Infinity,
        dropdownParent: $('.block_profile')
    });
    $('#sal_time').select2({
        minimumResultsForSearch: Infinity,
        dropdownParent: $('.block_profile')
    });
}

// het nut mo cac the

// cap nhat thong tin ca nhan
$(document).ready(function() {
    add_select2();
});

<<<<<<< HEAD
// cập nhật ảnh đại diện
const ipnFileElement = document.querySelector('#change_avata');
const validImageTypes = ['image/gif', 'image/jpeg', 'image/png'];

ipnFileElement.addEventListener('change', function(e) {
        const files = e.target.files
        const file = files[0]
        const fileType = file['type']
        const filesize = 2097152
        if (!validImageTypes.includes(fileType)) {
            alert('Ảnh không đúng định dạng')
            return
        }
        if (file.size > filesize) {
            alert('Kích cỡ ảnh quá lớn!')
            document.getElementById('change_avata').value = '';
            return
        }
        var user_data = new FormData();
        user_data.append('image', file);
        // // var file_data = $('#change_avata').prop('files')[0];
        // if (file != undefined) {

        //     //lấy ra kiểu file
        //     var type = file.type;
        //     //Xét kiểu file được upload
        //     var match = ["image/gif", "image/png", "image/jpg"];
        //     if (type == match[0] || type == match[1] || type == match[2]) {
        //         //khởi tạo đối tượng form data
        //         // var form_data = new FormData();
        //         // thêm files vào trong form data
        //         user_data.append('file', file);
        //         // alert(user_data['avata']['name']);
        //     } else {
        //         alert('Định dạng ảnh không đúng!');
        //     }
        // }
        $.ajax({
            url: '/update-user-image',
=======
function hide_schedule_row(id) {
    schedule = '';
    var schedule = $('#' + id + ' .col_time').html();
    if (schedule) {
        $('#' + id + ' .col_time').remove();
        $('#' + id).append('<div class="schedule_msg" id="schedule_msg_' + id + '">Tôi không làm việc</div>');
    } else {
        $('#schedule_msg_' + id).remove();
        $('#' + id).append(`<div class="col_2 col_time" id="${id}_am">
		<span>Từ</span>
		<input type="text" placeholder="07:00" class="start" name='${id}_am_start'>
		<span>Đến</span>
		<input type="text" placeholder="11:00" class="end" name='${id}_am_end'>
		<button type="button" onclick="add_schedule_row('${id}')" id="add_${id}"><img src="/images/add_schedule.svg" alt=""></button>
	</div>
	<div class="col_3 col_time" id="${id}_pm">
		<span>Từ</span>
		<input type="text" placeholder="18:00" class="start" name='${id}_pm_start'>
		<span>Đến</span>
		<input type="text" placeholder="21:00" class="end" name='${id}_pm_end'>
		<button type="button" onclick="minus_schedule_row('${id}')" id="minus_${id}"><img src="/images/clear_schedule.svg" alt=""></button>
	</div>`);
        $('#add_' + id).hide();
    }
}

function add_schedule_row(id) {
    var schedule = $('#' + id + '_pm').html();
    if (!schedule) {
        $('#' + id).append(`
	<div class="col_3 col_time" id="${id}_pm">
		<span>Từ</span>
		<input type="text" placeholder="18:00" class="start" name='${id}_pm_start'>
		<span>Đến</span>
		<input type="text" placeholder="21:00" class="end" name='${id}_pm_end'>
		<button type="button" onclick="minus_schedule_row('${id}')" id="minus_t2"><img src="/images/clear_schedule.svg" alt=""></button>
	</div>`);
        $('#add_' + id).hide();
    }
}

function minus_schedule_row(id) {
    var schedule = $('#' + id + '_pm').html();
    if (schedule) {
        $('#' + id + '_pm').remove();
        $('#add_' + id).show();
    }
}


function form_profile_validate() {
    document.getElementById('error_name').innerHTML = "";
    document.getElementById('error_phone').innerHTML = "";
    document.getElementById('error_email').innerHTML = "";
    document.getElementById('error_birth').innerHTML = "";
    document.getElementById('error_province').innerHTML = "";
    document.getElementById('error_district').innerHTML = "";
    document.getElementById('error_address').innerHTML = "";
    document.getElementById('error_job_style').innerHTML = "";
    document.getElementById('error_experience').innerHTML = "";
    document.getElementById('error_education').innerHTML = "";
    document.getElementById('error_schedule').innerHTML = "";
    document.getElementById('error_static_sal').innerHTML = "";
    document.getElementById('error_dynamic_sal').innerHTML = "";
    flag = 1;
    var phoneformat = /^\d+/;
    var emailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if ($('#name').val() == '') {
        document.getElementById('error_name').innerHTML = "Họ tên không được để trống!";
        flag = 0;
    }
    if ($('#phone').val() == '') {
        document.getElementById('error_phone').innerHTML = "Số điện thoại không được để trống!";
        flag = 0;
    } else {
        if (!document.getElementById('phone').value.match(phoneformat)) {
            document.getElementById('error_phone').innerHTML = "Số điện thoại không đúng định dạng!";
            flag = 0;
        }
    }
    if ($('#email').val() == '') {
        document.getElementById('error_email').innerHTML = "Email không được để trống!";
        flag = 0;
    } else {
        if (!document.getElementById('email').value.match(emailformat)) {
            document.getElementById('error_email').innerHTML = "Email không đúng định dạng!";
            flag = 0;
        }
    }
    if ($('#birth').val() == '') {
        document.getElementById('error_birth').innerHTML = "Ngày sinh không được để trống!";
        flag = 0;
    }
    if ($('#province').val() == '') {
        document.getElementById('error_province').innerHTML = "TỈnh/Thành phố không được để trống!";
        flag = 0;
    }
    if ($('#district').val() == '') {
        document.getElementById('error_district').innerHTML = "Quận/Huyện không được để trống!";
        flag = 0;
    }
    if ($('#address').val() == '') {
        document.getElementById('error_address').innerHTML = "Địa chỉ cụ thể không được để trống!";
        flag = 0;
    }
    if ($('#job_style').val() == '') {
        document.getElementById('error_job_style').innerHTML = "Loại công việc không được để trống!";
        flag = 0;
    }
    if ($('#experience').val() == '') {
        document.getElementById('error_experience').innerHTML = "Kinh nghiệm không được để trống!";
        flag = 0;
    }
    if ($('#education').val() == '') {
        document.getElementById('error_education').innerHTML = "Trình độ học vấn không được để trống!";
        flag = 0;
    }
    if ($('#option-1').is(':checked')) {
        if ($('#sal').val() == '') {
            flag = 0;
            document.getElementById('error_static_sal').innerHTML = "Mức lương không được để trống!"
        }
    } else {
        if ($('#sal_from').val() == '' || $('#sal_to').val() == '') {
            flag = 0;
            document.getElementById('error_dynamic_sal').innerHTML = "Mức lương không được để trống!"
        }
    }
    list_skill = get_skill();
    if (list_skill == '') {
        document.getElementById('error_skill').innerHTML = "Kỹ năng không được để trống!"
    }
    schedule_checked = document.getElementsByClassName('checkbox_schedule');
    flag_schedule = 0;
    for (var i = 0; i < schedule_checked.length; i++) {
        if (schedule_checked[i].checked === true) {
            flag_schedule = 1;
        }
    }
    if (flag_schedule == 0) {
        document.getElementById('error_schedule').innerHTML = "Lịch làm việc không được để trống!";
    }

    if ($('#t2_am').html()) {
        if (!validate_schedule_time('t2_am')) {
            flag = 0
        }
    }
    if ($('#t3_am').html()) {
        if (!validate_schedule_time('t3_am')) {
            flag = 0
        }
    }
    if ($('#t4_am').html()) {
        if (!validate_schedule_time('t4_am')) {
            flag = 0
        }
    }
    if ($('#t5_am').html()) {
        if (!validate_schedule_time('t5_am')) {
            flag = 0
        }
    }
    if ($('#t6_am').html()) {
        if (!validate_schedule_time('t6_am')) {
            flag = 0
        }
    }
    if ($('#t7_am').html()) {
        if (!validate_schedule_time('t7_am')) {
            flag = 0
        }
    }
    if ($('#cn_am').html()) {
        if (!validate_schedule_time('cn_am')) {
            flag = 0
        }
    }
    if ($('#t2_pm').html()) {
        if (!validate_schedule_time('t2_pm')) {
            flag = 0
        }
    }
    if ($('#t3_pm').html()) {
        if (!validate_schedule_time('t3_pm')) {
            flag = 0
        }
    }
    if ($('#t4_pm').html()) {
        if (!validate_schedule_time('t4_pm')) {
            flag = 0
        }
    }
    if ($('#t5_pm').html()) {
        if (!validate_schedule_time('t5_pm')) {
            flag = 0
        }
    }
    if ($('#t6_pm').html()) {
        if (!validate_schedule_time('t6_pm')) {
            flag = 0
        }
    }
    if ($('#t7_pm').html()) {
        if (!validate_schedule_time('t7_pm')) {
            flag = 0
        }
    }
    if ($('#cn_pm').html()) {
        if (!validate_schedule_time('cn_pm')) {
            flag = 0
        }
    }
    if (flag == 0) return false;
    else return true;
}

function validate_schedule_time(day) {
    var timeformat = /^([0-1]?[0-9]|2[0-4]):([0-5][0-9])(:[0-5][0-9])?$/;
    start_m = $('#' + day + ' .start').val();
    end_m = $('#' + day + ' .end').val();
    if (!start_m.match(timeformat) || !end_m.match(timeformat)) {
        document.getElementById('error_schedule').innerHTML = "Sai định dạng thời gian!";
        return false;
    } else if (start_m.length > 5 || end_m.length > 5) {
        document.getElementById('error_schedule').innerHTML = "Sai định dạng thời gian!";
        return false;
    } else {
        timestring_star_m = start_m.split(/:/);
        time_value_start_m = '';
        for (j = 0; j < timestring_star_m.length; j++) {
            time_value_start_m += timestring_star_m[j];
        }

        timestring_end_m = end_m.split(/:/);
        time_value_end_m = '';
        for (j = 0; j < timestring_end_m.length; j++) {
            time_value_end_m += timestring_end_m[j];
        }
        if (Number(time_value_start_m) - Number(time_value_end_m) >= 0) {
            document.getElementById('error_schedule').innerHTML = "Thời gian bắt đầu phải nhỏ hơn thời gian kết thúc!";
            return false;
        }
    }
    return true;
}

function get_user_schedule() {
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

function get_skill() {
    list_skill = [];
    $('input[name="skill"]').each(function() {
        if ($(this).is(':checked')) {
            list_skill.push($(this).val());
        }
    })
    $('input[name="add_skill"]').each(function() {
        if (!$(this).is(':disabled') && $(this).val().trim() != "") {
            list_skill.push($(this).val());
        }
    })
    return list_skill.join('|');
}

function update_information() {
    if (form_profile_validate()) {
        var name = $('#name').val();
        email = $('#email').val();
        phone = $('#phone').val();
        birth = $('#birth').val();
        city = $('#province').val();
        district = $('#district').val();
        address = $('#address').val();
        job_style = $('#job_style').val();
        work_type = $('#work_type').val();
        experience = $('#experience').val();
        education = $('#education').val();
        salary1 = 0;
        salary2 = 0;
        if (!$('.row_sal #static').is(':hidden')) {
            sal_type = 0;
            salary1 = $('#sal').val();
        } else {
            sal_type = 1;
            salary1 = $('#sal_from').val();
            salary2 = $('#sal_to').val();
        }
        user_schedule = get_user_schedule();
        job_skill = get_skill();
        intro = $('#intro').val();
        work_process = $('#work_process').val();
        var user_data = new FormData();
        user_data.append('name', name);
        user_data.append('email', email);
        user_data.append('phone', phone);
        user_data.append('birth', birth);
        user_data.append('city', city);
        user_data.append('district', district);
        user_data.append('address', address);
        user_data.append('job_style', job_style);
        user_data.append('work_type', work_type);
        user_data.append('experience', experience);
        user_data.append('education', education);
        user_data.append('sal_type', sal_type);
        user_data.append('salary1', salary1);
        user_data.append('salary2', salary2);
        user_data.append('t2_ca1_bd', user_schedule['t2_ca1_bd']);
        user_data.append('t2_ca1_kt', user_schedule['t2_ca1_kt']);
        user_data.append('t3_ca1_bd', user_schedule['t3_ca1_bd']);
        user_data.append('t3_ca1_kt', user_schedule['t3_ca1_kt']);
        user_data.append('t4_ca1_bd', user_schedule['t4_ca1_bd']);
        user_data.append('t4_ca1_kt', user_schedule['t4_ca1_kt']);
        user_data.append('t5_ca1_bd', user_schedule['t5_ca1_bd']);
        user_data.append('t5_ca1_kt', user_schedule['t5_ca1_kt']);
        user_data.append('t6_ca1_bd', user_schedule['t6_ca1_bd']);
        user_data.append('t6_ca1_kt', user_schedule['t6_ca1_kt']);
        user_data.append('t7_ca1_bd', user_schedule['t7_ca1_bd']);
        user_data.append('t7_ca1_kt', user_schedule['t7_ca1_kt']);
        user_data.append('t8_ca1_bd', user_schedule['t8_ca1_bd']);
        user_data.append('t8_ca1_kt', user_schedule['t8_ca1_kt']);
        user_data.append('t2_ca2_bd', user_schedule['t2_ca2_bd']);
        user_data.append('t2_ca2_kt', user_schedule['t2_ca2_kt']);
        user_data.append('t3_ca2_bd', user_schedule['t3_ca2_bd']);
        user_data.append('t3_ca2_kt', user_schedule['t3_ca2_kt']);
        user_data.append('t4_ca2_bd', user_schedule['t4_ca2_bd']);
        user_data.append('t4_ca2_kt', user_schedule['t4_ca2_kt']);
        user_data.append('t5_ca2_bd', user_schedule['t5_ca2_bd']);
        user_data.append('t5_ca2_kt', user_schedule['t5_ca2_kt']);
        user_data.append('t6_ca2_bd', user_schedule['t6_ca2_bd']);
        user_data.append('t6_ca2_kt', user_schedule['t6_ca2_kt']);
        user_data.append('t7_ca2_bd', user_schedule['t7_ca2_bd']);
        user_data.append('t7_ca2_kt', user_schedule['t7_ca2_kt']);
        user_data.append('t8_ca2_bd', user_schedule['t8_ca2_bd']);
        user_data.append('t8_ca2_kt', user_schedule['t8_ca2_kt']);
        user_data.append('intro', intro);
        user_data.append('work_process', work_process);
        user_data.append('job_skill', job_skill);

        $.ajax({
            url: '/update-user-profile',
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
            cache: false,
            contentType: false,
            processData: false,
            type: 'POST',
            data: user_data,
<<<<<<< HEAD
            success: function() {
                alert('Cập nhật ảnh thành công!')
                const fileReader = new FileReader()
                fileReader.readAsDataURL(file)
                fileReader.onload = function() {
                    const url = fileReader.result;
                    document.getElementById('show_avata').innerHTML = `<img src="${url}" alt="${file.name}" class="preview-img" />`;
                }
            }
        });

    })
    //hết cập nhật ảnh đại diện
=======
            dataType: "JSON",
            success: function(output) {
                alert(output['message']);
            }
        });
    }
}

const ipnFileElement = document.querySelector('#change_avata');
const validImageTypes = ['image/gif', 'image/jpeg', 'image/png'];

ipnFileElement.addEventListener('change', function(e) {
    const files = e.target.files
    const file = files[0]
    const fileType = file['type']
    const filesize = 2097152
    if (!validImageTypes.includes(fileType)) {
        alert('Ảnh không đúng định dạng')
        return
    }
    if (file.size > filesize) {
        alert('Kích cỡ ảnh quá lớn!')
        document.getElementById('change_avata').value = '';
        return
    }
    var user_data = new FormData();
    user_data.append('image', file);
    // // var file_data = $('#change_avata').prop('files')[0];
    // if (file != undefined) {

    //     //lấy ra kiểu file
    //     var type = file.type;
    //     //Xét kiểu file được upload
    //     var match = ["image/gif", "image/png", "image/jpg"];
    //     if (type == match[0] || type == match[1] || type == match[2]) {
    //         //khởi tạo đối tượng form data
    //         // var form_data = new FormData();
    //         // thêm files vào trong form data
    //         user_data.append('file', file);
    //         // alert(user_data['avata']['name']);
    //     } else {
    //         alert('Định dạng ảnh không đúng!');
    //     }
    // }
    $.ajax({
        url: '/update-user-image',
        cache: false,
        contentType: false,
        processData: false,
        type: 'POST',
        data: user_data,
        success: function() {
            alert('Cập nhật ảnh thành công!')
            const fileReader = new FileReader()
            fileReader.readAsDataURL(file)
            fileReader.onload = function() {
                const url = fileReader.result;
                document.getElementById('show_avata').innerHTML = `<img src="${url}" alt="${file.name}" class="preview-img" />`;
            }
        }
    });

})
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769

$(document).on("click", '.add_skill', function() {
    // alert($(this).parent().next().attr('disabled'));
    if ($(this).parent().next().attr('disabled')) {
        $(this).parent().next().removeAttr('disabled');
        $(this).parent().nextAll("button").show();
        // $(this).parent().nextAll(".btn_remove_skill").html(`<img src="/images/minus_skill_nonactive.svg" alt="xoa ky nang">`);
    } else {
        $(this).parent().next().prop('disabled', 'disabled');
        $(this).parent().nextAll("button").hide();
    }
})
$(document).on("click", '.btn_add_skill', function() {
    // a = document.createElement("div");
    // a.setAttribute("class", "other_skill");
    // $(this).parentNode.appendChild(a);
    $(this).parent().parent().append(`<div class="other_skill">
        <label class="container">
                <input type="checkbox" class="add_skill" checked>
                <span class="checkmark"></span>
            </label>
        <input type="text" placeholder="Kỹ năng khác"  name="add_skill" >
        <button class="btn_add_skill" type="button" ><img src="/images/add_skill.svg" alt="them ky nang"></button>
        <button class="btn_remove_skill" type="button" ><img src="/images/minus_skill.svg" alt="xoa ky nang"></button>
        </div>`);
})

$(document).on("click", '.btn_remove_skill', function() {
    $(this).parent().remove();
})


// hover cho cong viec da luu
$(".job_item").hover(function() {
    this.querySelector('.icon_location').innerHTML = `<img src="/images/location_icon_hover.svg" alt="dia chi">`;
    this.querySelector('.icon_salary').innerHTML = `<img src="/images/salary_icon_hover.svg" alt="luong">`;
    this.querySelector('.icon_job_location').innerHTML = `<img src="/images/job_location_icon_hover.svg" alt="o cung chu nha">`;
    this.querySelector('.icon_birthday').innerHTML = `<img src="/images/birthday_icon_hover.svg" alt="tuoi">`;
    this.querySelector('.icon_exp').innerHTML = `<img src="/images/exp_icon_hover.svg" alt="kinh nghiem">`;
    this.querySelector('.icon_job_tag').innerHTML = `<img src="/images/job_tag_icon_hover.svg" alt="them vao yeu thich">`;
}, function() {
    this.querySelector('.icon_location').innerHTML = `<img src="/images/location_icon.svg" alt="dia chi">`;
    this.querySelector('.icon_salary').innerHTML = `<img src="/images/salary_icon.svg" alt="luong">`;
    this.querySelector('.icon_job_location').innerHTML = `<img src="/images/job_location_icon.svg" alt="o cung chu nha">`;
    this.querySelector('.icon_birthday').innerHTML = `<img src="/images/birthday_icon.svg" alt="tuoi">`;
    this.querySelector('.icon_exp').innerHTML = `<img src="/images/exp_icon.svg" alt="kinh nghiem">`;
    this.querySelector('.icon_job_tag').innerHTML = `<img src="/images/job_tag_icon.svg" alt="them vao yeu thich">`;
});
//het hover cho cong viec da luu




// het cap nhat thong tin ca nhan

// tạm ẩn box để test
// $('.box_dynamic').hide();
// $('.box_right').hide();
// $('.block_general').hide();
// $('.block_profile').show();


//popup cap nhat trang thai cong viec
$('.change_job_status').click(function() {
    if ($(this).parent().find('.menu_status').is(':hidden')) {
        $('.menu_status').hide();
        $(this).parent().find('.menu_status').show();
        $(this).find('.img').html('<img src="/images/arrow_up.svg" alt="mui ten">');
    } else {
        $(this).parent().find('.menu_status').hide();
        $(this).find('.img').html('<img src="/images/arrow_down.svg" alt="mui ten">');
    }
})

<<<<<<< HEAD
function change_work_status(apply_id, work_status) {
    // alert(new_id + ',' + status);
    $.ajax({
        url: '/Handles/Home/AccountController/change_work_status',
        type: 'POST',
        data: {
            id: apply_id,
            work_status: work_status
        },
        success: function() {

        }
    });
}

=======
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
$(document).on('click', '.menu_status .not_start', function() {
    $(this).parent().prev().find('.text').html($(this).html());
    $(this).parent().prev().find('.text').removeClass('done');
    $(this).parent().prev().find('.text').removeClass('working');
    $(this).parent().prev().find('.text').addClass('not_start')
    $(this).parent().hide();
    $(this).parent().prev().find('.img').html('<img src="/images/arrow_down.svg" alt="mui ten">');
    $(this).parent().children().removeClass('selected');
    $(this).addClass('selected');
<<<<<<< HEAD
    apply_id = $(this).parent().attr('id');
    work_status = $(this).val();
    change_work_status(apply_id, work_status);
=======
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
})

$(document).on('click', '.menu_status .done', function() {
    $(this).parent().prev().find('.text').html($(this).html());
    $(this).parent().prev().find('.text').removeClass('not_start');
    $(this).parent().prev().find('.text').removeClass('working');
    $(this).parent().prev().find('.text').addClass('end')
    $(this).parent().hide();
    $(this).parent().prev().find('.img').html('<img src="/images/arrow_down.svg" alt="mui ten">');
    $(this).parent().children().removeClass('selected');
    $(this).addClass('selected');
<<<<<<< HEAD
    apply_id = $(this).parent().attr('id');
    work_status = $(this).val();
    change_work_status(apply_id, work_status);
=======
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
})

$(document).on('click', '.menu_status .working', function() {
    $(this).parent().prev().find('.text').html($(this).html());
    $(this).parent().prev().find('.text').removeClass('done');
    $(this).parent().prev().find('.text').removeClass('not_start');
    $(this).parent().prev().find('.text').addClass('working')
    $(this).parent().hide();
    $(this).parent().prev().find('.img').html('<img src="/images/arrow_down.svg" alt="mui ten">');
    $(this).parent().children().removeClass('selected');
    $(this).addClass('selected');
<<<<<<< HEAD
    apply_id = $(this).parent().attr('id');
    work_status = $(this).val();
    change_work_status(apply_id, work_status);
=======
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
})


//het popup cap nhat trang thai cong viec

//xu ly lich
if ($('.calender').html()) {
    let monEle = document.querySelector('#month');
    let yearEle = document.querySelector('#year');
    let currentMonth = new Date().getMonth();
    let currentYear = new Date().getFullYear();

    function displayCalender() {
        let currentMonthName = new Date(currentYear, currentMonth).toLocaleString('en-us', { month: 'long' });
        monEle.innerHTML = currentMonthName;
        yearEle.innerHTML = currentYear;
    }
    window.onload = displayCalender;

    function getDayInMonth() {
        return new Date(currentYear, currentMonth + 1, 0).getDate();
    }

    function getDayInPrevMonth() {
        if (currentMonth == 0) {
            month = 11;
            year = currentYear - 1;
            return new Date(year, month + 1, 0).getDate();
        } else {
            month = currentMonth - 1;
            year = currentYear;
            return new Date(year, month + 1, 0).getDate();
        }
    }


    function getStartDayInMonth() {
        return new Date(currentYear, currentMonth, 1).getDay();
    }

    function activeCurrentDay(day) {
        let day1 = new Date().toDateString();
        let day2 = new Date(currentYear, currentMonth, day).toDateString();
        return day1 == day2 ? 'active' : '';
    }

    let dateEle = document.querySelector('.day_box');

    function renderDate() {
        displayCalender();
        let dayInPrevMonth = getDayInPrevMonth();
        let daysInMonth = getDayInMonth();
        let startDay = getStartDayInMonth();
        dateEle.innerHTML = "";
        for (let i = 0; i < startDay; i++) {
            dateEle.innerHTML += `<button class="disable">${Number(dayInPrevMonth) - Number(startDay) + i + 1}</button>`;
        }
        for (let i = 0; i < daysInMonth; i++) {
            dateEle.innerHTML += `<button class="enable  ${activeCurrentDay(i + 1)}">${i + 1}</button>`;
        }
        if (daysInMonth + startDay <= 35) {
            for (let i = 0; i < (35 - daysInMonth - startDay); i++) {
                dateEle.innerHTML += `<button class="disable ">${i + 1}</button>`;
            }
        } else {
            for (let i = 0; i < (42 - daysInMonth - startDay); i++) {
                dateEle.innerHTML += `<button class="disable ">${i + 1}</button>`;
            }
        }
    }

<<<<<<< HEAD
    window.onload = renderDate();
=======
    window.onload = renderDate;
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769


    $('#prev_month').click(function() {
        if (currentMonth == 0) {
            currentMonth = 11;
            currentYear--;
            renderDate();
        } else {
            currentMonth--;
            renderDate();
        }
    })

    $('#next_month').click(function() {
        if (currentMonth == 11) {
            currentMonth = 0;
            currentYear++;
            renderDate();
            displayCalender();
        } else {
            currentMonth++;
            renderDate();
            displayCalender();
        }
    })
}

// het xu ly lich

//thay doi trang thai nguoi giup viec
$('#profile_status').change(function() {
    $.ajax({
        url: '/change-employee-status',
        cache: false,
        contentType: false,
        processData: false,
        type: 'POST',
        dataType: "JSON",
        success: function(status) {
            if (status == 1) {
                alert('Nhà tuyển dụng có thể nhìn thấy bạn!')
            } else {
                alert('Nhà tuyển dụng không thể nhìn thấy bạn!')
            }
        }
    });
})

$('#renew_profile').click(function() {
    $.ajax({
        url: '/renew-profile',
        cache: false,
        contentType: false,
        processData: false,
        type: 'POST',
        dataType: "JSON",
        success: function(status) {
<<<<<<< HEAD
            if (status) {
=======
            if (status == 1) {
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
                alert('Làm mới người giúp việc thành công!');
            } else {
                alert('Làm mới người giúp việc không thành công!');
            }
        }
    });
})

<<<<<<< HEAD


//dieu huong cho phan trang
=======
function validate_change_password() {
    $('#error_current_pass').html('');
    $('#error_new_pass').html('');
    $('#error_re_pass').html('');
    current_pass = $('#current_pass').val();
    new_pass = $('#new_pass').val();
    re_pass = $('#re_pass').val();
    flag = true;
    if (current_pass.trim() == '') {
        flag = false;
        $('#error_current_pass').html('Mật khẩu hiện tại không được để trống!');
    } else {
        if (current_pass.trim().length < 6) {
            $('#error_current_pass').html('Mật khẩu hiện tại không được ngắn hơn 6 ký tự!');
        }
    }
    if (new_pass.trim() == '') {
        flag = false;
        $('#error_new_pass').html('Mật khẩu mới không được để trống!');
    } else {
        if (new_pass.trim().length < 6) {
            $('#error_new_pass').html('Mật khẩu mới không được ngắn hơn 6 ký tự!');
        }
    }
    if (re_pass.trim() == '') {
        flag = false;
        $('#error_re_pass').html('Nhập lại mật khẩu không được để trống!');
    } else {
        if (new_pass != re_pass) {
            $('#error_re_pass').html('Nhập lại mật khẩu không khớp!');
        }
    }
    return flag;
}

function change_password() {
    if (validate_change_password()) {
        current_pass = $('#current_pass').val();
        new_pass = $('#new_pass').val();
        $.ajax({
            url: '/change-password',
            type: 'POST',
            data: {
                current_pass: current_pass,
                new_pass: new_pass
            },
            dataType: "JSON",
            success: function(output) {
                if (output['result']) {
                    alert(output['message']);
                } else {
                    if (output['invalid_pass']) {
                        $('#error_current_pass').html(output['message']);
                    } else {
                        alert(output['message']);
                    }
                }
            }
        });
    }
}

//dieu huong cho phan trang
function getURL() {
    return (window.location.origin + window.location.pathname);
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
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
