$(document).ready(function() {
    $.validator.addMethod("validateEmail", function(value, element) {
        return this.optional(element) || /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(value);
    }, "Email không đúng định dạng!");
    $.validator.addMethod("valName", function(value, element) {
        return this.optional(element) || /^[a-zA-Z0-9_àáãạảăắằẳẵặâấầẩẫậèéẹẻẽêềếểễệđìíĩỉịòóõọỏôốồổỗộơớờởỡợùúũụủưứừửữựỳỵỷỹýÀÁÃẠẢĂẮẰẲẴẶÂẤẦẨẪẬÈÉẸẺẼÊỀẾỂỄỆĐÌÍĨỈỊÒÓÕỌỎÔỐỒỔỖỘƠỚỜỞỠỢÙÚŨỤỦƯỨỪỬỮỰỲỴỶỸÝ ]*$/i.test(value);
    }, "Tên đăng nhập không được chứa ký tự đặc biệt");
    $.validator.addMethod("validateSdt", function(value, element) {
        if (this.optional(element) || /^\d{10}$/.test(value)) {
            return true;
        } else {
            return false;
        };
    }, "Nhập sai định dạng số điện thoại, phải đủ 10 số");
    $('#add_tags').validate({
        onkeyup: false,
        onclick: false,
        rules: {
            "userName": {
                required: true,
                valName: true,
            },
            "phone": {
                validateSdt: true,
            },
            "password": {
                required: true,
                minlength: 6
            },
            "repassword": {
                equalTo: "#password",
                minlength: 6
            },
            "email": {
                required: true,
                validateEmail: true
            }
        },
        messages: {
            "userName": {
                required: "Tên đăng nhập không được để trống!"
            },
            "password": {
                required: "Mật khẩu không được để trống!",
                minlength: "Mật khẩu không được ngắn hơn 6 kí tự."
            },
            "repassword": {
                equalTo: "Nhập lại mật khẩu không khớp!",
                minlength: "Nhập lại mật khẩu không được ngắn hơn 6 kí tự."
            },
            "email": {
                required: "Email không được để trống!"
            }
        },
        submitHandler: function(form) {
            var modules = [];
            $("input[name='modul']:checked").each(function() {
                modules.push($(this).val());
            });
            $.ajax({
                url: '/Handles/Admin/AccountController/add_account',
                type: 'POST',
                dataType: 'json',
                data: {
                    user_name: $('#name').val(),
                    full_name: $('#fullname').val(),
                    phone: $('#phone').val(),
                    password: $('#password').val(),
                    email: $('#email').val(),
                    modules: modules
                },
                success: function(output) {
                    alert(output['message']);
                    if (output['result'] == true) {
                        window.location.href = "/admin/list_account";
                    }
                }
            });
        }

    })
})