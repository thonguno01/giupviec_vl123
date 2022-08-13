$(document).ready(function() {
    CKEDITOR.replace('suggest_content');
    CKEDITOR.replace('content');
})

$('#reset').click(function() {
    CKEDITOR.instances['suggest_content'].setData('');
    CKEDITOR.instances['content'].setData('');
    $('[name="suggest_title"').val('');
})

$('#update').click(function() {
    suggest_title = $('[name="suggest_title"').val();
    suggest_content = CKEDITOR.instances['suggest_content'].getData();
    content = CKEDITOR.instances['content'].getData();
    new_id = $('#content').attr('id-new');
    $.ajax({
        url: '/Handles/Admin/PostController/update_post_tag',
        type: 'POST',
        dataType: 'json',
        data: {
            suggest_title: suggest_title,
            suggest_content: suggest_content,
            content: content,
            new_id: new_id
        },
        success: function(output) {
            alert(output['message']);
        }
    });
})