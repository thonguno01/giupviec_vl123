$('#province').select2({
    placeholder: "Chọn Tỉnh/Thành phố"
});

$('.block_profile #province').select2({
    placeholder: "Chọn Tỉnh/Thành phố"
});

$('#stay').select2({

});
$('#district').select2({
    placeholder: "Chọn Quận/Huyện"
});
$('.block_profile #district').select2({
    placeholder: "Chọn Quận/Huyện"
});
$('#job_style').select2({
    placeholder: "Chọn loại hình dịch vụ"
});
$('#experience').select2({
    placeholder: "Lựa chọn kinh nghiệm"
});
$('#education').select2({
    placeholder: "Lựa chọn trình độ học vấn"
});
$('#sal_time_dynamic').select2({});
$('#sal_time_static').select2({});
$('#profile_province').select2({
    placeholder: "Chọn Tỉnh/Thành phố"
})
$('#profile_district').select2({
    placeholder: "Chọn Quận/Huyện"
})

min_age = parseInt($('#range_age').attr('min'));
max_age = parseInt($('#range_age').attr('max'));
var age_range = new rSlider({
    target: '#range_age',
    values: { min: 16, max: 80 },
    step: 1,
    range: true,
    tooltip: true,
    scale: true,
    labels: false,
    set: [min_age, max_age]
});

function hide_schedule_row(id) {
    schedule = '';
    var schedule = $('#' + id + ' .col_time').html();
    if (schedule) {
        $('#' + id + ' .col_time').remove();
        $('#' + id).append('<div class="schedule_msg" id="schedule_msg_' + id + '">Ngày nghỉ</div>');
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

//chọn loại lương
$('#static_sal_btn').click(function() {
    $('#sal_dynamic').hide();
    $('#sal_static').show();
})

$('#dynamic_sal_btn').click(function() {
    $('#sal_dynamic').show();
    $('#sal_static').hide();
});
//hết chọn loại lương

// lấy dữ liệu tỉnh thành
$('#province').change(function() {
    get_district();
});
//validate đăng bài

function validate_title() {
    document.getElementById('error_title').innerHTML = "";
    if ($('#title').val() == '') {
        document.getElementById('error_title').innerHTML = "Tiêu đề không được để trống!";
        flag = 0;
    } else {
        if ($('#title').val().trim() == '') {
            document.getElementById('error_title').innerHTML = "Tiêu đề không được để trống!";
            flag = 0;
        }
    }
}
$('#title').blur(function() {
    validate_title();
})

function validate_address() {
    document.getElementById('error_address').innerHTML = "";
    if ($('#address').val() == '') {
        document.getElementById('error_address').innerHTML = "Địa chỉ cụ thể không được để trống!";
        flag = 0;
    } else {
        if ($('#address').val().trim() == '') {
            document.getElementById('error_address').innerHTML = "Địa chỉ cụ thể không được để trống!";
            flag = 0;
        }
    }
}
$('#address').blur(function() {
    validate_address();
})

function validate_day() {
    document.getElementById('error_day_start').innerHTML = "";
    document.getElementById('error_day_close').innerHTML = "";
    if ($('#day_start').val() == '') {
        document.getElementById('error_day_start').innerHTML = "Ngày bắt đầu không được để trống!";
        flag = 0;
    }
    if ($('#day_close').val() == '') {
        document.getElementById('error_day_close').innerHTML = "Thời hạn không được để trống!";
        flag = 0;
    }
    now = dateToYMD(new Date());
    // alert(($('#day_start').val()).valueOf());
    if ($('#day_start').val() != '' && $('#day_close').val() != '') {
        day_start = new Date($('#day_start').val());
        day_close = new Date($('#day_close').val());
        if (parseInt(Date.parse(day_close)) < parseInt(Date.parse(now))) {
            document.getElementById('error_day_close').innerHTML = "Thời hạn nhận việc không được trước ngày hiện tại!";
            flag = 0;
        } else {
            if (day_start <= day_close) {
                document.getElementById('error_day_close').innerHTML = "Thời hạn nhận việc phải trước ngày bắt đầu làm việc!";
                flag = 0;
            }
        }
    }
}
$('#day_start').blur(function() {
    validate_day();
})
$('#day_close').blur(function() {
    validate_day();
})

function validate_job_detail() {
    document.getElementById('error_job_detail').innerHTML = "";
    if ($('#job_detail').val() == '') {
        document.getElementById('error_job_detail').innerHTML = "Mô tả công việc không được để trống!";
        flag = 0;
    } else {
        if ($('#job_detail').val().trim() == '') {
            document.getElementById('error_job_detail').innerHTML = "Mô tả công việc không được để trống!";
            flag = 0;
        }
    }
}
$('#job_detail').blur(function() {
    validate_job_detail();
})

function validate_job_require() {
    document.getElementById('error_job_require').innerHTML = "";
    if ($('#job_require').val() == '') {
        document.getElementById('error_job_require').innerHTML = "Yêu cầu không được để trống!";
        flag = 0;
    } else {
        if ($('#job_require').val().trim() == '') {
            document.getElementById('error_job_require').innerHTML = "Yêu cầu không được để trống!";
            flag = 0;
        }
    }
}
$('#job_require').blur(function() {
    validate_job_require();
})

function validate_job_benefit() {
    document.getElementById('error_job_benefit').innerHTML = "";
    if ($('#job_benefit').val() == '') {
        document.getElementById('error_job_benefit').innerHTML = "Quyền lợi không được để trống!";
        flag = 0;
    } else {
        if ($('#job_benefit').val().trim() == '') {
            document.getElementById('error_job_benefit').innerHTML = "Quyền lợi không được để trống!";
            flag = 0;
        }
    }
}
$('#job_benefit').blur(function() {
    validate_job_benefit();
})
$('.row_sal input').blur(function() {
    validate_salary();
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
$(document).on('blur', '.table_schedule input', function() {
    validate_schedule();
})
$('.checkbox_schedule').change(function() {
    validate_schedule();
})
$('#province').on("select2:close", function() {
    validate_province();
});

$('#district').on("select2:close", function() {
    validate_district();
});


function form_post_validate() {
    flag = 1;
    validate_title();
    validate_job_style();
    validate_experience();
    validate_education();
    validate_province();
    validate_district();
    validate_address();
    validate_salary();
    validate_day();
    validate_schedule();
    validate_job_detail();
    validate_job_require();
    validate_job_benefit();

    if (flag == 0) {
        return false;
    } else {
        return true;
    }
}

// validate lịch làm việc
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
//het validate dang bai

// gửi dữ liệu bài đăng

function submit_post() {
    if (form_post_validate()) {
        news_id = $('#news_id').val();
        company_id = $('#company_id').val();
        title = $('#title').val();
        job_style = $('#job_style').val();
        exp = $('#experience').val();
        edu = $('#education').val();
        city = $('#province').val();
        district = $('#district').val();
        address = $('#address').val();
        work_type_id = $('#stay').val();
        salary1 = 0;
        salary2 = 0;
        salary_type = '';
        salary_time = '';
        sal_option = '';
        $('[name="sal_option"]').each(function() {
            if ($(this).is(':checked')) {
                sal_option = $(this).val();
            }
        })
        if (sal_option == 0) {
            salary_type = 0;
            salary1 = $('#sal').val().replaceAll(',', '');
            salary_time = $('#sal_time_static').val();
        } else {
            salary_type = 1;
            salary1 = $('#sal_from').val().replaceAll(',', '');
            salary2 = $('#sal_to').val().replaceAll(',', '');
            salary_time = $('#sal_time_dynamic').val();
        }
        day_start = $('#day_start').val();
        day_close = $('#day_close').val();
        job_detail = $('#job_detail').val();
        job_require = $('#job_require').val();
        job_benefit = $('#job_benefit').val();
        age = age_range.getValue();
        age_arr = age.split(',');
        age_from = age_arr[0];
        age_to = age_arr[1];
        work_schedule = get_work_schedule();

        var post_data = new FormData();
        post_data.append('news_id', news_id);
        post_data.append('company_id', company_id);
        post_data.append('title', title);
        post_data.append('job_style', job_style);
        post_data.append('exp', exp);
        post_data.append('edu', edu);
        post_data.append('city', city);
        post_data.append('district', district);
        post_data.append('address', address);
        post_data.append('work_type_id', work_type_id);
        post_data.append('salary_type', salary_type);
        post_data.append('salary1', salary1);
        post_data.append('salary2', salary2);
        post_data.append('salary_time', salary_time);
        post_data.append('day_start', day_start);
        post_data.append('day_close', day_close);
        post_data.append('job_require', job_require);
        post_data.append('job_detail', job_detail);
        post_data.append('job_benefit', job_benefit);
        post_data.append('age_from', age_from);
        post_data.append('age_to', age_to);

        post_data.append('t2_ca1_bd', work_schedule['t2_ca1_bd']);
        post_data.append('t2_ca1_kt', work_schedule['t2_ca1_kt']);
        post_data.append('t3_ca1_bd', work_schedule['t3_ca1_bd']);
        post_data.append('t3_ca1_kt', work_schedule['t3_ca1_kt']);
        post_data.append('t4_ca1_bd', work_schedule['t4_ca1_bd']);
        post_data.append('t4_ca1_kt', work_schedule['t4_ca1_kt']);
        post_data.append('t5_ca1_bd', work_schedule['t5_ca1_bd']);
        post_data.append('t5_ca1_kt', work_schedule['t5_ca1_kt']);
        post_data.append('t6_ca1_bd', work_schedule['t6_ca1_bd']);
        post_data.append('t6_ca1_kt', work_schedule['t6_ca1_kt']);
        post_data.append('t7_ca1_bd', work_schedule['t7_ca1_bd']);
        post_data.append('t7_ca1_kt', work_schedule['t7_ca1_kt']);
        post_data.append('t8_ca1_bd', work_schedule['t8_ca1_bd']);
        post_data.append('t8_ca1_kt', work_schedule['t8_ca1_kt']);
        post_data.append('t2_ca2_bd', work_schedule['t2_ca2_bd']);
        post_data.append('t2_ca2_kt', work_schedule['t2_ca2_kt']);
        post_data.append('t3_ca2_bd', work_schedule['t3_ca2_bd']);
        post_data.append('t3_ca2_kt', work_schedule['t3_ca2_kt']);
        post_data.append('t4_ca2_bd', work_schedule['t4_ca2_bd']);
        post_data.append('t4_ca2_kt', work_schedule['t4_ca2_kt']);
        post_data.append('t5_ca2_bd', work_schedule['t5_ca2_bd']);
        post_data.append('t5_ca2_kt', work_schedule['t5_ca2_kt']);
        post_data.append('t6_ca2_bd', work_schedule['t6_ca2_bd']);
        post_data.append('t6_ca2_kt', work_schedule['t6_ca2_kt']);
        post_data.append('t7_ca2_bd', work_schedule['t7_ca2_bd']);
        post_data.append('t7_ca2_kt', work_schedule['t7_ca2_kt']);
        post_data.append('t8_ca2_bd', work_schedule['t8_ca2_bd']);
        post_data.append('t8_ca2_kt', work_schedule['t8_ca2_kt']);

        $.ajax({
            url: '/Handles/Admin/NewsController/edit',
            cache: false,
            contentType: false,
            processData: false,
            type: 'POST',
            data: post_data,
            dataType: "JSON",
            success: function(output) {
                if (output['result']) {
                    alert('Cập nhật tin thành công!');
                    window.location.href = '/admin/list_news';
                } else if (output['title_exist'] == true) {
                    alert('Tiêu đề đã tồn tại!');
                } else if (output['post_exist'] == true) {
                    if (confirm("Tin đã tồn tại, bạn có muốn sửa tin?")) {
                        window.location.href = "/admin/edit_news/" + output['post_exist_id'];
                    }
                }
            }
        });

    }
}