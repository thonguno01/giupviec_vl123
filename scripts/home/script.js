function open_search() {
    $('.search_box').show();
    $('#select_province').select2({
        // placeholder: "Tất cả tỉnh thành"
        dropdownParent: $('.search_box')
    });

    $('#select_province').hide();
}

$('#close_search').click(function() {
    $('.search_box').hide();
})

function opend_location() {
    if (screen.width < 768) {
        if ($('.search_location_popup_mb .block_province').is(':hidden')) {
            $('.search_location_popup_mb .block_province').show();
        } else {
            $('.search_location_popup_mb .block_province').hide();
        }
    } else {
        if ($('.search_location_popup').is(':hidden')) {
            $('.search_location_popup').prop("style", "display:flex");
        } else {
            $('.search_location_popup').hide();
        }
    }
}

//show popup tag man mobile
$("#open_popup_tag").click(function() {
    $('.bg_popup_tag').show();
})

$("#close_popup_tag").click(function() {
    $('.bg_popup_tag').hide();
})

//show popup menu man mobile
$("#show_popup_menu").click(function() {
    if ($('.popup_menu_mb').is(":hidden")) {
        $('.popup_menu_mb').show();
    } else {
        $('.popup_menu_mb').hide();
    }
})

//show popup thong bao
$("#notify").click(function() {
    if ($(".popup_notify").is(":hidden")) {
        $(".popup_notify").show();
    } else {
        $(".popup_notify").hide();
    }
})

//show popup user
$("#user").click(function() {
    if ($(".box_popup_user").is(":hidden")) {
        $(".box_popup_user").show();
    } else {
        $(".box_popup_user").hide();
    }
})

$(".day_box button").click(function() {
    day = $(this).html();
    $(".day_box button").each(function() {
        $(this).removeClass("active");
    })
    $(this).addClass("active");
    alert(day);
})

// nut tro ve dau trang
$('#back_to_top').click(function() {
    window.scrollTo({ top: 0, behavior: 'smooth' });
})