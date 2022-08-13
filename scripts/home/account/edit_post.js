// cập nhật bài đăng

function update_post() {
    if (form_post_validate()) {
        post_id = $('#post_id').val();
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
        post_data.append('post_id', post_id);
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
            url: '/update-post',
            cache: false,
            contentType: false,
            processData: false,
            type: 'POST',
            data: post_data,
            dataType: "JSON",
            success: function(output) {
                if (output['result']) {
                    alert('Cập nhật tin thành công!');
                    window.location.href = "/account-manager/list-post";
                } else if (output['title_exist'] == true) {
                    alert('Tiêu đề đã tồn tại!');
                } else if (output['post_exist'] == true) {
                    if (confirm("Tin đã tồn tại, bạn có muốn sửa tin?")) {
                        window.location.href = "edit-post?id=" + output['post_exist_id'];
                    }
                }
            }
        });

    }
}