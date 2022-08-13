$('.new_status').change(function() {
    id = $(this).attr('data-id');
    new_status = $(this).val();
    $.ajax({
        url: '/Handles/Admin/NewsController/change_new_status',
        type: 'POST',
        data: {
            id: id,
            new_status: new_status
        },
        dataType: "JSON",
        success: function(output) {
            if (!output['result']) {
                alert('Đã có lỗi xảy ra!');
            }
        }
    });
})

$('.new_index').click(function() {
    id = $(this).attr('data-id');
    if ($(this).is(':checked')) {
        new_index = 1;
    } else {
        new_index = 0;
    }
    $.ajax({
        url: '/Handles/Admin/NewsController/change_new_index',
        type: 'POST',
        data: {
            id: id,
            new_index: new_index
        },
        dataType: "JSON",
        success: function(output) {
            if (!output['result']) {
                alert('Đã có lỗi xảy ra!');
            }
        }
    });
})