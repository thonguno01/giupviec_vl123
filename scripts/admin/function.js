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

//function validate
function validate_email() {
    document.getElementById('error_email').innerHTML = "";
    var emailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if ($('#email').val() == '') {
        document.getElementById('error_email').innerHTML = "Email kh??ng ???????c ????? tr???ng!";
        flag = 0;
    } else {
        if (!document.getElementById('email').value.match(emailformat)) {
            document.getElementById('error_email').innerHTML = "Email kh??ng ????ng ?????nh d???ng!";
            flag = 0;
        } else {
            check_email($('#email').val());
        }
    }
}


function validate_name() {
    document.getElementById('error_name').innerHTML = "";
    var name_format = /^[a-zA-Z!@#\$%\^\&*\)\(+=._-]{2,}$/g;
    if ($("#name").val().trim() == "") {
        $('#error_name').html('H??? t??n kh??ng ???????c ????? tr???ng!');
        flag = 0;
    } else {
        if (!removeAscent($("#name").val()).match(name_format)) {
            $('#error_name').html('H??? t??n kh??ng ????ng ?????nh d???ng!');
            flag = 0;
        }
    }
}


function validate_phone() {
    document.getElementById('error_phone').innerHTML = "";
    var phoneformat = /((0)+([0-9]{9,})\b)/g;
    if ($('#phone').val() == '') {
        document.getElementById('error_phone').innerHTML = "S??? ??i???n tho???i kh??ng ???????c ????? tr???ng!";
        flag = 0;
    } else {
        if (!document.getElementById('phone').value.match(phoneformat)) {
            document.getElementById('error_phone').innerHTML = "S??? ??i???n tho???i kh??ng ????ng ?????nh d???ng!";
            flag = 0;
        }
    }
}



function validate_password() {
    document.getElementById('error_password').innerHTML = "";
    var passwordfomat = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d@$!%*#?&]{6,}$/;
    if ($('#password').val() == '') {
        document.getElementById('error_password').innerHTML = "M???t kh???u kh??ng ???????c ????? tr???ng!";
        flag = 0;
    } else {
        if ($('#password').val().trim().length < 6) {
            document.getElementById('error_password').innerHTML = "M???t kh???u kh??ng ???????c ??t h??n 6 k?? t???!";
            flag = 0;
        } else {
            if (!$('#password').val().match(passwordfomat)) {
                flag = 0;
                document.getElementById('error_password').innerHTML = "M???t kh???u ph???i ch???a ??t nh???t 1 ch??? c??i v?? 1 s???, kh??ng ch???a kho???ng tr???ng!";
            }
        }
    }
}


function validate_repassword() {
    document.getElementById('error_repassword').innerHTML = "";
    if ($('#repassword').val() == '') {
        document.getElementById('error_repassword').innerHTML = "Nh???p l???i m???t kh???u kh??ng ???????c ????? tr???ng!";
        flag = 0;
    } else {
        if (document.getElementById('password').value != document.getElementById('repassword').value) {
            document.getElementById('error_repassword').innerHTML = "Nh???p l???i m???t kh???u kh??ng kh???p!";
            flag = 0;
        }
    }
}


function validate_birth() {
    document.getElementById('error_birth').innerHTML = "";
    if ($('#birth').val() == '') {
        document.getElementById('error_birth').innerHTML = "Ng??y sinh kh??ng ???????c ????? tr???ng!";
        flag = 0;
    } else if (Date.parse($('#birth').val()) >= Date.parse(new Date())) {
        flag = 0;
        document.getElementById('error_birth').innerHTML = "Ng??y sinh kh??ng ???????c sau ng??y hi???n t???i!";
    }
}


function validate_province() {
    document.getElementById('error_province').innerHTML = "";
    if ($('#province').val() == '') {
        document.getElementById('error_province').innerHTML = "T???nh/Th??nh ph??? kh??ng ???????c ????? tr???ng!";
        flag = 0;
    }
}


function validate_district() {
    document.getElementById('error_district').innerHTML = "";
    if ($('#district').val() == '') {
        document.getElementById('error_district').innerHTML = "Qu???n/Huy???n kh??ng ???????c ????? tr???ng!";
        flag = 0;
    }
}


function validate_address() {
    document.getElementById('error_address').innerHTML = "";
    if ($('#address').val() == '') {
        document.getElementById('error_address').innerHTML = "?????a ch??? c??? th??? kh??ng ???????c ????? tr???ng!";
        flag = 0;
    }
}


function validate_job_style() {
    document.getElementById('error_job_style').innerHTML = "";
    if ($('#job_style').val() == '') {
        document.getElementById('error_job_style').innerHTML = "Lo???i c??ng vi???c kh??ng ???????c ????? tr???ng!";
        flag = 0;
    }
}


function validate_experience() {
    document.getElementById('error_experience').innerHTML = "";
    if ($('#experience').val() == '') {
        document.getElementById('error_experience').innerHTML = "Kinh nghi???m kh??ng ???????c ????? tr???ng!";
        flag = 0;
    }
}


function validate_education() {
    document.getElementById('error_education').innerHTML = "";
    if ($('#education').val() == '') {
        document.getElementById('error_education').innerHTML = "Tr??nh ????? h???c v???n kh??ng ???????c ????? tr???ng!";
        flag = 0;
    }
}


function validate_work_type() {
    document.getElementById('error_work_type').innerHTML = "";
    if ($('#work_type').val() == '') {
        document.getElementById('error_work_type').innerHTML = "??? c??ng ch??? nh?? kh??ng ???????c ????? tr???ng!";
        flag = 0;
    }
}


function validate_salary() {
    document.getElementById('error_sal').innerHTML = "";
    if ($('#static_sal_btn').is(':checked')) {
        if ($('#sal').val().trim() == '' || $('#sal').val().trim() == '0') {
            flag = 0;
            document.getElementById('error_sal').innerHTML = "M???c l????ng kh??ng ???????c ????? tr???ng!"
        }
    } else {
        if ($('#sal_from').val().trim() == '' || $('#sal_to').val().trim() == '' || $('#sal_from').val().trim() == '0' || $('#sal_to').val().trim() == '0') {
            flag = 0;
            document.getElementById('error_sal').innerHTML = "M???c l????ng kh??ng ???????c ????? tr???ng!"
        } else if (parseInt($('#sal_from').val().replaceAll(',', '')) > parseInt($('#sal_to').val().replaceAll(',', ''))) {
            flag = 0;
            document.getElementById('error_sal').innerHTML = "M???c l????ng kh??ng h???p l???!"
        }
    }
}


function validate_schedule() {
    document.getElementById('error_schedule').innerHTML = "";
    schedule_checked = document.getElementsByClassName('checkbox_schedule');
    flag_schedule = 0;
    for (var i = 0; i < schedule_checked.length; i++) {
        if (schedule_checked[i].checked === true) {
            flag_schedule = 1;
        }
    }
    if (flag_schedule == 0) {
        document.getElementById('error_schedule').innerHTML = "L???ch l??m vi???c kh??ng ???????c ????? tr???ng!";
        flag = 0;
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
        if (validate_schedule_time('t7_am')) {
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
}

function removeAscent(str) {
    if (str === null || str === undefined) return str;
    str = str.toLowerCase();
    str = str.replace(/??|??|???|???|??|??|???|???|???|???|???|??|???|???|???|???|???/g, "a");
    str = str.replace(/??|??|???|???|???|??|???|???|???|???|???/g, "e");
    str = str.replace(/??|??|???|???|??/g, "i");
    str = str.replace(/??|??|???|???|??|??|???|???|???|???|???|??|???|???|???|???|???/g, "o");
    str = str.replace(/??|??|???|???|??|??|???|???|???|???|???/g, "u");
    str = str.replace(/???|??|???|???|???/g, "y");
    str = str.replace(/??/g, "d");
    str = str.replace(/\s/g, '');
    return str;
}