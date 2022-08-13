function change_employee_turn(id, turn) {
    $.ajax({
        url: '/Handles/Admin/EmployeeController/change_employee_turn',
        type: 'POST',
        data: {
            id: id,
            turn: turn
        },
        dataType: "JSON",
        success: function(output) {
            if (!output['result']) {
                alert('Đã có lỗi xảy ra!');
            }
        }
    });
}

$('.up_turn').change(function() {
    id = $(this).attr('data-id');
    if ($(this).is(':checked')) {
        turn = 1;
    } else {
        turn = 0;
    }
    change_employee_turn(id, turn);
});

$('[name="active"]').change(function() {
    id = $(this).attr('data-id');
    active = $(this).val();
    change_employee_active(id, active);
});

function change_employee_active(id, active) {
    $.ajax({
        url: '/Handles/Admin/EmployeeController/change_employee_active',
        type: 'POST',
        data: {
            id: id,
            active: active
        },
        dataType: "JSON",
        success: function(output) {
            if (!output['result']) {
                alert('Đã có lỗi xảy ra!');
            }
        }
    });
}