function validate_email() {
    var emailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    var email = $('.email').val();
    if (email == '') {
        alert('Email không được bỏ trống!');
        flag = false;
    } else if (!email.match(emailformat)) {
        alert('Email không đúng định dạng!');
        flag = false;
    };
}
$('.email').change(function() {
    validate_email();
})

function validate_pass() {
    let password = $('.password').val();
    var passwordfomat = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d@$!%*#?&]{6,}$/;
    if (password == '') {
        alert('Mật khẩu không được bỏ trống!');
        flag = false;
    } else {
        if (!password.match(passwordfomat)) {
            flag = false;
            alert("Mật khẩu tối thiểu 6 kí tự, chứa ít nhất 1 chữ cái và 1 số, không chứa khoảng trắng!");
        }
    }
}
$('.password').change(function() {
    validate_pass();
})
$(document).ready(function() {
    $(".login_company").click(function() {
        var emailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
<<<<<<< HEAD
        var passwordfomat = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d@$!%*#?&]{6,}$/;
=======
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
        let email = $('.email').val();
        let password = $('.password').val();
        // console.log(email + ' ' + password);

        let flag = true;
        if (email == '') {
            alert('Email không được bỏ trống!');
            flag = false;
        } else if (!email.match(emailformat)) {
            alert('Email không đúng định dạng!');
            flag = false;
        } else if (password == '') {
            alert('Mật khẩu không được bỏ trống!');
            flag = false;
<<<<<<< HEAD
        } else if (!password.match(passwordfomat)) {
            flag = false;
            alert("Mật khẩu tối thiểu 6 kí tự, chứa ít nhất 1 chữ cái và 1 số, không chứa khoảng trắng!");
=======
        } else if (password.length < 6) {
            alert('Mật khẩu không được ngắn hơn 6 ký tự!');
            flag = false;
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
        }
        if (flag == true) {
            $.ajax({
                url: "action-login-company",
                type: 'POST',
                data: {
                    email: email,
                    password: password,
                },
                dataType: 'json',
                success: function(data) {
                    if (data['result']) {
                        window.location.href = '/account-manager'
                    } else {
                        alert(data['message']);
                    }

                }
            });
        }
    });
<<<<<<< HEAD
=======

    // 	var emailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    //         let email = $('.email').val();
    //         let password = $('.password').val();
    //         // console.log(email + ' ' + password);

    //         let flag = true;
    //         if (email == '') {
    //             alert('Email không được bỏ trống!');
    //             flag = false;
    //         } else if (!email.match(emailformat)) {
    //             alert('Email không đúng định dạng!');
    //             flag = false;
    //         } else if (password == '') {
    //             alert('Mật khẩu không được bỏ trống!');
    //             flag = false;
    //         } else if (password.length < 6) {
    //             alert('Mật khẩu không được ngắn hơn 6 ký tự!');
    //             flag = false;
    //         }
    //         if (flag == true) {
    //             $.ajax({
    //                 url: "action-login-company",
    //                 type: 'POST',
    //                 data: {
    //                     email: email,
    //                     password: password,
    //                 },
    //                 dataType: 'json',
    //                 success: function(data) {
    //                     if (data['result']) {
    //                         alert('ok');
    //                     } else {
    //                         alert(data['message']);
    //                     }

    //                 }
    //             });
    //         }

>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
});