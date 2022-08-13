function form_validate() {
    flag = 1
    var passwordfomat = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d@$!%*#?&]{6,}$/;
    document.getElementById('error_password').innerHTML = "";
    document.getElementById('error_repassword').innerHTML = "";
    if ($('#password').val() == '') {
        document.getElementById('error_password').innerHTML = "Mật khẩu không được để trống!";
        flag = 0;
    } else {
<<<<<<< HEAD:scripts/home/user/reset_password_company.js
        if (!$('#password').val().match(passwordfomat)) {
=======
        if (document.getElementById('password').value.length < 6) {
            document.getElementById('error_password').innerHTML = "Mật khẩu không được ngắn hơn 6 ký tự!";
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769:scripts/home/user/reset_password.js
            flag = 0;
            document.getElementById('error_password').innerHTML = "Mật khẩu tối thiểu 6 ký tự gồm chữ, số, không chứa dấu cách!";
        }
    }
    if ($('#repassword').val() == '') {
        document.getElementById('error_repassword').innerHTML = "Mật khẩu không được để trống!";
        flag = 0;
    } else {
        if (document.getElementById('repassword').value != document.getElementById('password').value) {
            document.getElementById('error_repassword').innerHTML = "Mật khẩu nhập lại không khớp!";
            flag = 0;
        }
    }
    if (flag == 0) {
        return false;
    } else {
        return true;
<<<<<<< HEAD:scripts/home/user/reset_password_company.js
=======
    }
}

function reset_password() {
    if (form_validate()) {
        $.ajax({
            url: "handle-reset-password-company",
            type: 'POST',
            data: {
                password: $('#password').val(),
            },
            dataType: 'JSON',
            success: function(output) {
                if (output['result']) {
                    window.location.href = 'reset-password-success';
                } else {
                    alert('Đặt lại mật khẩu thất bại!');
                }
            }
        });
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769:scripts/home/user/reset_password.js
    }
}

function reset_password() {
    if (form_validate()) {
        $.ajax({
            url: "/handle-reset-password-company",
            type: 'POST',
            data: {
                password: $('#password').val(),
            },
            dataType: 'JSON',
            success: function(output) {
                if (output['result']) {
                    window.location.href = '/reset-password-success';
                } else {
                    alert('Đặt lại mật khẩu thất bại!');
                }
            }
        });
    }
}