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
// validate

var flag = 1;

$('#name').blur(function() {
    validate_name();
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

$('#experience').blur(function() {
    validate_experience();
})

$('#education').blur(function() {
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

function validate_skill() {
    document.getElementById('error_skill').innerHTML = "";
    list_skill = get_skill();
    if (list_skill == '') {
        flag = 0;
        document.getElementById('error_skill').innerHTML = "Kỹ năng không được để trống!"
    }
}
$('[name="skill"]').change(function() {
    validate_skill();
})


function form_profile_validate() {
    flag = 1;
    validate_address();
    validate_birth();
    validate_district();
    validate_name();
    validate_province();
    validate_job_style();
    validate_work_type();
    validate_experience();
    validate_education();
    validate_salary();
    validate_schedule();
    validate_skill();
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
        work_type = $('#stay').val();
        experience = $('#experience').val();
        education = $('#education').val();
        sal_time = $('#sal_time').val();
        salary1 = 0;
        salary2 = 0;
        if (!$('.row_sal #static').is(':hidden')) {
            sal_type = 0;
            salary1 = $('#sal').val().replaceAll(',', '');
        } else {
            sal_type = 1;
            salary1 = $('#sal_from').val().replaceAll(',', '');
            salary2 = $('#sal_to').val().replaceAll(',', '');
        }
        user_schedule = get_work_schedule();
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
        user_data.append('intro', intro);
        user_data.append('work_process', work_process);
        user_data.append('job_skill', job_skill);

        $.ajax({
            url: '/update-user-profile',
            cache: false,
            contentType: false,
            processData: false,
            type: 'POST',
            data: user_data,
            dataType: "JSON",
            success: function(output) {
                alert(output['message']);
                if (output['result']) {
                    window.location.href = '/account-manager';
                }
            }
        });
    }
}