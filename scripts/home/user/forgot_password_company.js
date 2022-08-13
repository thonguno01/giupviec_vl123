function form_validate() {
    document.getElementById('error_email').innerHTML = "";
    var emailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    flag = 1
    if ($('#email').val() == '') {
        document.getElementById('error_email').innerHTML = "Email không được để trống!";
        flag = 0;
    } else {
        if ($('#email').val().trim() == '') {
            document.getElementById('error_email').innerHTML = "Email không đúng định dạng!";
            flag = 0;
        } else {
            if (!document.getElementById('email').value.match(emailformat)) {
                document.getElementById('error_email').innerHTML = "Email không đúng định dạng!";
                flag = 0;
            }
        }
    }
    if (flag == 0) {
        return false;
    } else {
        let email = document.getElementById('email').value;
<<<<<<< HEAD
        $('#loading_frame').show();
=======
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
        $.ajax({
            url: "handle-forgot-password-company",
            type: 'POST',
            data: {
                email: email,
            },
            dataType: 'json',
<<<<<<< HEAD
            complete: function() {
                $('#loading_frame').hide();
            },
            success: function(output) {
                if (output['result'].toLowerCase() == 'true') {
                    window.location.href = 'company-forgot-password-send';
                } else {
                    document.getElementById('error_email').innerHTML = "Email không tồn tại!";
=======
            success: function(output) {
                if (output['result']) {
                    window.location.href = 'company-forgot-password-send';
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
                }
            }
        });
    }
}

$('#resend_email').click(function() {
<<<<<<< HEAD
    $('#loading_frame').show();
=======
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
    $.ajax({
        url: '/resend-forgot-email-company',
        type: 'POST',
        dataType: "JSON",
<<<<<<< HEAD
        complete: function() {
            $('#loading_frame').hide();
        },
=======
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
        success: function(output) {
            alert(output['message']);
            // if (output['result'].toLowerCase() == 'false') {

            // } else {
            //     alert(output['message']);
            // }
        }
    });
    $('#resend_email').attr('disabled', true);
    $('#resend_email').html(`<span>Gửi lại (</span>
							<span class="time">60</span>
							<span>s)</span>`);
    timeout(60);
})

timeout(60);

function timeout(s) {
    $('#resend_email .time').html(s);
    if (s === 0) {
        clearTimeout(timeout);
        $('#resend_email').attr('disabled', false);
        $('#resend_email').html('<span>Gửi lại</span>')
        return false;
    }
    setTimeout(function() {
        s--;
        timeout(s);
    }, 1000);
<<<<<<< HEAD
}
=======
}
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
