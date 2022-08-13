$('#province').select2({
    placeholder: "Chọn Tỉnh/Thành phố"
});
$('#district').select2({
    placeholder: "Chọn Quận/Huyện"
});


$('#province').change(function() {
    get_district();
})
var flag = 1;


$('#name').blur(function() {
    validate_name();
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


function form_update_validate() {
    flag = 1;
    validate_address();
    validate_birth();
    validate_district();
    validate_name();
    validate_province();
    if (flag == 0) {
        return false;
    } else {
        return true;
    }
}




function update_company() {
    if (form_update_validate()) {
        var name = $('#name').val().trim();
        email = $('#email').val().trim();
        phone = $('#phone').val().trim();
        birth = $('#birth').val().trim();
        city = $('#province').val().trim();
        district = $('#district').val().trim();
        address = $('#address').val().trim();

        var user_data = new FormData();
        user_data.append('name', name);
        user_data.append('email', email);
        user_data.append('phone', phone);
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
            url: '/Handles/Admin/CompanyController/edit',
            cache: false,
            contentType: false,
            processData: false,
            type: 'POST',
            data: user_data,
            dataType: "JSON",
            success: function(output) {
                alert(output['message']);
                if (output['result'] == true) {
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