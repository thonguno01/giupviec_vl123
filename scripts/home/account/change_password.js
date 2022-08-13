var flag = true;
var passwordfomat = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$/;

function validate_new_pass() {

    $('#error_new_pass').html('');
    new_pass = $('#new_pass').val();
    if (new_pass.trim() == '') {
        flag = false;
        $('#error_new_pass').html('Mật khẩu mới không được để trống!');
    } else {
        if (!new_pass.match(passwordfomat)) {
            flag = false;
            document.getElementById('error_new_pass').innerHTML = "Mật khẩu tối thiểu 6 ký tự, chứa ít nhất 1 chữ cái và 1 số, không chứa khoảng trắng!";
        }
    }
}
$('#new_pass').blur(function() {
    validate_new_pass();
});

function validate_cur_pass() {
    $('#error_current_pass').html('');
    current_pass = $('#current_pass').val();
    if (current_pass.trim() == '') {
        flag = false;
        $('#error_current_pass').html('Mật khẩu hiện tại không được để trống!');
    } else {
        if (!current_pass.match(passwordfomat)) {
            flag = false;
            document.getElementById('error_current_pass').innerHTML = "Mật khẩu tối thiểu 6 ký tự, chứa ít nhất 1 chữ cái và 1 số, không chứa khoảng trắng!";
        }
    }
}
$('#current_pass').blur(function() {
    validate_cur_pass();
});

function validate_repass() {
    $('#error_re_pass').html('');
    re_pass = $('#re_pass').val();
    if (re_pass.trim() == '') {
        flag = false;
        $('#error_re_pass').html('Nhập lại mật khẩu không được để trống!');
    } else {
        if (new_pass != re_pass) {
            flag = false;
            $('#error_re_pass').html('Nhập lại mật khẩu không khớp!');
        }
    }
}
$('#re_pass').blur(function() {
    validate_repass();
});

function validate_change_password() {
    flag = true;
    validate_cur_pass();
    validate_new_pass();
    validate_repass();
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
                    window.location.href = '/account-manager'
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