$(document).ready(function() {
    $('#province').select2({
        placeholder: "Chọn Tỉnh/Thành phố",
        minimumResultsForSearch: -1
    });
    $('#district').select2({
        placeholder: "Chọn Quận/Huyện",
        minimumResultsForSearch: Infinity
    });
    $('#work_type').select2({
        minimumResultsForSearch: Infinity
    });
    $('#job_style').select2({
        placeholder: "Có thể chọn cùng lúc nhiều loại công việc",
        minimumResultsForSearch: Infinity
    });
    $('#experience').select2({
        placeholder: "Lựa chọn kinh nghiệm",
        minimumResultsForSearch: Infinity
    });
    $('#education').select2({
        placeholder: "Lựa chọn trình độ học vấn",
        minimumResultsForSearch: Infinity
    });
    $('#sal_time').select2({
        minimumResultsForSearch: Infinity
    });
    $('#t7 .col_time').remove();
    $('#t7').append('<div class="schedule_msg" id="schedule_msg_t7">Tôi không làm việc</div>');
    $('#cn .col_time').remove();
    $('#cn').append('<div class="schedule_msg" id="schedule_msg_cn">Tôi không làm việc</div>');
    $('#add_t2').hide();
    $('#add_t3').hide();
    $('#add_t4').hide();
    $('#add_t5').hide();
    $('#add_t6').hide();
    $('#add_t7').hide();
    $('#add_cn').hide();
});


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
		<input type="text" value="07:00" class="start" name='${id}_am_start'>
		<span>Đến</span>
		<input type="text" value="11:00" class="end" name='${id}_am_end'>
		<button type="button" onclick="add_schedule_row('${id}')" id="add_${id}"><img src="/images/add_schedule.svg" alt=""></button>
	</div>
	<div class="col_3 col_time" id="${id}_pm">
		<span>Từ</span>
		<input type="text" value="18:00" class="start" name='${id}_pm_start'>
		<span>Đến</span>
		<input type="text" value="21:00" class="end" name='${id}_pm_end'>
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
		<input type="text" value="18:00" class="start" name='${id}_pm_start'>
		<span>Đến</span>
		<input type="text" value="21:00" class="end" name='${id}_pm_end'>
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

$('#option-1').click(function() {
    document.getElementById('dynamic').style.display = "none";
    document.getElementById('static').style.display = "block";
})

$('#option-2').click(function() {
    document.getElementById('dynamic').style.display = "block";
    document.getElementById('static').style.display = "none";
})


function check_email(email) {
    $.ajax({
        url: '/check-email-employee',
        type: 'POST',
        data: { email: email },
        dataType: "JSON",
        success: function(output) {
            if (output) {
                document.getElementById('error_email').innerHTML = "Email đã được đăng ký!";
            }
        }
    });
}

$('#email').focusout(function() {
    document.getElementById('error_email').innerHTML = "";
    email = $('#email').val();
    check_email(email);
})

// validate

<<<<<<< HEAD
var flag = 1;
=======
function form_register_validate() {
    document.getElementById('error_name').innerHTML = "";
    document.getElementById('error_phone').innerHTML = "";
    document.getElementById('error_email').innerHTML = "";
    document.getElementById('error_password').innerHTML = "";
    document.getElementById('error_repassword').innerHTML = "";
    document.getElementById('error_birth').innerHTML = "";
    document.getElementById('error_province').innerHTML = "";
    document.getElementById('error_district').innerHTML = "";
    document.getElementById('error_address').innerHTML = "";
    document.getElementById('error_job_style').innerHTML = "";
    document.getElementById('error_experience').innerHTML = "";
    document.getElementById('error_education').innerHTML = "";
    document.getElementById('error_schedule').innerHTML = "";
    document.getElementById('error_work_type').innerHTML = "";
    flag = 1;
    var phoneformat = /((0)+([0-9]{9})\b)/g;
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
        } else {
            check_email($('#email').val());
        }
    }
    if ($('#password').val() == '') {
        document.getElementById('error_password').innerHTML = "Mật khẩu không được để trống!";
        flag = 0;
    } else {
        if ($('#password').val().length < 6) {
            document.getElementById('error_password').innerHTML = "Mật khẩu không được ít hơn 6 kí tự!";
            flag = 0;
        }
    }
    if ($('#repassword').val() == '') {
        document.getElementById('error_repassword').innerHTML = "Nhập lại mật khẩu không được để trống!";
        flag = 0;
    } else {
        if (document.getElementById('password').value != document.getElementById('repassword').value) {
            document.getElementById('error_repassword').innerHTML = "Nhập lại mật khẩu không khớp!";
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
    schedule_checked = document.getElementsByClassName('checkbox_schedule');
    flag_schedule = 0;
    for (var i = 0; i < schedule_checked.length; i++) {
        if (schedule_checked[i].checked === true) {
            flag_schedule = 1;
        }
    }
    if (flag_schedule == 0) {
        document.getElementById('error_schedule').innerHTML = "Lịch làm việc không được để trống!";
        flag = 0;
    }
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769

$('#email').blur(function() {
    validate_email();
})

$('#name').blur(function() {
    validate_name();
})


$('#phone').blur(function() {
    validate_phone();
})

$('#password').blur(function() {
    validate_password();
})

$('#repassword').blur(function() {
    validate_repassword();
})

$('#birth').blur(function() {
    validate_birth();
})

$('#province').on("select2:close", function() {
    validate_province();
});

$('#district').on("select2:close", function() {
    validate_district();
});

$('#address').blur(function() {
    validate_address();
})

$('#job_style').on("select2:close", function() {
    validate_job_style();
});

$('#experience').on("select2:close", function() {
    validate_experience();
})

$('#education').on("select2:close", function() {
    validate_education();
})

$('#work_type').on("select2:close", function() {
    validate_work_type();
});

$('.row_sal input').blur(function() {
    validate_salary();
})

$(document).on('blur', '.table_schedule input', function() {
    validate_schedule();
})
$('.checkbox_schedule').click(function() {
    validate_schedule();
})


function form_register_validate() {
    flag = 1;
    validate_address();
    validate_birth();
    validate_district();
    validate_email();
    validate_name();
    validate_password();
    validate_phone();
    validate_province();
    validate_repassword();
    validate_job_style();
    validate_work_type();
    validate_experience();
    validate_education();
    validate_salary();
    validate_schedule();
    if (flag == 1) {
        return true;
    } else {
        return false;
    }
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

$('#province').change(function() {
    get_district();
});

//dang ky loi
function not_complete() {
    var emailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    var name = rewrite_name($('#name').val().trim());
    email = $('#email').val().trim();
    phone = $('#phone').val().trim();
    password = $('#password').val();
    birth = $('#birth').val();
    city = $('#province').val();
    district = $('#district').val();
    address = $('#address').val().trim();
    job_style = $('#job_style').val();
    work_type = $('#work_type').val();
    experience = $('#experience').val();
    education = $('#education').val();
    salary1 = 0;
    salary2 = 0;
    sal_time = $('#sal_time').val();
    if (!$('.row_sal #static').is(':hidden')) {
        sal_type = 0;
        salary1 = $('#sal').val().replaceAll(',', '');
    } else {
        sal_type = 1;
        salary1 = $('#sal_from').val().replaceAll(',', '');
        salary2 = $('#sal_to').val().replaceAll(',', '');
        if (parseInt(salary1) > parseInt(salary2)) {
            salary1 = '';
            salary2 = '';
        }
    }


    user_schedule = get_work_schedule();
    var user_data = new FormData();
    user_data.append('name', name);
    user_data.append('email', email);
    user_data.append('phone', phone);
    user_data.append('password', password);
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
    user_data.append('sal_time', sal_time);
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
    if ($('#email').val() != '' && $('#email').val().match(emailformat)) {
        $.ajax({
            url: '/not-complete-employee',
            cache: false,
            contentType: false,
            processData: false,
            type: 'POST',
            data: user_data,
            success: function() {

            }
        });
    }
}

<<<<<<< HEAD
$(document).on('change', 'input', function() {
    not_complete();
});
$(document).on('change', 'select', function() {
    not_complete();
})


//het dang ky loi

//dang ky
function register() {
    var name = rewrite_name($('#name').val().trim());
    email = $('#email').val().trim();
    phone = $('#phone').val().trim();
    password = $('#password').val().trim();
=======
//dang ky loi
function not_complete() {
    var emailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    var name = $('#name').val().trim();
    email = $('#email').val().trim();
    phone = $('#phone').val().trim();
    password = $('#password').val();
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
    birth = $('#birth').val();
    city = $('#province').val();
    district = $('#district').val();
    address = $('#address').val().trim();
    job_style = $('#job_style').val();
    work_type = $('#work_type').val();
    experience = $('#experience').val();
    education = $('#education').val();
    salary1 = 0;
    salary2 = 0;
<<<<<<< HEAD
    sal_type = $('#sal_time').val();
=======
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
    if (!$('.row_sal #static').is(':hidden')) {
        sal_type = 0;
        salary1 = $('#sal').val().replaceAll(',', '');
    } else {
        sal_type = 1;
<<<<<<< HEAD
        salary1 = $('#sal_from').val().replaceAll(',', '');
        salary2 = $('#sal_to').val().replaceAll(',', '');
=======
        salary1 = $('#sal_from').val();
        salary2 = $('#sal_to').val();
    }


    user_schedule = get_user_schedule();
    var user_data = new FormData();
    user_data.append('name', name);
    user_data.append('email', email);
    user_data.append('phone', phone);
    user_data.append('password', password);
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
    if ($('#email').val() != '' && $('#email').val().match(emailformat)) {
        $.ajax({
            url: '/not-complete-employee',
            cache: false,
            contentType: false,
            processData: false,
            type: 'POST',
            data: user_data,
            success: function() {

            }
        });
    }
}

$(document).on('change', ':input', function() {
    not_complete();
})

//het dang ky loi

//dang ky
function register() {
    var name = $('#name').val().trim();
    email = $('#email').val().trim();
    phone = $('#phone').val().trim();
    password = $('#password').val().trim();
    birth = $('#birth').val();
    city = $('#province').val();
    district = $('#district').val();
    address = $('#address').val().trim();
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
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
    }


    user_schedule = get_work_schedule();
    var user_data = new FormData();
    user_data.append('name', name);
    user_data.append('email', email);
    user_data.append('phone', phone);
    user_data.append('password', password);
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
    user_data.append('sal_time', sal_time);
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

    var file_data = $('#avata').prop('files')[0];
    if (file_data != undefined) {

        //lấy ra kiểu file
        var type = file_data.type;
        //Xét kiểu file được upload
        var match = ["image/gif", "image/png", "image/jpg"];
        if (type == match[0] || type == match[1] || type == match[2]) {
            //khởi tạo đối tượng form data
            // var form_data = new FormData();
            // thêm files vào trong form data
            user_data.append('file', file_data);
            // alert(user_data['avata']['name']);
        } else {
            alert('Định dạng ảnh không đúng!');
        }
    }
    if (form_register_validate()) {

        // alert(user_data['birth']);
        // alert(name + " " + email + " " + phone + " " + password + " " + birth + " " + city + " " + district + " " + address + " " + job_style[1] + " " + experience + " " + sal_type + " " + salary1 + " " + salary2);
        $('#loading_frame').show();
        $.ajax({
            url: '/register-employee',
            cache: false,
            contentType: false,
            processData: false,
            type: 'POST',
            data: user_data,
            dataType: "JSON",
            complete: function() {
                $('#loading_frame').hide();
            },
            success: function(output) {
                if (output['result'].toLowerCase() == 'true') {
                    window.location.href = '/register/employee/verify'
                } else {
                    alert(output['message']);
                }
            }
        });
    }
    // else {
    //     if ($('#email').val() != '') {
    //         $.ajax({
    //             url: '/not-complete-employee',
    //             cache: false,
    //             contentType: false,
    //             processData: false,
    //             type: 'POST',
    //             data: user_data,
    //             success: function() {

    //             }
    //         });
    //     }
    // }
}
//het dang ky
<<<<<<< HEAD

=======
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769

const ipnFileElement = document.querySelector('#avata');
const validImageTypes = ['image/gif', 'image/jpeg', 'image/png'];

ipnFileElement.addEventListener('change', function(e) {
    const files = e.target.files
    const file = files[0]
    const fileType = file['type']

    if (!validImageTypes.includes(fileType)) {
        alert('Ảnh không đúng định dạng')
        return
    }

    const fileReader = new FileReader()
    fileReader.readAsDataURL(file)

    fileReader.onload = function() {
        const url = fileReader.result;
        document.getElementById('show_avata').innerHTML = `<img src="${url}" alt="${file.name}" class="preview-img" />`;
    }
})