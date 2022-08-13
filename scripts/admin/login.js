function login_validate() {
    $('.err_name').html('');
    $('.err_pass').html('');
    user_name = $('#name').val();
    password = $('#password').val();
    flag = true;
    if (user_name.trim() == '') {
        $('.err_name').html('Tên đăng nhập không được để trống!');
        flag = false;
    }
    if (password.trim() == '') {
        $('.err_pass').html('Mật khẩu không được để trống!');
        flag = false;
    } else {
        if (password.trim().length < 6) {
            $('.err_pass').html('Mật khẩu không được ít hơn 6 kí tự!');
            flag = false;
        }
    }
    return flag;
}



function login() {
    if (login_validate()) {
        user_name = $('#name').val();
        password = $('#password').val();
        $.ajax({
            url: '/Handles/Admin/LoginController/login',
            type: 'POST',
            dataType: 'json',
            data: {
                user_name: user_name,
                password: password
            },
            success: function(data) {
                // console.log(data);
                if (data.result == true) {
                    window.location.href = '/admin';
                } else {
                    $(".err_pass").html("Tên hoặc mật khẩu không đúng.");
                    $("#password").val("");
                }
            }
        });
    }
}