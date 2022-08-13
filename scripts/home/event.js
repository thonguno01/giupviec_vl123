//show popup tag man mobile
$("#open_popup_tag").click(function() {
    $('.bg_popup_tag').show();
    $("#open_popup_tag").hide();
})

$("#close_popup_tag").click(function() {
    $('.bg_popup_tag').hide();
    $("#open_popup_tag").show();
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
        seen_notify();
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
$('#v_footer_all_top').click(function() {
    window.scrollTo({ top: 0, behavior: 'smooth' });
})

$('#select_province').change(function() {
    display_location = $('#select_province option:selected').text()
    $('#display_location').val(display_location);
    $('#district_id').val('0');
    if ($('#select_province').val() != 0) {
        $.ajax({
            url: '/get-list-district',
            type: 'GET',
            data: {
                cit_id: $('#select_province').val()
            },
            dataType: "JSON",
            success: function(result) {
                col1 = '';
                col2 = '';
                col3 = '';
                row_per_col = Math.floor(result.length / 3);
                for (i = 0; i < row_per_col; i++) {
                    col1 += `<button type="button" value="${result[i]['cit_id']}" class="district">${result[i]['cit_name']}</button>`
                }
                for (i = row_per_col; i < row_per_col * 2; i++) {
                    col2 += `<button type="button" value="${result[i]['cit_id']}" class="district">${result[i]['cit_name']}</button>`
                }
                for (i = row_per_col * 2; i < result.length; i++) {
                    col3 += `<button type="button" value="${result[i]['cit_id']}" class="district">${result[i]['cit_name']}</button>`
                }
                $('.box_hot .title').html('Quận/Huyện')
                $('#location_col_1').html(col1);
                $('#location_col_2').html(col2);
                $('#location_col_3').html(col3);
            }
        });
    }
})

$(document).on('click', '.location .district', function() {
    display_location = $(this).text();
    district_id = $(this).val();
    $('#display_location').val(display_location);
    $('#district_id').val(district_id);
    $('.location .district').removeClass('active');
    $(this).addClass('active');
})

$(document).on('click', '#search_block_district .box_list .row', function() {
    display_location = $(this).text();
    district_id = $(this).attr('data-district-id');
    $('#display_location').val(display_location);
    $('#district_id').val(district_id);
    $('.search_location_popup_mb .block_district').hide();
})

$(document).on('click','#search_block_province .box_list .row',function(){
    display_location = $(this).text();
    city_id = $(this).attr('data-city-id');
    console.log(city_id);
    $('#display_location').val(display_location);
    $('#select_province').val(city_id);
    list_district=get_list_district($(this).attr('data-city-id'));
    html = '<button class="row" data-district-id="0">Tất cả quận huyện</button>';
    list_district.forEach(function(district) {
        html += `<button class="row" data-district-id="${district['cit_id']}">${district['cit_name']}</button>`
    })
    $('#search_block_district .box_list').html(html);
    $('.search_location_popup_mb .block_province').hide();
    $('.search_location_popup_mb .block_district').show();
})

$('#action_search').click(function() {
    district_id = $('#district_id').val();
    // tag_id = $('#tag_id').val();
    city_id = $('#select_province').val();
    search_key = $('#search_key').val();
    $.ajax({
        url: '/Handles/Home/HomeController/get_tag',
        type: 'GET',
        data: {
            tag_name: search_key
        },
        dataType: "JSON",
        success: function(tag) {
            // alert(tag['alias']);
            if (tag) {
                window.location.href = '/tim-' + tag['alias'] + '-t' + tag['id'] + 'c' + city_id + 'd' + district_id + '.html';
            } else {
                if (district_id > 0 || city_id > 0) {
                    if (search_key != '') {
                        window.location.href = '/tim-giup-viec-tai-' + slug($('#display_location').val()) + '-gvt0' + 'c' + city_id + 'd' + district_id + '.html?search_key=' + search_key;
                    } else {
                        window.location.href = '/tim-giup-viec-tai-' + slug($('#display_location').val()) + '-gvt0' + 'c' + city_id + 'd' + district_id + '.html';
                    }
                } else {
                    if (search_key != '') {
                        window.location.href = '/tim-giup-viec-gvt0c0d0.html?search_key=' + search_key;
                    } else {
                        alert('Bạn chưa nhập/chọn thông tin tìm kiếm');
                    }

                }
            }
        }
    });
})
var list_tag = '';

function get_list_tag() {
    // let list_tag = '';
    $.ajax({
        url: '/Handles/Home/HomeController/get_list_tag',
        type: 'GET',
        data: {},
        dataType: "JSON",
        async: !1,
        success: function(tag) {
            list_tag = tag;
        }
    });
    return list_tag;
}


function autocomplete_search(inp, arr) {
    /*the autocomplete function takes two arguments,
    the text field element and an array of possible autocompleted values:*/
    var currentFocus;
    /*execute a function when someone writes in the text field:*/
    inp.addEventListener("input", function(e) {
        if (list_tag.length == 0) {
            get_list_tag();
            arr = list_tag;
        }
        var a, b, i, val = this.value;
        /*close any already open lists of autocompleted values*/
        closeAllLists();
        if (!val) { return false; }
        currentFocus = -1;
        /*create a DIV element that will contain the items (values):*/
        a = document.createElement("DIV");
        a.setAttribute("id", this.id + "result-list");
        a.setAttribute("class", "search_autocomplete");
        /*append the DIV element as a child of the autocomplete container:*/
        this.parentNode.parentNode.parentNode.parentNode.appendChild(a);
        /*for each item in the array...*/
        for (i = 0; i < arr.length; i++) {
            /*check if the item starts with the same letters as the text field value:*/
            if (arr[i]['content'].toUpperCase().includes(val.toUpperCase())) {
                /*create a DIV element for each matching element:*/
                b = document.createElement("DIV");
                b.setAttribute("class", "item");
                /*make the matching letters bold:*/
                b.innerHTML = arr[i]['content'].substr(0, val.length);
                b.innerHTML += arr[i]['content'].substr(val.length);
                /*insert a input field that will hold the current array item's value:*/
                b.innerHTML += "<input type='hidden' value='" + arr[i]['content'] + "'>";
                b.innerHTML += "<input type='hidden' value='" + arr[i]['id'] + "'>";
                /*execute a function when someone clicks on the item value (DIV element):*/
                b.addEventListener("click", function(e) {
                    /*insert the value for the autocomplete text field:*/
                    inp.value = this.getElementsByTagName("input")[0].value;
                    document.getElementById('tag_id').value = this.getElementsByTagName("input")[1].value;
                    /*close the list of autocompleted values,
                    (or any other open lists of autocompleted values:*/
                    closeAllLists();
                });
                a.appendChild(b);
            }
        }
    });
    /*execute a function presses a key on the keyboard:*/
    inp.addEventListener("keydown", function(e) {
        var x = document.getElementById(this.id + "result-list");
        if (x) x = x.getElementsByClassName("item");
        if (e.keyCode == 40) {
            /*If the arrow DOWN key is pressed,
            increase the currentFocus variable:*/
            currentFocus++;
            /*and and make the current item more visible:*/
            addActive(x);

        } else if (e.keyCode == 38) { //up
            /*If the arrow UP key is pressed,
            decrease the currentFocus variable:*/
            currentFocus--;
            /*and and make the current item more visible:*/
            addActive(x);
        } else if (e.keyCode == 13) {
            /*If the ENTER key is pressed, prevent the form from being submitted,*/
            e.preventDefault();
            if (currentFocus > -1) {
                /*and simulate a click on the "active" item:*/
                if (x) x[currentFocus].click();
            }
        }
    });

    function addActive(x) {
        /*a function to classify an item as "active":*/
        if (!x) return false;
        /*start by removing the "active" class on all items:*/
        removeActive(x);
        if (currentFocus >= x.length) currentFocus = 0;
        if (currentFocus < 0) currentFocus = (x.length - 1);
        /*add class "autocomplete-active":*/
        x[currentFocus].classList.add("autocomplete-active");
    }

    function removeActive(x) {
        /*a function to remove the "active" class from all autocomplete items:*/
        for (var i = 0; i < x.length; i++) {
            x[i].classList.remove("autocomplete-active");
        }
    }

    function closeAllLists(elmnt) {
        /*close all autocomplete lists in the document,
        except the one passed as an argument:*/
        var x = document.getElementsByClassName("search_autocomplete");
        for (var i = 0; i < x.length; i++) {
            if (elmnt != x[i] && elmnt != inp) {
                x[i].parentNode.removeChild(x[i]);
            }
        }
    }
    /*execute a function when someone clicks in the document:*/
    document.addEventListener("click", function(e) {
        closeAllLists(e.target);
    });
}
autocomplete_search(document.getElementById("search_key"), list_tag);


$('#close_popup_login').click(function() {
    $('.bg_popup_login').hide();
})


function get_hot_location() {
    $.ajax({
        url: '/Handles/Home/HomeController/get_list_hot_location',
        type: 'GET',
        data: {},
        dataType: "JSON",
        async: !1,
        success: function(output) {
            HN_html = '<p class="province">Hà Nội</p>';
            HCM_html = '<p class="province">Hồ Chí Minh</p>';
            DN_html = '<p class="province">Đà Nẵng</p>';
            output['list_hot_HN'].forEach(hot_location => {
                HN_html += `<button type="button" value="${hot_location['cit_id']}" class="district">${hot_location['cit_name']}</button>`
            });
            output['list_hot_HCM'].forEach(hot_location => {
                HCM_html += `<button type="button" value="${hot_location['cit_id']}" class="district">${hot_location['cit_name']}</button>`
            });
            output['list_hot_DN'].forEach(hot_location => {
                DN_html += `<button type="button"  value="${hot_location['cit_id']}" class="district">${hot_location['cit_name']}</button>`
            });
            $('#location_col_1').html(HN_html);
            $('#location_col_2').html(HCM_html);
            $('#location_col_3').html(DN_html);
        }
    });
}

function get_notify() {
    $.ajax({
        url: '/Handles/Home/HomeController/get_notify',
        type: 'GET',
        data: {},
        dataType: "JSON",
        async: !1,
        success: function(output) {
            let timenow = Date.parse(new Date()) / 1000;
            if (output['not_seen'] != 0) {
                html_noti_num = `<div class="notify_num"><span>${output['not_seen']}</span></div>`;
                $('#notify').append(html_noti_num);
            }
            output['noti'].forEach(noti_item => {
                html_noti_item = `<div class="noti_item" id="noti_item_${noti_item['id']}">
										<div class="avt">
											<img src="`;
                if (noti_item['image']) {
                    if (noti_item['owner_type'] == 0) {
                        html_noti_item += rewirte_company_img_href(noti_item['company_id'], noti_item['image']);
                    } else {
                        html_noti_item += rewirte_user_img_href(noti_item['user_id'], noti_item['image']);;
                    }
                } else {
                    html_noti_item += '/images/box_employee.png';
                }
                html_noti_item += `" alt="anh dai dien">
										</div>
										<div class="noti_content">
											<div class="noti"><span class="name">${noti_item['name']}</span><span>`;
                if (noti_item['owner_type'] == 1 && noti_item['noti_type'] == 0) {
                    html_noti_item += ` đã gửi yêu cầu ứng tuyển "<a href="${rewrite_new_detail_link(noti_item['new_alias'],noti_item['new_id'])}">${noti_item['new_title']}</a>".`;
                }
                if (noti_item['owner_type'] == 0) {
                    if (noti_item['noti_type'] == 1) {
                        html_noti_item += ` đã đánh giá bạn.`;
                    }
                    if (noti_item['noti_type'] == 2) {
                        html_noti_item += ` đã chấp nhận yêu cầu ứng tuyển "<a href="${rewrite_new_detail_link(noti_item['new_alias'],noti_item['new_id'])}">${noti_item['new_title']}</a>" .`;
                    }
                    if (noti_item['noti_type'] == 3) {
                        html_noti_item += ` đã từ chối yêu cầu ứng tuyển "<a href="${rewrite_new_detail_link(noti_item['new_alias'],noti_item['new_id'])}">${noti_item['new_title']}</a>" .`;
                    }
                }
                html_noti_item += `</span></div>
											<div class="time"><span>`;
                time_noti = Number(Number(timenow) - Number(noti_item['create_at']));
                // alert(date_noti.getDay());
                day = Math.floor(Number(time_noti / 86400));
                hours = Math.floor(Number(time_noti / 3600));
                minutes = Math.floor(Number(time_noti / 60));
                week = Math.floor(Number(time_noti / 604800));
                // alert(hours);
                if (week > 0) {
                    html_noti_item += week + " tuần trước"
                } else if (day > 0) {
                    html_noti_item += day + " ngày trước"
                } else if (hours > 0) {
                    html_noti_item += hours + " giờ trước"
                } else if (minutes > 0) {
                    html_noti_item += minutes + " phút trước"
                }
                html_noti_item += `</span></div>
										</div>
										<div class="btn_delete">
											<button onclick="delete_notify(${noti_item['id']})"><img
														src="/images/noti_delete_icon.svg"
														alt="xoa thong bao"></button>
										</div>
									</div>`;
                $('#noti_list').append(html_noti_item);
            });
            //     html_noti_item = `<div class="noti_item">
            // 	<div class="avt">
            // 		<img src="/images/box_employee.png" alt="anh dai dien">
            // 	</div>
            // 	<div class="noti_content">
            // 		<div class="noti"><span class="name">Nguyễn
            // 					Xuân Hòa</span><span> đã đánh
            // 					giá công việc của bạn.</span></div>
            // 		<div class="time"><span>3 giờ trước</span></div>
            // 	</div>
            // 	<div class="btn_delete">
            // 		<button onclick="delete_noti()"><img
            // 					src="/images/noti_delete_icon.svg"
            // 					alt="xoa thong bao"></button>
            // 	</div>
            // </div>`;
        }
    });
}

$(document).ready(function() {
    if (!$('.header .user').is(':hidden')) {
        get_notify();
    }
})

//điều hướng phân trang
$('#current_page').change(function() {
    max = $('#current_page').attr('max');
    if (parseInt($("#current_page").val()) > parseInt(max)) {
        $("#current_page").val(max);
    } else if (parseInt($("#current_page").val()) <= 0) {
        page = 1;
        $("#current_page").val(page);
    }
    link = getURL() + "?page=" + $("#current_page").val();
    window.location.href = link;
})

$('#minus_page').click(function() {
    page = $("#current_page").val();
    if (parseInt(page) <= 1) {
        page = 1;
        $("#current_page").val(page);
    } else {
        page--;
        $("#current_page").val(page).change();
    }
});

$('#add_page').click(function() {
    page = $("#current_page").val();
    max = $('#current_page').attr('max');
    if (parseInt(page) >= parseInt(max)) {
        page = max;
        $("#current_page").val(page);
    } else {
        page++;
        $("#current_page").val(page).change();
    }
});
//hết phân trang

// keyup nhập lương
$("#sal").on("keydown", function(e) {
    var keycode = (event.which) ? event.which : event.keyCode;
    if (e.shiftKey == true || e.ctrlKey == true) return false;
    if ([8, 110, 39, 37, 46].indexOf(keycode) >= 0 || // allow tab, dot, left and right arrows, delete keys
        // (keycode == 190 && this.value.indexOf('.') === -1) || // allow dot if not exists in the value
        // (keycode == 110 && this.value.indexOf('.') === -1) || // allow dot if not exists in the value
        (keycode >= 48 && keycode <= 57) || // allow numbers
        (keycode >= 96 && keycode <= 105)) { // allow numpad numbers
        // check for the decimals after dot and prevent any digits
        var parts = this.value.split('.');
        if (parts.length > 1 && // has decimals
            parts[1].length >= 2 && // should limit this
            (
                (keycode >= 48 && keycode <= 57) || (keycode >= 96 && keycode <= 105)
            ) // requested key is a digit
        ) {
            return false;
        } else {
            if (keycode == 110) {
                this.value += ".";
                return false;
            }
            return true;
        }
    } else {
        return false;
    }
}).on("keyup", function() {
    var parts = this.value.split('.');
    parts[0] = parts[0].replace(/,/g, '').replace(/^0+/g, '');
    if (parts[0] == "") parts[0] = "0";
    var calculated = parts[0].replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
    if (parts.length >= 2) calculated += "." + parts[1].substring(0, 2);
    this.value = (calculated);
    if (this.value == "NaN" || this.value == "") this.value = 0;
});

$("#sal_from").on("keydown", function(e) {
    var keycode = (event.which) ? event.which : event.keyCode;
    if (e.shiftKey == true || e.ctrlKey == true) return false;
    if ([8, 110, 39, 37, 46].indexOf(keycode) >= 0 || // allow tab, dot, left and right arrows, delete keys
        // (keycode == 190 && this.value.indexOf('.') === -1) || // allow dot if not exists in the value
        // (keycode == 110 && this.value.indexOf('.') === -1) || // allow dot if not exists in the value
        (keycode >= 48 && keycode <= 57) || // allow numbers
        (keycode >= 96 && keycode <= 105)) { // allow numpad numbers
        // check for the decimals after dot and prevent any digits
        var parts = this.value.split('.');
        if (parts.length > 1 && // has decimals
            parts[1].length >= 2 && // should limit this
            (
                (keycode >= 48 && keycode <= 57) || (keycode >= 96 && keycode <= 105)
            ) // requested key is a digit
        ) {
            return false;
        } else {
            if (keycode == 110) {
                this.value += ".";
                return false;
            }
            return true;
        }
    } else {
        return false;
    }
}).on("keyup", function() {
    var parts = this.value.split('.');
    parts[0] = parts[0].replace(/,/g, '').replace(/^0+/g, '');
    if (parts[0] == "") parts[0] = "0";
    var calculated = parts[0].replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
    if (parts.length >= 2) calculated += "." + parts[1].substring(0, 2);
    this.value = (calculated);
    if (this.value == "NaN" || this.value == "") this.value = 0;
});
$("#sal_to").on("keydown", function(e) {
    var keycode = (event.which) ? event.which : event.keyCode;
    if (e.shiftKey == true || e.ctrlKey == true) return false;
    if ([8, 110, 39, 37, 46].indexOf(keycode) >= 0 || // allow tab, dot, left and right arrows, delete keys
        // (keycode == 190 && this.value.indexOf('.') === -1) || // allow dot if not exists in the value
        // (keycode == 110 && this.value.indexOf('.') === -1) || // allow dot if not exists in the value
        (keycode >= 48 && keycode <= 57) || // allow numbers
        (keycode >= 96 && keycode <= 105)) { // allow numpad numbers
        // check for the decimals after dot and prevent any digits
        var parts = this.value.split('.');
        if (parts.length > 1 && // has decimals
            parts[1].length >= 2 && // should limit this
            (
                (keycode >= 48 && keycode <= 57) || (keycode >= 96 && keycode <= 105)
            ) // requested key is a digit
        ) {
            return false;
        } else {
            if (keycode == 110) {
                this.value += ".";
                return false;
            }
            return true;
        }
    } else {
        return false;
    }
}).on("keyup", function() {
    var parts = this.value.split('.');
    parts[0] = parts[0].replace(/,/g, '').replace(/^0+/g, '');
    if (parts[0] == "") parts[0] = "0";
    var calculated = parts[0].replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
    if (parts.length >= 2) calculated += "." + parts[1].substring(0, 2);
    this.value = (calculated);
    if (this.value == "NaN" || this.value == "") this.value = 0;
});