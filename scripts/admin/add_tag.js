$('#formAddTag').validate({
    onkeyup: false,
    onclick: false,
    rules: {
        "content": {
            required: true
        },
        "description": {
            required: true
        }
    },
    messages: {
        "content": {
            required: "Vui lòng nhập nội dung."
        },
        "description": {
            required: "Vui lòng nhập nội dung."
        }
    },
    submitHandler: function(form) {
        var formData = new FormData();
        file = $('[name="image"]').prop('files')[0];
        formData.append('image', file);
        formData.append('content', form.content.value);
        formData.append('description', form.description.value);
        $.ajax({
            url: '/Handles/Admin/TagController/add',
            cache: false,
            contentType: false,
            processData: false,
            type: 'POST',
            dataType: 'json',
            data: formData,
            success: function(output) {
                alert(output['message']);
                if (output['result'] == true) {
                    window.location.href = "/admin/list_tag";
                }
            }
        });
    }
})

const ipnFileElement = document.querySelector('#image');
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
        document.getElementById('show_img').innerHTML = `<img src="${url}" id="ghost" alt="${file.name}" class="avt" style= 'max-width:118px; max-height:133px'></img>`;
    }
})