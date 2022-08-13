function form_validate() {
    flag = 1
<<<<<<< HEAD
    var passwordfomat = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d@$!%*#?&]{6,}$/;
=======
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
    document.getElementById('error_password').innerHTML = "";
    document.getElementById('error_repassword').innerHTML = "";
    if ($('#password').val() == '') {
        document.getElementById('error_password').innerHTML = "Mật khẩu không được để trống!";
        flag = 0;
    } else {
<<<<<<< HEAD
        if (!$('#password').val().match(passwordfomat)) {
            flag = 0;
            document.getElementById('error_password').innerHTML = "Mật khẩu tối thiểu 6 ký tự gồm chữ, số, không chứa dấu cách!";
=======
        if (document.getElementById('password').value.length < 6) {
            document.getElementById('error_password').innerHTML = "Mật khẩu không được ngắn hơn 6 ký tự!";
            flag = 0;
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
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
    }
}

function reset_password() {
    if (form_validate()) {
        $.ajax({
<<<<<<< HEAD
            url: "/handle-reset-password-employee",
=======
            url: "handle-reset-password-employee",
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
            type: 'POST',
            data: {
                password: $('#password').val(),
            },
            dataType: 'JSON',
            success: function(output) {
                if (output['result']) {
<<<<<<< HEAD
                    window.location.href = '/reset-password-success';
=======
                    window.location.href = 'reset-password-success';
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
                } else {
                    alert('Đặt lại mật khẩu thất bại!');
                }
            }
        });
    }
<<<<<<< HEAD
}
=======
}
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
