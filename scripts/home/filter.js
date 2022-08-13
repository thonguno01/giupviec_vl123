<<<<<<< HEAD
//nut mo filter
$("#open_filter").click(function() {
    $("#filter").show();

});
//nut dong filter
$("#close_filter").click(function() {
    $("#filter").hide();
});

=======
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
// range slider age
var age_range = new rSlider({
    target: '#range_age',
    values: { min: 1, max: 80 },
    step: 1,
    range: true,
    tooltip: true,
    scale: true,
    labels: false,
    set: [25, 60]
});

<<<<<<< HEAD

// an filter cho man mobile
// if (screen.width < 1024) {
//     $("#filter").hide();
//     $("#close_filter").show();
//     $("#open_filter").show();
// } else {
//     $("#filter").show();
//     $("#close_filter").hide();
//     $("#open_filter").hide();
// }

// $(window).resize(function() {
//     if (screen.width < 1024) {
//         $("#filter").hide();
//         $("#close_filter").show();
//         $("#open_filter").show();
//     } else {
//         $("#filter").show();
//         $("#close_filter").hide();
//         $("#open_filter").hide();
//     }
// });

// autocomplete filter
var list_city = ''
var list_district = ''

function get_list_city() {
    $.ajax({
        url: '/Handles/Home/HomeController/get_list_city',
        type: 'GET',
        data: {},
        dataType: "JSON",
        async: !1,
        success: function(result) {
            list_city = result;
        }
    });
    return list_city;
}

function get_list_district() {
    $.ajax({
        url: '/Handles/Home/HomeController/get_list_district',
        type: 'GET',
        data: {
            city_key: $('#inp_filter_province').val()
        },
        dataType: "JSON",
        async: !1,
        success: function(result) {
            list_district = result;
        }
    });
    return list_district;
}




// alert(provinces[0]['cit_id']);
=======
// autocomplete filter

var provinces = ["Hà Nội", "Hải Phòng", "Hồ Chí Minh", "Đà Nẵng"];
var districts = ["Cầu giấy", "Hai Bà Trưng", "Hà Đông", "Bắc Từ Liêm"];
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769

function autocomplete(inp, arr) {
    /*the autocomplete function takes two arguments,
    the text field element and an array of possible autocompleted values:*/
    var currentFocus;
    /*execute a function when someone writes in the text field:*/
    inp.addEventListener("input", function(e) {
        var a, b, i, val = this.value;
        /*close any already open lists of autocompleted values*/
        closeAllLists();
        if (!val) { return false; }
        currentFocus = -1;
        /*create a DIV element that will contain the items (values):*/
        a = document.createElement("DIV");
        a.setAttribute("id", this.id + "result-list");
        a.setAttribute("class", "result");
        /*append the DIV element as a child of the autocomplete container:*/
        this.parentNode.appendChild(a);
        /*for each item in the array...*/
        for (i = 0; i < arr.length; i++) {
            /*check if the item starts with the same letters as the text field value:*/
<<<<<<< HEAD
            // if (arr[i]['cit_name'].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
            if (arr[i]['cit_name'].toUpperCase().includes(val.toUpperCase())) {
=======
            if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
                /*create a DIV element for each matching element:*/
                b = document.createElement("DIV");
                b.setAttribute("class", "item");
                /*make the matching letters bold:*/
<<<<<<< HEAD
                // b.innerHTML = "<strong>" + arr[i]['cit_name'].substr(0, val.length) + "</strong>";
                b.innerHTML += arr[i]['cit_name'];
                /*insert a input field that will hold the current array item's value:*/
                b.innerHTML += "<input type='hidden' value='" + arr[i]['cit_name'] + "'>";
=======
                b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
                b.innerHTML += arr[i].substr(val.length);
                /*insert a input field that will hold the current array item's value:*/
                b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
                /*execute a function when someone clicks on the item value (DIV element):*/
                b.addEventListener("click", function(e) {
                    /*insert the value for the autocomplete text field:*/
                    inp.value = this.getElementsByTagName("input")[0].value;
<<<<<<< HEAD
                    inp.dispatchEvent(new Event('change'));
=======
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
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
<<<<<<< HEAD
        var x = document.getElementById(this.id + "result-list");
=======
        var x = document.getElementById(this.id + "autocomplete-list");
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
        if (x) x = x.getElementsByTagName("div");
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
        var x = document.getElementsByClassName("result");
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
<<<<<<< HEAD

$('#inp_filter_province').change(function() {
    get_list_district();
    autocomplete(document.getElementById("inp_filter_district"), list_district);
});
// het autocomplete filter


=======
autocomplete(document.getElementById("inp_filter_province"), provinces);

autocomplete(document.getElementById("inp_filter_district"), districts);

// het autocomplete filter


//dropdown filter
$("#menu_tag").hide();
$("#menu_province").hide();
$("#menu_district").hide();
$("#menu_age").hide();
$("#menu_exp").hide();
$("#menu_dynamic_sal").hide();
$("#menu_static_sal").hide();
$("#menu_work_schedule").hide();
$("#menu_stay").hide();

$("#selected_tag").hide();
$("#selected_province").hide();
$("#selected_district").hide();
$("#selected_age").hide();
$("#selected_exp").hide();
$("#selected_dynamic_sal").hide();
$("#selected_static_sal").hide();
$("#selected_work_schedule").hide();
$("#selected_stay").hide();

>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
$("#dropdown_tag").click(function() {
    if ($("#menu_tag").is(":hidden")) {
        $("#menu_tag").show();
        $("#selected_tag_content").html("");
        $("#selected_tag").hide();
        $(this).css({ 'background': 'rgba(25, 118, 210, 0.55)' });
        $("#dropdown_tag span").css({ 'color': '#FFFFFF' });
<<<<<<< HEAD
        $(this).find('span:last-child').html('<img src="/images/arrow_top_white.svg" alt="drop down">');
    } else {
        $("#menu_tag").hide();
        $('[name="tag"]').each(function() {
            if ($(this).is(':checked')) {
                tag_content = $(this).prev().html();
                $("#selected_tag_content").html(tag_content);
            }
        })
=======
    } else {
        $("#menu_tag").hide();
        var tag_select = $('[name="tag"]');
        for (i = 0; i < tag_select.length; i++) {
            if (tag_select[i].checked) {
                $("#selected_tag_content").html(tag_select[i].value);
            }
        }
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
        if ($("#selected_tag_content").html()) {
            $("#selected_tag").show();
        }
        $(this).css({ 'background': '#ffffff' });
        $("#dropdown_tag span").css({ 'color': '#333' });
<<<<<<< HEAD
        $(this).find('span:last-child').html('<img src="/images/arrow_down.svg" alt="drop down">');
=======
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
    }
});


$("#dropdown_province").click(function() {
    if ($("#menu_province").is(":hidden")) {
<<<<<<< HEAD
        if (list_city.length == 0) {
            get_list_city();
            autocomplete(document.getElementById("inp_filter_province"), list_city);
        }
=======
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
        $("#menu_province").show();
        $("#selected_province_content").html("");
        $("#selected_province").hide();
        $(this).css({ 'background': 'rgba(25, 118, 210, 0.55)' });
        $("#dropdown_province span").css({ 'color': '#FFFFFF' });
<<<<<<< HEAD
        $(this).find('span:last-child').html('<img src="/images/arrow_top_white.svg" alt="drop down">');
=======
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
    } else {
        $("#menu_province").hide();
        province = $("#inp_filter_province").val();
        if (province) {
            $("#selected_province_content").html(province);
        }
        if ($("#selected_province_content").html()) {
            $("#selected_province").show();
        }
        $(this).css({ 'background': '#ffffff' });
        $("#dropdown_province span").css({ 'color': '#333' });
<<<<<<< HEAD
        $(this).find('span:last-child').html('<img src="/images/arrow_down.svg" alt="drop down">');
=======
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
    }
});

$("#dropdown_district").click(function() {
    if ($("#menu_district").is(":hidden")) {
<<<<<<< HEAD
        if (list_district.length == 0) {
            get_list_district();
            autocomplete(document.getElementById("inp_filter_district"), list_district);
        }
=======
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
        $("#menu_district").show();
        $("#selected_district_content").html("");
        $("#selected_district").hide();
        $(this).css({ 'background': 'rgba(25, 118, 210, 0.55)' });
        $("#dropdown_district span").css({ 'color': '#FFFFFF' });
<<<<<<< HEAD
        $(this).find('span:last-child').html('<img src="/images/arrow_top_white.svg" alt="drop down">');
=======
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
    } else {
        $("#menu_district").hide();
        province = $("#inp_filter_district").val();
        if (province) {
            $("#selected_district_content").html(province);
        }
        if ($("#selected_district_content").html()) {
            $("#selected_district").show();
        }
        $(this).css({ 'background': '#ffffff' });
        $("#dropdown_district span").css({ 'color': '#333' });
<<<<<<< HEAD
        $(this).find('span:last-child').html('<img src="/images/arrow_down.svg" alt="drop down">');
=======
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
    }
});

$("#dropdown_age").click(function() {
    if ($("#menu_age").is(":hidden")) {
        $("#menu_age").show();
<<<<<<< HEAD
        age_range.destroy();
        age_range = new rSlider({
            target: '#range_age',
            values: { min: 1, max: 80 },
            step: 1,
            range: true,
            tooltip: true,
            scale: true,
            labels: false,
            set: [25, 60]
        });
=======
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
        $("#selected_age_content").html("");
        $("#selected_age").hide();
        $(this).css({ 'background': 'rgba(25, 118, 210, 0.55)' });
        $("#dropdown_age span").css({ 'color': '#FFFFFF' });
<<<<<<< HEAD
        $(this).find('span:last-child').html('<img src="/images/arrow_top_white.svg" alt="drop down">');
=======
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
    } else {
        $("#menu_age").hide();
        age = age_range.getValue();
        age = age.split(",");
        $("#selected_age_content").html(age[0] + " - " + age[1]);
        if ($("#selected_age_content").html()) {
            $("#selected_age").show();
        }
        $(this).css({ 'background': '#ffffff' });
        $("#dropdown_age span").css({ 'color': '#333' });
<<<<<<< HEAD
        $(this).find('span:last-child').html('<img src="/images/arrow_down.svg" alt="drop down">');
=======
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
    }
});

$("#dropdown_exp").click(function() {
    if ($("#menu_exp").is(":hidden")) {
        $("#menu_exp").show();
        $("#selected_exp_content").html("");
        $("#selected_exp").hide();
        $(this).css({ 'background': 'rgba(25, 118, 210, 0.55)' });
        $("#dropdown_exp span").css({ 'color': '#FFFFFF' });
<<<<<<< HEAD
        $(this).find('span:last-child').html('<img src="/images/arrow_top_white.svg" alt="drop down">');
    } else {
        $("#menu_exp").hide();
        $('[name="exp"]').each(function() {
            if ($(this).is(':checked')) {
                content = $(this).prev().html();
                $("#selected_exp_content").html(content);
            }
        });
        // var exp_select = $('[name="exp"]');
        // for (i = 0; i < exp_select.length; i++) {
        //     if (exp_select[i].checked) {
        //         $("#selected_exp_content").html(exp_select[i].value);
        //     }
        // }
=======
    } else {
        $("#menu_exp").hide();
        var exp_select = $('[name="exp"]');
        for (i = 0; i < exp_select.length; i++) {
            if (exp_select[i].checked) {
                $("#selected_exp_content").html(exp_select[i].value);
            }
        }
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
        if ($("#selected_exp_content").html()) {
            $("#selected_exp").show();
        }
        $(this).css({ 'background': '#ffffff' });
        $("#dropdown_exp span").css({ 'color': '#333' });
<<<<<<< HEAD
        $(this).find('span:last-child').html('<img src="/images/arrow_down.svg" alt="drop down">');
=======
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
    }
});

$("#dropdown_dynamic_sal").click(function() {
    if ($("#menu_dynamic_sal").is(":hidden")) {
        $("#menu_dynamic_sal").show();
        $("#selected_dynamic_sal_content").html("");
        $("#selected_dynamic_sal").hide();
        $(this).css({ 'background': 'rgba(25, 118, 210, 0.55)' });
        $("#dropdown_dynamic_sal span").css({ 'color': '#FFFFFF' });
<<<<<<< HEAD
        $(this).find('span:last-child').html('<img src="/images/arrow_top_white.svg" alt="drop down">');
    } else {
        $("#menu_dynamic_sal").hide();
        min = $("#min_sal").val();
        max = $("#max_sal").val();
        $('[name="dynamic_sal_unit"]').each(function() {
            if ($(this).is(':checked')) {
                unit = $(this).parent().text();
            }
        })
        if (min && max && Number(min) < Number(max)) {
            $("#selected_dynamic_sal_content").html(Number(min).toLocaleString('us') + "-" + Number(max).toLocaleString('us') + "vnđ/" + unit);
        }
        if ($("#selected_dynamic_sal_content").html()) {
            $("#selected_dynamic_sal").show();
            $("#reset_static_sal").click();
        }
        $(this).css({ 'background': '#ffffff' });
        $("#dropdown_dynamic_sal span").css({ 'color': '#333' });
        $(this).find('span:last-child').html('<img src="/images/arrow_down.svg" alt="drop down">');
=======
    } else {
        $("#menu_dynamic_sal").hide();
        var unit_list = $('[name="dynamic_sal_unit"]');
        min = $("#min_sal").val();
        max = $("#max_sal").val();
        for (i = 0; i < unit_list.length; i++) {
            if (unit_list[i].checked) {
                unit = unit_list[i].value;
            }
        }
        if (min && max && Number(min) < Number(max)) {
            $("#selected_dynamic_sal_content").html(Number(min).toLocaleString('us') + "-" + Number(max).toLocaleString('us') + "/" + unit);
        }
        if ($("#selected_dynamic_sal_content").html()) {
            $("#selected_dynamic_sal").show();
        }
        $(this).css({ 'background': '#ffffff' });
        $("#dropdown_dynamic_sal span").css({ 'color': '#333' });
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
    }
});

$("#dropdown_static_sal").click(function() {
    if ($("#menu_static_sal").is(":hidden")) {
        $("#menu_static_sal").show();
        $("#selected_static_sal_content").html("");
        $("#selected_static_sal").hide();
        $(this).css({ 'background': 'rgba(25, 118, 210, 0.55)' });
        $("#dropdown_static_sal span").css({ 'color': '#FFFFFF' });
<<<<<<< HEAD
        $(this).find('span:last-child').html('<img src="/images/arrow_top_white.svg" alt="drop down">');
    } else {
        $("#menu_static_sal").hide();
        sal = $("#sal_value").val();

        $('[name="static_sal_unit"]').each(function() {
            if ($(this).is(':checked')) {
                unit = $(this).parent().text();
            }
        })
        if (sal) {
            $("#selected_static_sal_content").html(Number(sal).toLocaleString('us') + "vnđ /" + unit);
        }
        if ($("#selected_static_sal_content").html()) {
            $("#selected_static_sal").show();
            $("#reset_dynamic_sal").click();
        }
        $(this).css({ 'background': '#ffffff' });
        $("#dropdown_static_sal span").css({ 'color': '#333' });
        $(this).find('span:last-child').html('<img src="/images/arrow_down.svg" alt="drop down">');
=======
    } else {
        $("#menu_static_sal").hide();
        var unit_list = $('[name="static_sal_unit"]');
        sal = $("#sal_value").val();
        for (i = 0; i < unit_list.length; i++) {
            if (unit_list[i].checked) {
                unit = unit_list[i].value;
            }
        }
        if (sal) {
            $("#selected_static_sal_content").html(Number(sal).toLocaleString('us') + "/" + unit);
        }
        if ($("#selected_static_sal_content").html()) {
            $("#selected_static_sal").show();
        }
        $(this).css({ 'background': '#ffffff' });
        $("#dropdown_static_sal span").css({ 'color': '#333' });
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
    }
});

$("#dropdown_stay").click(function() {
    if ($("#menu_stay").is(":hidden")) {
        $("#menu_stay").show();
        $("#selected_stay_content").html("");
        $("#selected_stay").hide();
        $(this).css({ 'background': 'rgba(25, 118, 210, 0.55)' });
        $("#dropdown_stay span").css({ 'color': '#FFFFFF' });
<<<<<<< HEAD
        $(this).find('span:last-child').html('<img src="/images/arrow_top_white.svg" alt="drop down">');
    } else {
        $("#menu_stay").hide();
        $('[name="stay"]').each(function() {
            if ($(this).is(':checked')) {
                content = $(this).prev().html();
                $("#selected_stay_content").html(content);
            }
        });
        // var stay_select = $('[name="stay"]');
        // for (i = 0; i < stay_select.length; i++) {
        //     if (stay_select[i].checked) {
        //         $("#selected_stay_content").html(stay_select[i].value);
        //     }
        // }
=======
    } else {
        $("#menu_stay").hide();
        var stay_select = $('[name="stay"]');
        for (i = 0; i < stay_select.length; i++) {
            if (stay_select[i].checked) {
                $("#selected_stay_content").html(stay_select[i].value);
            }
        }
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
        if ($("#selected_stay_content").html()) {
            $("#selected_stay").show();
        }
        $(this).css({ 'background': '#ffffff' });
        $("#dropdown_stay span").css({ 'color': '#333' });
<<<<<<< HEAD
        $(this).find('span:last-child').html('<img src="/images/arrow_down.svg" alt="drop down">');
=======
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
    }
});

$("#dropdown_work_schedule").click(function() {
    if ($("#menu_work_schedule").is(":hidden")) {
        $("#menu_work_schedule").show();
        $("#selected_work_schedule_content").html("");
        $("#selected_work_schedule").hide();
        $(this).css({ 'background': 'rgba(25, 118, 210, 0.55)' });
        $("#dropdown_work_schedule span").css({ 'color': '#FFFFFF' });
<<<<<<< HEAD
        $(this).find('span:last-child').html('<img src="/images/arrow_top_white.svg" alt="drop down">');
    } else {
        $("#menu_work_schedule").hide();
        html = "";
        $('[name="work_schedule"]').each(function() {
            if ($(this).is(':checked')) {
                html += '-' + $(this).prev().html();
            }
        });
        html = html.replace("-", "", 1);
=======
    } else {
        $("#menu_work_schedule").hide();
        html = "";
        if ($('[name="t2"]').is(":checked")) {
            html += "- Thứ 2 ";
        }
        if ($('[name="t3"]').is(":checked")) {
            html += "- Thứ 3 ";
        }
        if ($('[name="t4"]').is(":checked")) {
            html += "- Thứ 4 ";
        }
        if ($('[name="t5"]').is(":checked")) {
            html += "- Thứ 5 ";
        }
        if ($('[name="t6"]').is(":checked")) {
            html += "- Thứ 6 ";
        }
        if ($('[name="t7"]').is(":checked")) {
            html += "- Thứ 7 ";
        }
        if ($('[name="cn"]').is(":checked")) {
            html += "- Chủ nhật ";
        }
        html = html.replace("-", "", 1);
        // alert(html);
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
        $("#selected_work_schedule_content").html(html);
        if ($("#selected_work_schedule_content").html()) {
            $("#selected_work_schedule").show();
        }
        $(this).css({ 'background': '#ffffff' });
        $("#dropdown_work_schedule span").css({ 'color': '#333' });
<<<<<<< HEAD
        $(this).find('span:last-child').html('<img src="/images/arrow_down.svg" alt="drop down">');
=======
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
    }
});

//nut xoa filter
$("#reset_tag").click(function() {
    $("#selected_tag_content").html("");
    $("#selected_tag").hide();
    $("input:radio[name='tag']").prop("checked", false);
})

$("#reset_province").click(function() {
    $("#selected_province_content").html("");
    $("#selected_province").hide();
    $("input:text[id='inp_filter_province']").val("");
})


$("#reset_district").click(function() {
    $("#selected_district_content").html("");
    $("#selected_district").hide();
    $("input:text[id='inp_filter_district']").val("");
})

$("#reset_exp").click(function() {
    $("#selected_exp_content").html("");
    $("#selected_exp").hide();
    $("input:radio[name='exp']").prop("checked", false);
})

$("#reset_stay").click(function() {
    $("#selected_stay_content").html("");
    $("#selected_stay").hide();
    $("input:radio[name='stay']").prop("checked", false);
})

$("#reset_age").click(function() {
    $("#selected_age_content").html("");
    $("#selected_age").hide();
    age_range.setValues(25, 60)
})

$("#reset_dynamic_sal").click(function() {
    $("#selected_dynamic_sal_content").html("");
    $("#selected_dynamic_sal").hide();
    $("input:radio[name='dynamic_sal_unit']").prop("checked", true);
    $("#min_sal").val("");
    $("#max_sal").val("");
})

$("#reset_static_sal").click(function() {
    $("#selected_static_sal_content").html("");
    $("#selected_static_sal").hide();
    $("input:radio[name='static_sal_unit']").prop("checked", true);
    $("#sal_value").val("");
})

$("#reset_work_schedule").click(function() {
    $("#selected_work_schedule_content").html("");
    $("#selected_work_schedule").hide();
<<<<<<< HEAD
    $(":checkbox[name='work_schedule']").prop("checked", false);

=======
    $(":checkbox[name='t2']").prop("checked", false);
    $(":checkbox[name='t3']").prop("checked", false);
    $(":checkbox[name='t4']").prop("checked", false);
    $(":checkbox[name='t5']").prop("checked", false);
    $(":checkbox[name='t6']").prop("checked", false);
    $(":checkbox[name='t7']").prop("checked", false);
    $(":checkbox[name='cn']").prop("checked", false);
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
})

$("#reset_all").click(function() {
    $("input:radio").prop("checked", false);
    $("input:checkbox").prop("checked", false);
    $("input:radio[name='dynamic_sal_unit']").prop("checked", true);
    $("input:radio[name='static_sal_unit']").prop("checked", true);
<<<<<<< HEAD
    $("#min_sal").val("");
    $("#max_sal").val("");
    $("#sal_value").val("");
=======
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
    $("input:text[id='inp_filter_province']").val("");
    $("input:text[id='inp_filter_district']").val("");
    age_range.setValues(25, 60)
})

//het nut xoa filter

<<<<<<< HEAD


// het dropdown filter

var filter_save;

function get_filter() {
    if (!$('#menu_tag').is(':hidden')) {
        $('#dropdown_tag').click();
    }
    if (!$('#menu_dynamic_sal').is(':hidden')) {
        $('#dropdown_dynamic_sal').click();
    }
    if (!$('#menu_static_sal').is(':hidden')) {
        $('#dropdown_static_sal').click();
    }
    if (!$('#menu_province').is(':hidden')) {
        $('#dropdown_province').click();
    }
    if (!$('#menu_district').is(':hidden')) {
        $('#dropdown_district').click();
    }
    if (!$('#menu_exp').is(':hidden')) {
        $('#dropdown_exp').click();
    }
    if (!$('#menu_work_schedule').is(':hidden')) {
        $('#dropdown_work_schedule').click();
    }
    if (!$('#menu_stay').is(':hidden')) {
        $('#dropdown_stay').click();
    }
    if (!$('#menu_age').is(':hidden')) {
        $('#dropdown_age').click();
    }
    var job_style_id;
    var exp;
    var salary1, salary2, salary_type, salary_time, work_type_id, city, district, min_age, max_age;
    let work_schedule = [];
    $('[name="tag"]').each(function() {
        if ($(this).is(':checked')) {
            job_style_id = $(this).val();
        }
    })
    $('[name="exp"]').each(function() {
        if ($(this).is(':checked')) {
            exp = $(this).val();
        }
    });
    if (!$('#selected_dynamic_sal').is(':hidden')) {
        salary1 = $('#min_sal').val();
        salary2 = $('#max_sal').val();
        salary_type = 1;
        $('[name="dynamic_sal_unit"]').each(function() {
            if ($(this).is(':checked')) {
                salary_time = $(this).val();
            }
        })
    }
    if (!$('#selected_static_sal').is(':hidden')) {
        salary1 = $('#sal_value').val();
        salary_type = 0;
        $('[name="static_sal_unit"]').each(function() {
            if ($(this).is(':checked')) {
                salary_time = $(this).val();
            }
        })
    }
    if (!$('#selected_age').is(':hidden')) {
        age = age_range.getValue();
        age = age.split(",");
        min_age = age[0];
        max_age = age[1];
    }
    $('[name="work_schedule"]').each(function() {
        if ($(this).is(':checked')) {
            work_schedule.push($(this).val());
        }
    })
    $('[name="stay"]').each(function() {
        if ($(this).is(':checked')) {
            work_type_id = $(this).val();
        }
    });
    city = $('#inp_filter_province').val();
    district = $('#inp_filter_district').val();
    filter = {
        job_style_id: job_style_id,
        city: city,
        district: district,
        min_age: min_age,
        max_age: max_age,
        exp: exp,
        salary_type: salary_type,
        salary1: salary1,
        salary2: salary2,
        salary_time: salary_time,
        work_schedule: work_schedule,
        work_type_id: work_type_id
    }
    filter_save = filter;
    return filter_save;
}


//Bộ lọc người giúp việc
function apply_filter_employee() {
    get_filter();
    $.ajax({
        url: 'Handles/Home/HomeController/apply_filter_employee',
        type: 'POST',
        data: {
            job_style_id: filter_save['job_style_id'],
            city: filter_save['city'],
            district: filter_save['district'],
            min_age: filter_save['min_age'],
            max_age: filter_save['max_age'],
            exp: filter_save['exp'],
            salary_type: filter_save['salary_type'],
            salary1: filter_save['salary1'],
            salary2: filter_save['salary2'],
            salary_time: filter_save['salary_time'],
            work_schedule: filter_save['work_schedule'],
            work_type_id: filter_save['work_type_id']
        },
        dataType: "JSON",
        success: function(result) {
            // alert(result);
            $('.job_list').html('');
            result['employee_dom'].forEach(employee => {
                $('.job_list').append(employee);
            });
            pagination_box = `<div class="pagination">
				<ul>
					<li><button id="minus_page_filter"><img src="/images/pagination_prev.svg" alt="nut lui trang"></button></li>
					<li><input type="number" id="current_page_filter" class="active" max="${result['total_page']}" value="${result['page']}"></li>
					<li><button id="add_page_filter"><img src="/images/pagination_next.svg" alt="nut tien"></button></li>
				</ul>
		 	</div>
			 <span class="total_page"> of ${result['total_page']}</span>`;
            $('.pagination_box').html(pagination_box);
            $('#page_title').html('Danh sách người giúp việc đã lọc');
            if (screen.width < 1024) {
                $("#filter").hide();
            }
        }
    });
}

function filter_pagination_employee(page) {
    $.ajax({
        url: 'Handles/Home/HomeController/apply_filter_employee',
        type: 'POST',
        data: {
            job_style_id: filter_save['job_style_id'],
            city: filter_save['city'],
            district: filter_save['district'],
            min_age: filter_save['min_age'],
            max_age: filter_save['max_age'],
            exp: filter_save['exp'],
            salary_type: filter_save['salary_type'],
            salary1: filter_save['salary1'],
            salary2: filter_save['salary2'],
            salary_time: filter_save['salary_time'],
            work_schedule: filter_save['work_schedule'],
            work_type_id: filter_save['work_type_id'],
            page: page
        },
        dataType: "JSON",
        success: function(result) {
            // alert(result);
            $('.job_list').html('');
            result['employee_dom'].forEach(employee => {
                $('.job_list').append(employee);
            });
            pagination_box = `<div class="pagination">
			<ul>
				<li><button id="minus_page_filter"><img src="/images/pagination_prev.svg" alt="nut lui trang"></button></li>
				<li><input type="number" id="current_page_filter" class="active" max="${result['total_page']}" value="${result['page']}"></li>
				<li><button id="add_page_filter"><img src="/images/pagination_next.svg" alt="nut tien"></button></li>
			</ul>
		 	</div>
			 <span class="total_page"> of ${result['total_page']}</span>`;
            $('.pagination_box').html(pagination_box);
        }
    });
}

//điều hướng phân trang bộ lọc người giúp việc
$(document).on('change', '#current_page_filter', function() {
    max = $('#current_page_filter').attr('max');
    if (parseInt($("#current_page_filter").val()) > parseInt(max)) {
        $("#current_page_filter").val(max);
    } else if (parseInt($("#current_page_filter").val()) <= 0) {
        page = 1;
        $("#current_page_filter").val(page);
    }
    filter_pagination_employee($("#current_page_filter").val());
})

$(document).on('click', '#minus_page_filter', function() {
    page = $("#current_page_filter").val();
    if (parseInt(page) <= 1) {
        page = 1;
        $("#current_page_filter").val(page);
    } else {
        page--;
        $("#current_page_filter").val(page).change();
    }
})

$(document).on('click', '#add_page_filter', function() {
        page = $("#current_page_filter").val();
        max = $('#current_page_filter').attr('max');
        if (parseInt(page) >= parseInt(max)) {
            page = max;
            $("#current_page_filter").val(page);
        } else {
            page++;
            $("#current_page_filter").val(page).change();
        }
    })
    //hết phân trang
    //hết bộ lọc người giúp việc


//bộ lọc tin

function apply_filter_new() {
    filter_save = '';
    get_filter();
    $.ajax({
        url: 'Handles/Home/HomeController/apply_filter_new',
        type: 'POST',
        data: {
            job_style_id: filter_save['job_style_id'],
            city: filter_save['city'],
            district: filter_save['district'],
            min_age: filter_save['min_age'],
            max_age: filter_save['max_age'],
            exp: filter_save['exp'],
            salary_type: filter_save['salary_type'],
            salary1: filter_save['salary1'],
            salary2: filter_save['salary2'],
            salary_time: filter_save['salary_time'],
            work_schedule: filter_save['work_schedule'],
            work_type_id: filter_save['work_type_id']
        },
        dataType: "JSON",
        success: function(result) {
            $('.job_list').html('');
            result['new_dom'].forEach(item => {
                $('.job_list').append(item);
            });
            pagination_box = `<div class="pagination">
				<ul>
					<li><button id="minus_page_filter_new"><img src="/images/pagination_prev.svg" alt="nut lui trang"></button></li>
					<li><input type="number" id="current_page_filter_new" class="active" max="${result['total_page']}" value="${result['page']}"></li>
					<li><button id="add_page_filter_new"><img src="/images/pagination_next.svg" alt="nut tien"></button></li>
				</ul>
		 	</div>
			 <span class="total_page"> of ${result['total_page']}</span>`;
            $('.pagination_box').html(pagination_box);
            $('#page_title').html('Danh sách người giúp việc đã lọc');
        }
    });
}

function filter_pagination_new(page) {
    $.ajax({
        url: 'Handles/Home/HomeController/apply_filter_new',
        type: 'POST',
        data: {
            job_style_id: filter_save['job_style_id'],
            city: filter_save['city'],
            district: filter_save['district'],
            min_age: filter_save['min_age'],
            max_age: filter_save['max_age'],
            exp: filter_save['exp'],
            salary_type: filter_save['salary_type'],
            salary1: filter_save['salary1'],
            salary2: filter_save['salary2'],
            salary_time: filter_save['salary_time'],
            work_schedule: filter_save['work_schedule'],
            work_type_id: filter_save['work_type_id'],
            page: page
        },
        dataType: "JSON",
        success: function(result) {
            // alert(result);
            $('.job_list').html('');
            result['new_dom'].forEach(item => {
                $('.job_list').append(item);
            });
            pagination_box = `<div class="pagination">
			<ul>
				<li><button id="minus_page_filter_new"><img src="/images/pagination_prev.svg" alt="nut lui trang"></button></li>
				<li><input type="number" id="current_page_filter_new" class="active" max="${result['total_page']}" value="${result['page']}"></li>
				<li><button id="add_page_filter_new"><img src="/images/pagination_next.svg" alt="nut tien"></button></li>
			</ul>
		 </div>
		 <span class="total_page"> of ${result['total_page']}</span>`;
            $('.pagination_box').html(pagination_box)
        }
    });
}


$(document).ready(function() {
    // điều hướng phân trang bộ lọc tin
    $(document).on('change', '#current_page_filter_new', function() {
        max = $('#current_page_filter_new').attr('max');
        if (parseInt($("#current_page_filter_new").val()) > parseInt(max)) {
            $("#current_page_filter_new").val(max);
        } else if (parseInt($("#current_page_filter_new").val()) <= 0) {
            page = 1;
            $("#current_page_filter_new").val(page);
        }
        filter_pagination_new($("#current_page_filter_new").val());
    })

    $(document).on('click', '#minus_page_filter_new', function() {
        page = $("#current_page_filter").val();
        if (parseInt(page) <= 1) {
            page = 1;
            $("#current_page_filter_new").val(page);
        } else {
            page--;
            $("#current_page_filter_new").val(page).change();
        }
    })

    $(document).on('click', '#add_page_filter_new', function() {
        page = $("#current_page_filter_new").val();
        max = $('#current_page_filter_new').attr('max');
        if (parseInt(page) >= parseInt(max)) {
            page = max;
            $("#current_page_filter_new").val(page);
        } else {
            page++;
            $("#current_page_filter_new").val(page).change();
        }
    })
})
=======
//nut mo filter
$("#open_filter").click(function() {
    $("#filter").show();
});
//nut dong filter
$("#close_filter").click(function() {
    $("#filter").hide();
});

//an filte cho man mobile
if (screen.width < 1024) {
    $("#filter").hide();
    $("#close_filter").show();
    $("#open_filter").show();
} else {
    $("#filter").show();
    $("#close_filter").hide();
    $("#open_filter").hide();
}
$(window).resize(function() {
    if (screen.width < 1024) {
        $("#filter").hide();
        $("#close_filter").show();
        $("#open_filter").show();
    } else {
        $("#filter").show();
        $("#close_filter").hide();
        $("#open_filter").hide();
    }
});

// het dropdown filter
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
