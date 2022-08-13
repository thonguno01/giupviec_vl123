$('.update_point').click(function() {
    company_id = $('#point_add').attr('data-id');
    point_add = $('#point_add').val();
    $.ajax({
        url: '/Handles/Admin/CompanyController/add_point_company',
        type: 'POST',
        data: {
            point_add: point_add,
            company_id: company_id
        },
        dataType: 'JSON',
        success: function(output) {
            if (output) {
                alert("Cộng điểm cho nhà tuyển dụng thành công!");
                window.location.href = "/admin/manage_point_company";
            } else {
                alert('Đã có lỗi xảy ra!');
            }
        }
    })
})