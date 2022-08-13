$('#province').select2({
    placeholder: "Chọn Tỉnh/Thành phố",
    minimumResultsForSearch: -1
});
$('#district').select2({
    placeholder: "Chọn Quận/Huyện",
    minimumResultsForSearch: Infinity
});


$('#province').change(function() {
    get_district();
})

function check_email(email) {
    $.ajax({
        url: '/check-email-company',
        type: 'POST',
        data: { email: email },
        dataType: "JSON",
        success: function(output) {
            if (output) {
                document.getElementById('error_email').innerHTML = "Email đã được đăng ký!";
            }
        }
    });
}

$('#email').focusout(function() {
    document.getElementById('error_email').innerHTML = "";
    email = $('#email').val();
    check_email(email);
})



var flag = 1;

$('#email').blur(function() {
    validate_email();
})

$('#name').blur(function() {
    validate_name();
})


$('#phone').blur(function() {
    validate_phone();
})

$('#password').blur(function() {
    validate_password();
})

$('#repassword').blur(function() {
    validate_repassword();
})

$('#birth').blur(function() {
    validate_birth();
})

$('#province').on("select2:close", function() {
    validate_province();
});

$('#district').on("select2:close", function() {
    validate_district();
});

$('#address').blur(function() {
    validate_address();
})


function form_register_validate() {
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
            url: '/Handles/Admin/CompanyController/add',
            cache: false,
            contentType: false,
            processData: false,
            type: 'POST',
            data: user_data,
            dataType: "JSON",
            success: function(output) {
                alert(output['message']);
                if (output['result'].toLowerCase() == 'true') {
                    window.location.href = '/admin/list_company';
                }
            }
        });
    }
}

const ipnFileElement = document.querySelector('#avata');
const validImageTypes = ['image/gif', 'image/jpeg', 'image/png'];

ipnFileElement.addEventListener('change', function(e) {
    const files = e.target.files
    const file = files[0]
    const fileType = file['type']

    if (!validImageTypes.includes(fileType)) {
        alert('Ảnh không đúng định dạng')
        return
    }

    const fileReader = new FileReader()
    fileReader.readAsDataURL(file)

    fileReader.onload = function() {
        const url = fileReader.result;
        document.getElementById('show_avata').innerHTML = `<img src="${url}" alt="${file.name}" class="preview-img" />`;
    }
})