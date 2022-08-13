$("#province").select2({
	placeholder: "Chọn Tỉnh/Thành phố",
	minimumResultsForSearch: -1,
});
$("#district").select2({
	placeholder: "Chọn Quận/Huyện",
	minimumResultsForSearch: Infinity,
});

$("#province").change(function () {
	get_district();
});

function check_email(email) {
	$.ajax({
		url: "/check-email-company",
		type: "POST",
		data: { email: email },
		dataType: "JSON",
		success: function (output) {
			if (output) {
				document.getElementById("error_email").innerHTML =
					"Email đã được đăng ký!";
			}
		},
	});
}

$("#email").focusout(function () {
	document.getElementById("error_email").innerHTML = "";
	email = $("#email").val();
	check_email(email);
});

var flag = 1;

$("#email").blur(function () {
	validate_email();
});

$("#name").blur(function () {
	validate_name();
});

$("#phone").blur(function () {
	validate_phone();
});

$("#password").blur(function () {
	validate_password();
});

$("#repassword").blur(function () {
	validate_repassword();
});

$("#birth").blur(function () {
	validate_birth();
});

$("#province").on("select2:close", function () {
	validate_province();
});

$("#district").on("select2:close", function () {
	validate_district();
});

$("#address").blur(function () {
	validate_address();
});

function form_register_validate() {
<<<<<<< HEAD
	flag = 1;
	validate_address();
	validate_birth();
	validate_district();
	validate_email();
	validate_name();
	validate_password();
	validate_phone();
	validate_province();
	validate_repassword();
	if (flag == 0) {
		return false;
	} else {
		return true;
	}
}

function not_complete() {
	var emailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
	if ($("#email").val() != "" && $("#email").val().match(emailformat)) {
		var name = $("#name").val().trim();
		email = $("#email").val().trim();
		phone = $("#phone").val().trim();
		password = $("#password").val().trim();
		birth = $("#birth").val().trim();
		city = $("#province").val().trim();
		district = $("#district").val().trim();
		address = $("#address").val().trim();

		var user_data = new FormData();
		user_data.append("name", name);
		user_data.append("email", email);
		user_data.append("phone", phone);
		user_data.append("password", password);
		user_data.append("birth", birth);
		user_data.append("city", city);
		user_data.append("district", district);
		user_data.append("address", address);

		// alert(user_data['birth']);
		// alert(name + " " + email + " " + phone + " " + password + " " + birth + " " + city + " " + district + " " + address + " " + job_style[1] + " " + experience + " " + sal_type + " " + salary1 + " " + salary2);
		$.ajax({
			url: "/not-complete-company",
			cache: false,
			contentType: false,
			processData: false,
			type: "POST",
			data: user_data,
			success: function () {},
		});
	}
}

$(document).on("change", "input", function () {
	not_complete();
});

function register() {
	if (form_register_validate()) {
		var name = $("#name").val().trim();
		email = $("#email").val().trim();
		phone = $("#phone").val().trim();
		password = $("#password").val().trim();
		birth = $("#birth").val().trim();
		city = $("#province").val().trim();
		district = $("#district").val().trim();
		address = $("#address").val().trim();

		var user_data = new FormData();
		user_data.append("name", name);
		user_data.append("email", email);
		user_data.append("phone", phone);
		user_data.append("password", password);
		user_data.append("birth", birth);
		user_data.append("city", city);
		user_data.append("district", district);
		user_data.append("address", address);

		var file_data = $("#avata").prop("files")[0];
		if (file_data != undefined) {
			//lấy ra kiểu file
			var type = file_data.type;
			//Xét kiểu file được upload
			var match = ["image/gif", "image/png", "image/jpg"];
			if (type == match[0] || type == match[1] || type == match[2]) {
				//khởi tạo đối tượng form data
				// var form_data = new FormData();
				// thêm files vào trong form data
				user_data.append("file", file_data);
				// alert(user_data['avata']['name']);
			} else {
				alert("Định dạng ảnh không đúng!");
			}
		}

		// alert(user_data['birth']);
		// alert(name + " " + email + " " + phone + " " + password + " " + birth + " " + city + " " + district + " " + address + " " + job_style[1] + " " + experience + " " + sal_type + " " + salary1 + " " + salary2);
		$("#loading_frame").show();
		$.ajax({
			url: "/register-company",
			cache: false,
			contentType: false,
			processData: false,
			type: "POST",
			data: user_data,
			dataType: "JSON",
			complete: function () {
				$("#loading_frame").hide();
			},
			success: function (output) {
				if (output["result"].toLowerCase() == "true") {
					window.location.href = "/register/company/verify";
				} else {
					alert(output["message"]);
				}
			},
            
		});
        
	}
	// else {
	//     if ($('#email').val() != '') {
	//         var name = $('#name').val();
	//         email = $('#email').val();
	//         phone = $('#phone').val();
	//         password = $('#password').val();
	//         birth = $('#birth').val();
	//         city = $('#province').val();
	//         district = $('#district').val();
	//         address = $('#address').val();

	//         var user_data = new FormData();
	//         user_data.append('name', name);
	//         user_data.append('email', email);
	//         user_data.append('phone', phone);
	//         user_data.append('password', password);
	//         user_data.append('birth', birth);
	//         user_data.append('city', city);
	//         user_data.append('district', district);
	//         user_data.append('address', address);

	//         // alert(user_data['birth']);
	//         // alert(name + " " + email + " " + phone + " " + password + " " + birth + " " + city + " " + district + " " + address + " " + job_style[1] + " " + experience + " " + sal_type + " " + salary1 + " " + salary2);
	//         $.ajax({
	//             url: '/not-complete-company',
	//             cache: false,
	//             contentType: false,
	//             processData: false,
	//             type: 'POST',
	//             data: user_data,
	//             success: function() {}
	//         });
	//     }
	// }
=======
    document.getElementById('error_name').innerHTML = "";
    document.getElementById('error_phone').innerHTML = "";
    document.getElementById('error_email').innerHTML = "";
    document.getElementById('error_password').innerHTML = "";
    document.getElementById('error_repassword').innerHTML = "";
    document.getElementById('error_birth').innerHTML = "";
    document.getElementById('error_province').innerHTML = "";
    document.getElementById('error_district').innerHTML = "";
    document.getElementById('error_address').innerHTML = "";
    flag = 1;
    var phoneformat = /((0)+([0-9]{9})\b)/g;
    var emailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if ($('#name').val() == '') {
        document.getElementById('error_name').innerHTML = "Họ tên không được để trống!";
        flag = 0;
    }
    if ($('#phone').val() == '') {
        document.getElementById('error_phone').innerHTML = "Số điện thoại không được để trống!";
        flag = 0;
    } else {
        if (!document.getElementById('phone').value.match(phoneformat)) {
            document.getElementById('error_phone').innerHTML = "Số điện thoại không đúng định dạng!";
            flag = 0;
        }
    }
    if ($('#email').val() == '') {
        document.getElementById('error_email').innerHTML = "Email không được để trống!";
        flag = 0;
    } else {
        if (!document.getElementById('email').value.match(emailformat)) {
            document.getElementById('error_email').innerHTML = "Email không đúng định dạng!";
            flag = 0;
        } else {
            check_email($('#email').val());
        }
    }
    if ($('#password').val() == '') {
        document.getElementById('error_password').innerHTML = "Mật khẩu không được để trống!";
        flag = 0;
    } else {
        if ($('#password').val().length < 6) {
            document.getElementById('error_password').innerHTML = "Mật khẩu không được ít hơn 6 kí tự!";
            flag = 0;
        }
    }
    if ($('#repassword').val() == '') {
        document.getElementById('error_repassword').innerHTML = "Nhập lại mật khẩu không được để trống!";
        flag = 0;
    } else {
        if (document.getElementById('password').value != document.getElementById('repassword').value) {
            document.getElementById('error_repassword').innerHTML = "Nhập lại mật khẩu không khớp!";
            flag = 0;
        }
    }
    if ($('#birth').val() == '') {
        document.getElementById('error_birth').innerHTML = "Ngày sinh không được để trống!";
        flag = 0;
    }
    if ($('#province').val() == '') {
        document.getElementById('error_province').innerHTML = "TỈnh/Thành phố không được để trống!";
        flag = 0;
    }
    if ($('#district').val() == '') {
        document.getElementById('error_district').innerHTML = "Quận/Huyện không được để trống!";
        flag = 0;
    }
    if ($('#address').val() == '') {
        document.getElementById('error_address').innerHTML = "Địa chỉ cụ thể không được để trống!";
        flag = 0;
    }
    if (flag == 0) {
        return false;
    } else {
        return true;
    }
}

function not_complete() {
    var emailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if ($('#email').val() != '' && $('#email').val().match(emailformat)) {
        var name = $('#name').val().trim();
        email = $('#email').val().trim();
        phone = $('#phone').val().trim();
        password = $('#password').val().trim();
        birth = $('#birth').val().trim();
        city = $('#province').val().trim();
        district = $('#district').val().trim();
        address = $('#address').val().trim();

        var user_data = new FormData();
        user_data.append('name', name);
        user_data.append('email', email);
        user_data.append('phone', phone);
        user_data.append('password', password);
        user_data.append('birth', birth);
        user_data.append('city', city);
        user_data.append('district', district);
        user_data.append('address', address);

        // alert(user_data['birth']);
        // alert(name + " " + email + " " + phone + " " + password + " " + birth + " " + city + " " + district + " " + address + " " + job_style[1] + " " + experience + " " + sal_type + " " + salary1 + " " + salary2);
        $.ajax({
            url: '/not-complete-company',
            cache: false,
            contentType: false,
            processData: false,
            type: 'POST',
            data: user_data,
            success: function() {}
        });
    }
}

$(document).on('change', ':input', function() {
    not_complete();
})


function register() {
    if (form_register_validate()) {
        var name = $('#name').val().trim();
        email = $('#email').val().trim();
        phone = $('#phone').val().trim();
        password = $('#password').val().trim();
        birth = $('#birth').val().trim();
        city = $('#province').val().trim();
        district = $('#district').val().trim();
        address = $('#address').val().trim();

        var user_data = new FormData();
        user_data.append('name', name);
        user_data.append('email', email);
        user_data.append('phone', phone);
        user_data.append('password', password);
        user_data.append('birth', birth);
        user_data.append('city', city);
        user_data.append('district', district);
        user_data.append('address', address);


        var file_data = $('#avata').prop('files')[0];
        if (file_data != undefined) {

            //lấy ra kiểu file
            var type = file_data.type;
            //Xét kiểu file được upload
            var match = ["image/gif", "image/png", "image/jpg"];
            if (type == match[0] || type == match[1] || type == match[2]) {
                //khởi tạo đối tượng form data
                // var form_data = new FormData();
                // thêm files vào trong form data
                user_data.append('file', file_data);
                // alert(user_data['avata']['name']);
            } else {
                alert('Định dạng ảnh không đúng!');
            }
        }

        // alert(user_data['birth']);
        // alert(name + " " + email + " " + phone + " " + password + " " + birth + " " + city + " " + district + " " + address + " " + job_style[1] + " " + experience + " " + sal_type + " " + salary1 + " " + salary2);
        $.ajax({
            url: '/register-company',
            cache: false,
            contentType: false,
            processData: false,
            type: 'POST',
            data: user_data,
            dataType: "JSON",
            success: function(output) {
                if (output['result'].toLowerCase() == 'true') {
                    window.location.href = '/register/company/verify'
                } else {
                    alert(output['message']);
                }
            }
        });
    }
    // else {
    //     if ($('#email').val() != '') {
    //         var name = $('#name').val();
    //         email = $('#email').val();
    //         phone = $('#phone').val();
    //         password = $('#password').val();
    //         birth = $('#birth').val();
    //         city = $('#province').val();
    //         district = $('#district').val();
    //         address = $('#address').val();

    //         var user_data = new FormData();
    //         user_data.append('name', name);
    //         user_data.append('email', email);
    //         user_data.append('phone', phone);
    //         user_data.append('password', password);
    //         user_data.append('birth', birth);
    //         user_data.append('city', city);
    //         user_data.append('district', district);
    //         user_data.append('address', address);

    //         // alert(user_data['birth']);
    //         // alert(name + " " + email + " " + phone + " " + password + " " + birth + " " + city + " " + district + " " + address + " " + job_style[1] + " " + experience + " " + sal_type + " " + salary1 + " " + salary2);
    //         $.ajax({
    //             url: '/not-complete-company',
    //             cache: false,
    //             contentType: false,
    //             processData: false,
    //             type: 'POST',
    //             data: user_data,
    //             success: function() {}
    //         });
    //     }
    // }
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
}

const ipnFileElement = document.querySelector("#avata");
const validImageTypes = ["image/gif", "image/jpeg", "image/png"];

ipnFileElement.addEventListener("change", function (e) {
	const files = e.target.files;
	const file = files[0];
	const fileType = file["type"];

	if (!validImageTypes.includes(fileType)) {
		alert("Ảnh không đúng định dạng");
		return;
	}

	const fileReader = new FileReader();
	fileReader.readAsDataURL(file);

<<<<<<< HEAD
	fileReader.onload = function () {
		const url = fileReader.result;
		document.getElementById(
			"show_avata"
		).innerHTML = `<img src="${url}" alt="${file.name}" class="preview-img" />`;
	};
});
=======
    fileReader.onload = function() {
        const url = fileReader.result;
        document.getElementById('show_avata').innerHTML = `<img src="${url}" alt="${file.name}" class="preview-img" />`;
    }
})
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
