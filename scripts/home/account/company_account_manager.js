// nut mo rong menu bar

<<<<<<< HEAD
$("#collapse_profile").click(function () {
	if ($(".menu_manager").is(":hidden")) {
		$(".menu_manager").show();
		$(this).html(`<img src="/images/btn_collapse_col.svg" alt="thu gon">`);
	} else {
		$(".menu_manager").hide();
		$(this).html(`<img src="/images/btn_expand_col.svg" alt="mo rong">`);
	}
});

function collapse_profile() {
	if (screen.width < 1024) {
		$(".menu_manager").hide();
		$("#collapse_profile").html(
			`<img src="/images/btn_expand_col.svg" alt="mo rong">`
		);
	} else {
		$(".menu_manager").show();
		$("#collapse_profile").html(
			`<img src="/images/btn_collapse_col.svg" alt="thu gon">`
		);
	}
}
collapse_profile();
$(window).resize(function () {
	collapse_profile();
=======
$('#collapse_profile').click(function() {
    if ($('.menu_manager').is(':hidden')) {
        $('.menu_manager').show();
        $(this).html(`<img src="/images/btn_collapse_col.svg" alt="thu gon">`)
    } else {
        $('.menu_manager').hide();
        $(this).html(`<img src="/images/btn_expand_col.svg" alt="mo rong">`)
    }
})

function collapse_profile() {
    if (screen.width < 1024) {
        $('.menu_manager').hide();
        $('#collapse_profile').html(`<img src="/images/btn_expand_col.svg" alt="mo rong">`)
    } else {
        $('.menu_manager').show();
        $('#collapse_profile').html(`<img src="/images/btn_collapse_col.svg" alt="thu gon">`)
    }
}
collapse_profile();
$(window).resize(function() {
    collapse_profile();
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
});

// het nut mo rong menu bar

// nut chuyen tab

<<<<<<< HEAD
$("#new_post").click(function () {
	window.location.href = "/account-manager/new-post";
});

$("#general").click(function () {
	window.location.href = "/account-manager";
});

$("#post").click(function () {
	window.location.href = "/account-manager/new-post";
});

$(".btn_post button").click(function () {
	window.location.href = "/account-manager/new-post";
});

$("#list_post").click(function () {
	window.location.href = "/account-manager/list-post";
});

$("#list_apply").click(function () {
	window.location.href = "/account-manager/list-apply";
});

$("#list_accept").click(function () {
	window.location.href = "/account-manager/list-accepted";
});

$("#list_save").click(function () {
	window.location.href = "/account-manager/list-saved";
});

$("#list_from_filter").click(function () {
	window.location.href = "/account-manager/list-worker-point";
});

$("#profile_detail").click(function () {
	window.location.href = "/account-manager/profile";
});

$("#change_password").click(function () {
	window.location.href = "/account-manager/change-password";
});

//het nut chuyen tab

// click copy
$(".candidate_contact .sdt").click(function () {
	phone = $(this).html();
	navigator.clipboard.writeText(phone);
	alert("???? copy s??? ??i???n tho???i!");
});

$(".candidate_contact .email").click(function () {
	email = $(this).html();
	navigator.clipboard.writeText(email);
	alert("???? copy ?????a ch??? email!");
});

//confirm popup

//????ng xu???t
function logout_action() {
	popup = $(".confirm_logout");
	popup
		.find("#yes,#no")
		.unbind()
		.click(function () {
			popup.hide();
		});
	popup.find("#yes").click(function () {
		logout();
	});
	popup.find("#no").click(function () {});
	popup.show();
}
//h???t ????ng xu???t

//b??? ???ng tuy???n
function unapply_action(id) {
	popup = $(".confirm_unapply");
	popup
		.find("#yes,#no")
		.unbind()
		.click(function () {
			popup.hide();
		});
	popup.find("#yes").click(function () {
		alert(id);
	});
	popup.find("#no").click(function () {});
	popup.show();
}
//h???t b??? ???ng tuy???n

//b??? l??u
function unsave(id) {
	$.ajax({
		url: "/unsave-employee",
		type: "POST",
		data: {
			id: id,
		},
		success: function () {
			$("#save_user_" + id).remove();
			alert("???? b??? l??u ng?????i gi??p vi???c!");
		},
	});
}

function unsave_action(id) {
	popup = $(".confirm_unsave");
	popup
		.find("#yes,#no")
		.unbind()
		.click(function () {
			popup.hide();
		});
	popup.find("#yes").click(function () {
		unsave(id);
	});
	popup.find("#no").click(function () {});
	popup.show();
}
//h???t b??? l??u

//ch???p nh???n, t??? ch???i ???ng tuy???n
function accept_apply(id) {
	$.ajax({
		url: "/update-apply-status",
		data: {
			apply_id: id,
			apply_status: 1,
		},
		type: "POST",
		dataType: "JSON",
		success: function (result) {
			if (result) {
				alert("???? ch???p nh???n y??u c???u ???ng tuy???n!");
				$("#apply_status_" + id).html('<p class="accept">???? ch???p nh???n</p>');
			} else {
				alert("Ch???p nh???n y??u c???u ???ng tuy???n kh??ng th??nh c??ng!");
			}
		},
	});
}

function refuse_apply(id) {
	$.ajax({
		url: "/update-apply-status",
		data: {
			apply_id: id,
			apply_status: 2,
		},
		type: "POST",
		dataType: "JSON",
		success: function (result) {
			if (result) {
				alert("???? t??? ch???i y??u c???u ???ng tuy???n!");
				$("#apply_status_" + id).html('<p class="refuse">???? t??? ch???i</p>');
			} else {
				alert("T??? ch???i y??u c???u ???ng tuy???n kh??ng th??nh c??ng!");
			}
		},
	});
}

function accept_action(id) {
	popup = $(".confirm_accept");
	popup
		.find("#yes,#no")
		.unbind()
		.click(function () {
			popup.hide();
		});
	popup.find("#yes").click(function () {
		accept_apply(id);
	});
	popup.find("#no").click(function () {});
	popup.show();
}

function refuse_action(id) {
	popup = $(".confirm_refuse");
	popup
		.find("#yes,#no")
		.unbind()
		.click(function () {
			popup.hide();
		});
	popup.find("#yes").click(function () {
		refuse_apply(id);
	});
	popup.find("#no").click(function () {});
	popup.show();
}

//h???t ch???p nh???n, t??? ch???i ???ng tuy???n

// het confirm popup

// select2
function add_select2() {
	$("#province").select2({
		placeholder: "Ch???n T???nh/Th??nh ph???",
		minimumResultsForSearch: -1,
		dropdownParent: $(".block_post"),
	});

	$(".block_profile #province").select2({
		placeholder: "Ch???n T???nh/Th??nh ph???",
		minimumResultsForSearch: -1,
		dropdownParent: $(".block_profile"),
	});

	$("#stay").select2({
		minimumResultsForSearch: -1,
		dropdownParent: $(".block_post"),
	});
	$("#district").select2({
		placeholder: "Ch???n Qu???n/Huy???n",
		minimumResultsForSearch: Infinity,
		dropdownParent: $(".block_post"),
	});
	$(".block_profile #district").select2({
		placeholder: "Ch???n Qu???n/Huy???n",
		minimumResultsForSearch: Infinity,
		dropdownParent: $(".block_profile"),
	});
	$("#job_style").select2({
		placeholder: "Ch???n lo???i h??nh d???ch v???",
		minimumResultsForSearch: Infinity,
		dropdownParent: $(".block_post"),
	});
	$("#experience").select2({
		placeholder: "L???a ch???n kinh nghi???m",
		minimumResultsForSearch: Infinity,
		dropdownParent: $(".block_post"),
	});
	$("#education").select2({
		placeholder: "L???a ch???n tr??nh ????? h???c v???n",
		minimumResultsForSearch: Infinity,
		dropdownParent: $(".block_post"),
	});
	$("#sal_time_dynamic").select2({
		minimumResultsForSearch: Infinity,
		dropdownParent: $(".block_post"),
	});
	$("#sal_time_static").select2({
		minimumResultsForSearch: Infinity,
		dropdownParent: $(".block_post"),
	});
	$("#profile_province").select2({
		placeholder: "Ch???n T???nh/Th??nh ph???",
		minimumResultsForSearch: Infinity,
		dropdownParent: $(".block_profile"),
	});
	$("#profile_district").select2({
		placeholder: "Ch???n Qu???n/Huy???n",
		minimumResultsForSearch: Infinity,
		dropdownParent: $(".block_profile"),
	});
}
// het select2

// l???y d??? li???u qu???n huy???n
$("#province").change(function () {
	get_district();
});

//thanh ch???n tu???i
if ($(".block_post").html()) {
	var age_range = new rSlider({
		target: "#range_age",
		values: { min: 16, max: 80 },
		step: 1,
		range: true,
		tooltip: true,
		scale: true,
		labels: false,
		set: [25, 60],
	});
}

if ($("#age_from").val() && $("#age_to").val()) {
	age_range.setValues(
		parseInt($("#age_from").val()),
		parseInt($("#age_to").val())
	);
}
// het thanh ch???n tu???i

//ch???n lo???i l????ng
$("#static_sal_btn").click(function () {
	$("#sal_dynamic").hide();
	$("#sal_static").show();
	add_select2();
});

$("#dynamic_sal_btn").click(function () {
	$("#sal_dynamic").show();
	$("#sal_static").hide();
	add_select2();
});
//h???t ch???n lo???i l????ng

// ????ng tin
$(document).ready(function () {
	add_select2();
	// $('#t7 .col_time').remove();
	// $('#t7').append('<div class="schedule_msg" id="schedule_msg_t7">Ng??y ngh???</div>');
	// $('#cn .col_time').remove();
	// $('#cn').append('<div class="schedule_msg" id="schedule_msg_cn">Ng??y ngh???</div>');
	$("#add_t2").hide();
	$("#add_t3").hide();
	$("#add_t4").hide();
	$("#add_t5").hide();
	$("#add_t6").hide();
	$("#add_t7").hide();
	$("#add_cn").hide();
});

//ch???n ng??y l??m vi???c
function hide_schedule_row(id) {
	schedule = "";
	var schedule = $("#" + id + " .col_time").html();
	if (schedule) {
		$("#" + id + " .col_time").remove();
		$("#" + id).append(
			'<div class="schedule_msg" id="schedule_msg_' + id + '">Ng??y ngh???</div>'
		);
	} else {
		$("#schedule_msg_" + id).remove();
		$("#" + id).append(`<div class="col_2 col_time" id="${id}_am">
		<span>T???</span>
		<input type="text" value="07:00" class="start" name='${id}_am_start'>
		<span>?????n</span>
		<input type="text" value="11:00" class="end" name='${id}_am_end'>
=======
$('#general').click(function() {

})

$('#post').click(function() {

})

$('.btn_post').click(function() {

})

$('#list_post').click(function() {

})

$('#list_apply').click(function() {

})

$('#list_accept').click(function() {

})

$('#list_save').click(function() {

})

$('#list_from_filter').click(function() {

})

$('#profile_detail').click(function() {

})

$('#change_password').click(function() {

})

//het nut chuyen tab

//confirm popup

function logout_action() {
    popup = $('.confirm_logout');
    popup.find("#yes,#no").unbind().click(function() {
        popup.hide();
    });
    popup.find("#yes").click(function() {
        alert('????ng xu???t th??nh c??ng!')
    });
    popup.find("#no").click(function() {});
    popup.show();
}

function unapply_action(id) {
    popup = $('.confirm_unapply');
    popup.find("#yes,#no").unbind().click(function() {
        popup.hide();
    });
    popup.find("#yes").click(function() {
        alert(id)
    });
    popup.find("#no").click(function() {});
    popup.show();
}

function unsave_action(id) {
    popup = $('.confirm_unsave');
    popup.find("#yes,#no").unbind().click(function() {
        popup.hide();
    });
    popup.find("#yes").click(function() {
        alert(id)
    });
    popup.find("#no").click(function() {});
    popup.show();
}

function accept_action(id) {
    popup = $('.confirm_accept');
    popup.find("#yes,#no").unbind().click(function() {
        popup.hide();
    });
    popup.find("#yes").click(function() {
        alert(id)
    });
    popup.find("#no").click(function() {});
    popup.show();
}


function refuse_action(id) {
    popup = $('.confirm_refuse');
    popup.find("#yes,#no").unbind().click(function() {
        popup.hide();
    });
    popup.find("#yes").click(function() {
        alert(id)
    });
    popup.find("#no").click(function() {});
    popup.show();
}

// het confirm popup 




// select2 
function add_select2() {
    $('#province').select2({
        placeholder: "Ch???n T???nh/Th??nh ph???",
        minimumResultsForSearch: -1,
        dropdownParent: $('.block_post')
    });
    $('#stay').select2({
        minimumResultsForSearch: -1,
        dropdownParent: $('.block_post')
    });
    $('#district').select2({
        placeholder: "Ch???n Qu???n/Huy???n",
        minimumResultsForSearch: Infinity,
        dropdownParent: $('.block_post')
    });
    $('#job_style').select2({
        placeholder: "Ch???n lo???i h??nh d???ch v???",
        minimumResultsForSearch: Infinity,
        dropdownParent: $('.block_post')
    });
    $('#experience').select2({
        placeholder: "L???a ch???n kinh nghi???m",
        minimumResultsForSearch: Infinity,
        dropdownParent: $('.block_post')
    });
    $('#education').select2({
        placeholder: "L???a ch???n tr??nh ????? h???c v???n",
        minimumResultsForSearch: Infinity,
        dropdownParent: $('.block_post')
    });
    $('#sal_time_dynamic').select2({
        minimumResultsForSearch: Infinity,
        dropdownParent: $('.block_post')
    });
    $('#sal_time_static').select2({
        minimumResultsForSearch: Infinity,
        dropdownParent: $('.block_post')
    });
    $('#profile_province').select2({
        placeholder: "Ch???n T???nh/Th??nh ph???",
        minimumResultsForSearch: Infinity,
        dropdownParent: $('.block_profile')
    })
    $('#profile_district').select2({
        placeholder: "Ch???n Qu???n/Huy???n",
        minimumResultsForSearch: Infinity,
        dropdownParent: $('.block_profile')
    })
}
// het select2

//age range
if ($('.block_profile').html()) {
    var age_range = new rSlider({
        target: '#range_age',
        values: { min: 16, max: 80 },
        step: 1,
        range: true,
        tooltip: true,
        scale: true,
        labels: false,
        set: [25, 60]
    });
}
// het age range 

//muc luong
$('#static_sal_btn').click(function() {
    $('#sal_dynamic').hide();
    $('#sal_static').show();
    add_select2();
})

$('#dynamic_sal_btn').click(function() {
    $('#sal_dynamic').show();
    $('#sal_static').hide();
    add_select2();
})

// het muc luong 


// dang tin
$(document).ready(function() {
    add_select2();
    // $('#t7 .col_time').remove();
    // $('#t7').append('<div class="schedule_msg" id="schedule_msg_t7">Ng??y ngh???</div>');
    // $('#cn .col_time').remove();
    // $('#cn').append('<div class="schedule_msg" id="schedule_msg_cn">Ng??y ngh???</div>');
    $('#add_t2').hide();
    $('#add_t3').hide();
    $('#add_t4').hide();
    $('#add_t5').hide();
    $('#add_t6').hide();
    $('#add_t7').hide();
    $('#add_cn').hide();
});

// cac nut lich lam viec

function hide_schedule_row(id) {
    schedule = '';
    var schedule = $('#' + id + ' .col_time').html();
    if (schedule) {
        $('#' + id + ' .col_time').remove();
        $('#' + id).append('<div class="schedule_msg" id="schedule_msg_' + id + '">Ng??y ngh???</div>');
    } else {
        $('#schedule_msg_' + id).remove();
        $('#' + id).append(`<div class="col_2 col_time" id="${id}_am">
		<span>T???</span>
		<input type="text" placeholder="07:00" class="start" name='${id}_am_start'>
		<span>?????n</span>
		<input type="text" placeholder="11:00" class="end" name='${id}_am_end'>
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
		<button type="button" onclick="add_schedule_row('${id}')" id="add_${id}"><img src="/images/add_schedule.svg" alt=""></button>
	</div>
	<div class="col_3 col_time" id="${id}_pm">
		<span>T???</span>
<<<<<<< HEAD
		<input type="text" value="18:00" class="start" name='${id}_pm_start'>
		<span>?????n</span>
		<input type="text" value="21:00" class="end" name='${id}_pm_end'>
		<button type="button" onclick="minus_schedule_row('${id}')" id="minus_${id}"><img src="/images/clear_schedule.svg" alt=""></button>
	</div>`);
		$("#add_" + id).hide();
	}
}

//th??m ca l??m vi???c
function add_schedule_row(id) {
	var schedule = $("#" + id + "_pm").html();
	if (!schedule) {
		$("#" + id).append(`
	<div class="col_3 col_time" id="${id}_pm">
		<span>T???</span>
		<input type="text" value="18:00" class="start" name='${id}_pm_start'>
		<span>?????n</span>
		<input type="text" value="21:00" class="end" name='${id}_pm_end'>
		<button type="button" onclick="minus_schedule_row('${id}')" id="minus_t2"><img src="/images/clear_schedule.svg" alt=""></button>
	</div>`);
		$("#add_" + id).hide();
	}
}

//gi???m ca l??m vi???c
function minus_schedule_row(id) {
	var schedule = $("#" + id + "_pm").html();
	if (schedule) {
		$("#" + id + "_pm").remove();
		$("#add_" + id).show();
	}
}

//validate ????ng b??i
function validate_title() {
	document.getElementById("error_title").innerHTML = "";
	var title_fomat = /^[0-9a-zA-Z]{2,}$/g;
	if ($("#title").val() == "") {
		document.getElementById("error_title").innerHTML =
			"Ti??u ????? kh??ng ???????c ????? tr???ng!";
		flag = 0;
	} else {
		if (!removeAscent($("#title").val()).match(title_fomat)) {
			$("#error_title").html("Ti??u ????? tin kh??ng ???????c ch???a k?? t??? ?????c bi???t");
			flag = 0;
		}
	}
}
$("#title").blur(function () {
	validate_title();
});

function validate_address() {
	document.getElementById("error_address").innerHTML = "";
	var add_fomat = /^[0-9a-zA-Z]{2,}$/g;
	if ($("#address").val() == "") {
		document.getElementById("error_address").innerHTML =
			"?????a ch??? c??? th??? kh??ng ???????c ????? tr???ng!";
		flag = 0;
	} else {
		if (!removeAscent($("#address").val()).match(add_fomat)) {
			$("#error_address").html("?????a ch??? kh??ng ???????c ch???a k?? t??? ?????c bi???t");
			flag = 0;
		}
	}
}
$("#address").blur(function () {
	validate_address();
});

function validate_day() {
	document.getElementById("error_day_start").innerHTML = "";
	document.getElementById("error_day_close").innerHTML = "";
	if ($("#day_start").val() == "") {
		document.getElementById("error_day_start").innerHTML =
			"Ng??y b???t ?????u kh??ng ???????c ????? tr???ng!";
		flag = 0;
	}
	if ($("#day_close").val() == "") {
		document.getElementById("error_day_close").innerHTML =
			"Th???i h???n kh??ng ???????c ????? tr???ng!";
		flag = 0;
	}
	now = dateToYMD(new Date());
	// alert(($('#day_start').val()).valueOf());
	if ($("#day_start").val() != "" && $("#day_close").val() != "") {
		day_start = new Date($("#day_start").val());
		day_close = new Date($("#day_close").val());
		if (parseInt(Date.parse(day_close)) < parseInt(Date.parse(now))) {
			document.getElementById("error_day_close").innerHTML =
				"Th???i h???n nh???n vi???c kh??ng ???????c tr?????c ng??y hi???n t???i!";
			flag = 0;
		} else {
			if (day_start <= day_close) {
				document.getElementById("error_day_close").innerHTML =
					"Th???i h???n nh???n vi???c ph???i tr?????c ng??y b???t ?????u l??m vi???c!";
				flag = 0;
			}
		}
	}
}
$("#day_start").blur(function () {
	validate_day();
});
$("#day_close").blur(function () {
	validate_day();
});

function validate_job_detail() {
	document.getElementById("error_job_detail").innerHTML = "";
	var job_format = /^[a-zA-Z]$/g;

	if ($("#job_detail").val() == "") {
		document.getElementById("error_job_detail").innerHTML =
			"M?? t??? c??ng vi???c kh??ng ???????c ????? tr???ng!";
		flag = 0;
	} else {
		if ($("#job_detail").val().trim() == "") {
			document.getElementById("error_job_detail").innerHTML =
				"M?? t??? c??ng vi???c kh??ng ???????c ????? tr???ng!";
			flag = 0;
		} else if (checkAllkitu("#job_detail") == true) {
			"error_job_detail".html(
				"M?? t??? c??ng vi???c kh??ng ???????c nh???p to??n b??? k?? t??? ?????c bi???t ."
			);
			flag = false;
		}
	}
}
$("#job_detail").blur(function () {
	validate_job_detail();
});

function validate_job_require() {
	document.getElementById("error_job_require").innerHTML = "";
	if ($("#job_require").val() == "") {
		document.getElementById("error_job_require").innerHTML =
			"Y??u c???u kh??ng ???????c ????? tr???ng!";
		flag = 0;
	} else {
		if ($("#job_require").val().trim() == "") {
			(".error_job_require").html("Kh??ng ????? tr???ng m???c n??y ho???c kh??ng ???????c nh???p to??n d???u c??ch")
			flag = 0;
		} else if (checkAllkitu("#job_require") == true) {
			"error_job_require".html(
				"Y??u c???u c??ng vi???c kh??ng th??? ch??? c?? k?? t??? ?????c bi???t ???????c ! ."
			);
			flag = false;
            
		}
	}
}
$("#job_require").blur(function () {
	validate_job_require();
});

function validate_job_benefit() {
	document.getElementById("error_job_benefit").innerHTML = "";
	if ($("#job_benefit").val() == "") {
		document.getElementById("error_job_benefit").innerHTML =
			"Quy???n l???i kh??ng ???????c ????? tr???ng!";
		flag = 0;
	} else {
		if ($("#job_benefit").val().trim() == "") {
			document.getElementById("error_job_benefit").innerHTML =
				"Quy???n l???i kh??ng ???????c ????? tr???ng!";
			flag = 0;
		}  else if (checkAllkitu("#job_benefit") == true) {
			"error_job_benefit".html(
				"Quy???n l???i kh??ng ???????c nh???p to??n b??? l?? k?? t??? ?????c bi???t ."
			);
			flag = false;
		}
        //Neu 2 cai dau khac rong
        //Neu ca 3 deu khac rong/
	}
}
$("#job_benefit").blur(function () {
	validate_job_benefit();
});
$(".row_sal input").blur(function () {
	validate_salary();
});

$("#job_style").on("select2:close", function () {
	validate_job_style();
});

$("#experience").blur(function () {
	validate_experience();
});

$("#education").blur(function () {
	validate_education();
});
$(document).on("blur", ".table_schedule input", function () {
	validate_schedule();
});
$(".checkbox_schedule").change(function () {
	validate_schedule();
});
$("#province").on("select2:close", function () {
	validate_province();
});

$("#district").on("select2:close", function () {
	validate_district();
});

function form_post_validate() {
	flag = 1;
	validate_title();
	validate_job_style();
	validate_experience();
	validate_education();
	validate_province();
	validate_district();
	validate_address();
	validate_salary();
	validate_day();
	validate_schedule();
	validate_job_detail();
	validate_job_require();
	validate_job_benefit();

	if (flag == 0) {
		return false;
	} else {
		return true;
	}
}

// validate l???ch l??m vi???c
function validate_schedule_time(day) {
	var timeformat = /^([0-1]?[0-9]|2[0-4]):([0-5][0-9])(:[0-5][0-9])?$/;
	start_m = $("#" + day + " .start").val();
	end_m = $("#" + day + " .end").val();
	if (!start_m.match(timeformat) || !end_m.match(timeformat)) {
		document.getElementById("error_schedule").innerHTML =
			"Sai ?????nh d???ng th???i gian!";
		return false;
	} else if (start_m.length > 5 || end_m.length > 5) {
		document.getElementById("error_schedule").innerHTML =
			"Sai ?????nh d???ng th???i gian!";
		return false;
	} else {
		timestring_star_m = start_m.split(/:/);
		time_value_start_m = "";
		for (j = 0; j < timestring_star_m.length; j++) {
			time_value_start_m += timestring_star_m[j];
		}

		timestring_end_m = end_m.split(/:/);
		time_value_end_m = "";
		for (j = 0; j < timestring_end_m.length; j++) {
			time_value_end_m += timestring_end_m[j];
		}
		if (Number(time_value_start_m) - Number(time_value_end_m) >= 0) {
			document.getElementById("error_schedule").innerHTML =
				"Th???i gian b???t ?????u ph???i nh??? h??n th???i gian k???t th??c!";
			return false;
		}
	}
	return true;
=======
		<input type="text" placeholder="18:00" class="start" name='${id}_pm_start'>
		<span>?????n</span>
		<input type="text" placeholder="21:00" class="end" name='${id}_pm_end'>
		<button type="button" onclick="minus_schedule_row('${id}')" id="minus_${id}"><img src="/images/clear_schedule.svg" alt=""></button>
	</div>`);
        $('#add_' + id).hide();
    }
}


function add_schedule_row(id) {
    var schedule = $('#' + id + '_pm').html();
    if (!schedule) {
        $('#' + id).append(`
	<div class="col_3 col_time" id="${id}_pm">
		<span>T???</span>
		<input type="text" placeholder="18:00" class="start" name='${id}_pm_start'>
		<span>?????n</span>
		<input type="text" placeholder="21:00" class="end" name='${id}_pm_end'>
		<button type="button" onclick="minus_schedule_row('${id}')" id="minus_t2"><img src="/images/clear_schedule.svg" alt=""></button>
	</div>`);
        $('#add_' + id).hide();
    }
}

function minus_schedule_row(id) {
    var schedule = $('#' + id + '_pm').html();
    if (schedule) {
        $('#' + id + '_pm').remove();
        $('#add_' + id).show();
    }
}

//het cac nut lich lam viec

//validate dang bai

function form_post_validate() {
    document.getElementById('error_title').innerHTML = "";
    document.getElementById('error_province').innerHTML = "";
    document.getElementById('error_district').innerHTML = "";
    document.getElementById('error_address').innerHTML = "";
    document.getElementById('error_job_style').innerHTML = "";
    document.getElementById('error_experience').innerHTML = "";
    document.getElementById('error_education').innerHTML = "";
    document.getElementById('error_schedule').innerHTML = "";
    document.getElementById('error_day_start').innerHTML = "";
    document.getElementById('error_day_close').innerHTML = "";
    document.getElementById('error_sal').innerHTML = "";
    document.getElementById('error_job_detail').innerHTML = "";
    document.getElementById('error_job_require').innerHTML = "";
    document.getElementById('error_job_benefit').innerHTML = "";

    flag = 1;

    if ($('#title').val() == '') {
        document.getElementById('error_title').innerHTML = "Ti??u ????? kh??ng ???????c ????? tr???ng!";
        flag = 0;
    } else {
        if ($('#title').val().trim() == '') {
            document.getElementById('error_title').innerHTML = "Ti??u ????? kh??ng ???????c ????? tr???ng!";
            flag = 0;
        }
    }
    if ($('#day_start').val() == '') {
        document.getElementById('error_day_start').innerHTML = "Ng??y b???t ?????u kh??ng ???????c ????? tr???ng!";
        flag = 0;
    }
    if ($('#day_close').val() == '') {
        document.getElementById('error_day_close').innerHTML = "Th???i h???n kh??ng ???????c ????? tr???ng!";
        flag = 0;
    }
    // alert(($('#day_start').val()).valueOf());
    if ($('#day_start').val() != '' && $('#day_close').val() != '') {
        day_start = new Date($('#day_start').val());
        day_close = new Date($('#day_close').val());
        if (day_start <= day_close) {
            document.getElementById('error_day_close').innerHTML = "Th???i h???n nh???n vi???c ph???i tr?????c ng??y b???t ?????u!";
        }
    }
    if ($('#province').val() == '') {
        document.getElementById('error_province').innerHTML = "T???nh/Th??nh ph??? kh??ng ???????c ????? tr???ng!";
        flag = 0;
    }
    if ($('#district').val() == '') {
        document.getElementById('error_district').innerHTML = "Qu???n/Huy???n kh??ng ???????c ????? tr???ng!";
        flag = 0;
    }
    if ($('#address').val() == '') {
        document.getElementById('error_address').innerHTML = "?????a ch??? c??? th??? kh??ng ???????c ????? tr???ng!";
        flag = 0;
    } else {
        if ($('#address').val().trim() == '') {
            document.getElementById('error_address').innerHTML = "?????a ch??? c??? th??? kh??ng ???????c ????? tr???ng!";
            flag = 0;
        }
    }
    if ($('#job_style').val() == '') {
        document.getElementById('error_job_style').innerHTML = "Lo???i h??nh d???ch v??? kh??ng ???????c ????? tr???ng!";
        flag = 0;
    }
    if ($('#experience').val() == '') {
        document.getElementById('error_experience').innerHTML = "Kinh nghi???m kh??ng ???????c ????? tr???ng!";
        flag = 0;
    }
    if ($('#education').val() == '') {
        document.getElementById('error_education').innerHTML = "Tr??nh ????? h???c v???n kh??ng ???????c ????? tr???ng!";
        flag = 0;
    }
    if ($('#job_detail').val() == '') {
        document.getElementById('error_job_detail').innerHTML = "M?? t??? c??ng vi???c kh??ng ???????c ????? tr???ng!";
        flag = 0;
    } else {
        if ($('#job_detail').val().trim() == '') {
            document.getElementById('error_job_detail').innerHTML = "M?? t??? c??ng vi???c kh??ng ???????c ????? tr???ng!";
            flag = 0;
        }
    }
    if ($('#job_require').val() == '') {
        document.getElementById('error_job_require').innerHTML = "Y??u c???u kh??ng ???????c ????? tr???ng!";
        flag = 0;
    } else {
        if ($('#job_require').val().trim() == '') {
            document.getElementById('error_job_require').innerHTML = "Y??u c???u kh??ng ???????c ????? tr???ng!";
            flag = 0;
        }
    }
    if ($('#job_benefit').val() == '') {
        document.getElementById('error_job_benefit').innerHTML = "Quy???n l???i kh??ng ???????c ????? tr???ng!";
        flag = 0;
    } else {
        if ($('#job_benefit').val().trim() == '') {
            document.getElementById('error_job_benefit').innerHTML = "Quy???n l???i kh??ng ???????c ????? tr???ng!";
            flag = 0;
        }
    }
    sal_option = '';
    $('[name="sal_option"]').each(function() {
        if ($(this).is(':checked')) {
            sal_option = $(this).val();
        }
    })

    if (sal_option == 0) {
        if ($('#sal').val() == '') {
            $('#error_sal').html('M???c l????ng kh??ng ???????c ????? tr???ng!')
        } else {
            if ($('#sal').val().trim() == '') {
                $('#error_sal').html('M???c l????ng kh??ng ???????c ????? tr???ng!')
            }
        }
    } else {
        if ($('#sal_from').val() == '' || $('#sal_to').val() == '') {
            $('#error_sal').html('M???c l????ng kh??ng ???????c ????? tr???ng!')
        } else {
            if ($('#sal_from').val().trim() == '' || $('#sal_to').val().trim() == '') {
                $('#error_sal').html('M???c l????ng kh??ng ???????c ????? tr???ng!')
            }
        }
    }

    schedule_checked = document.getElementsByClassName('checkbox_schedule');
    flag_schedule = 0;
    for (var i = 0; i < schedule_checked.length; i++) {
        if (schedule_checked[i].checked === true) {
            flag_schedule = 1;
        }
    }
    if (flag_schedule == 0) {
        document.getElementById('error_schedule').innerHTML = "L???ch l??m vi???c kh??ng ???????c ????? tr???ng!";
    }

    if ($('#t2_am').html()) {
        if (!validate_schedule_time('t2_am')) {
            flag = 0
        }
    }
    if ($('#t3_am').html()) {
        if (!validate_schedule_time('t3_am')) {
            flag = 0
        }
    }
    if ($('#t4_am').html()) {
        if (!validate_schedule_time('t4_am')) {
            flag = 0
        }
    }
    if ($('#t5_am').html()) {
        if (!validate_schedule_time('t5_am')) {
            flag = 0
        }
    }
    if ($('#t6_am').html()) {
        if (!validate_schedule_time('t6_am')) {
            flag = 0
        }
    }
    if ($('#t7_am').html()) {
        if (!validate_schedule_time('t7_am')) {
            flag = 0
        }
    }
    if ($('#cn_am').html()) {
        if (!validate_schedule_time('cn_am')) {
            flag = 0
        }
    }
    if ($('#t2_pm').html()) {
        if (!validate_schedule_time('t2_pm')) {
            flag = 0
        }
    }
    if ($('#t3_pm').html()) {
        if (!validate_schedule_time('t3_pm')) {
            flag = 0
        }
    }
    if ($('#t4_pm').html()) {
        if (!validate_schedule_time('t4_pm')) {
            flag = 0
        }
    }
    if ($('#t5_pm').html()) {
        if (!validate_schedule_time('t5_pm')) {
            flag = 0
        }
    }
    if ($('#t6_pm').html()) {
        if (!validate_schedule_time('t6_pm')) {
            flag = 0
        }
    }
    if ($('#t7_pm').html()) {
        if (!validate_schedule_time('t7_pm')) {
            flag = 0
        }
    }
    if ($('#cn_pm').html()) {
        if (!validate_schedule_time('cn_pm')) {
            flag = 0
        }
    }
    if (flag == 0) {
        return false;
    } else {
        return true;
    }
}

function validate_schedule_time(day) {
    var timeformat = /^([0-1]?[0-9]|2[0-4]):([0-5][0-9])(:[0-5][0-9])?$/;
    start_m = $('#' + day + ' .start').val();
    end_m = $('#' + day + ' .end').val();
    if (!start_m.match(timeformat) || !end_m.match(timeformat)) {
        document.getElementById('error_schedule').innerHTML = "Sai ?????nh d???ng th???i gian!";
        return false;
    } else if (start_m.length > 5 || end_m.length > 5) {
        document.getElementById('error_schedule').innerHTML = "Sai ?????nh d???ng th???i gian!";
        return false;
    } else {
        timestring_star_m = start_m.split(/:/);
        time_value_start_m = '';
        for (j = 0; j < timestring_star_m.length; j++) {
            time_value_start_m += timestring_star_m[j];
        }

        timestring_end_m = end_m.split(/:/);
        time_value_end_m = '';
        for (j = 0; j < timestring_end_m.length; j++) {
            time_value_end_m += timestring_end_m[j];
        }
        if (Number(time_value_start_m) - Number(time_value_end_m) >= 0) {
            document.getElementById('error_schedule').innerHTML = "Th???i gian b???t ?????u ph???i nh??? h??n th???i gian k???t th??c!";
            return false;
        }
    }
    return true;
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
}
//het validate dang bai

// nut reset form dang bai
<<<<<<< HEAD
function reset_form_post() {
	$(".block_post input").val(function () {
		return $(this).defaultValue;
	});
	$(".block_post textarea").val("");
	$(".block_post select").prop("selectedIndex", 0).trigger("change");
	age_range.setValues(25, 60);
}
// het nut reset form dang bai

// validate thong tin ca nhan
var flag = 1;

function validate_profile_name() {
	document.getElementById("error_profile_name").innerHTML = "";
	var name_format = /^[a-zA-Z!@#\$%\^\&*\)\(+=._-]{2,}$/g;
	if ($("#profile_name").val().trim() == "") {
		$("#error_profile_name").html("H??? t??n kh??ng ???????c ????? tr???ng!");
		flag = 0;
	} else {
		if (!removeAscent($("#profile_name").val()).match(name_format)) {
			$("#error_profile_name").html("H??? t??n kh??ng ????ng ?????nh d???ng!");
			flag = 0;
		}
	}
}
$("#profile_name").blur(function () {
	validate_name();
});

function validate_profile_birth() {
	document.getElementById("error_profile_birthday").innerHTML = "";
	if ($("#profile_birthday").val() == "") {
		document.getElementById("error_profile_birthday").innerHTML =
			"Ng??y sinh kh??ng ???????c ????? tr???ng!";
		flag = 0;
	} else if (
		Date.parse($("#profile_birthday").val()) >= Date.parse(new Date())
	) {
		flag = 0;
		document.getElementById("error_profile_birthday").innerHTML =
			"Ng??y sinh kh??ng ???????c sau ng??y hi???n t???i!";
	}
}
$("#profile_birthday").blur(function () {
	validate_birth();
});

function validate_province() {
	document.getElementById("error_province").innerHTML = "";
	if ($("#province").val() == "") {
		document.getElementById("error_province").innerHTML =
			"T???nh/Th??nh ph??? kh??ng ???????c ????? tr???ng!";
		flag = 0;
	}
}
$("#province").on("select2:close", function () {
	validate_province();
});

function validate_district() {
	document.getElementById("error_district").innerHTML = "";
	if ($("#district").val() == "") {
		document.getElementById("error_district").innerHTML =
			"Qu???n/Huy???n kh??ng ???????c ????? tr???ng!";
		flag = 0;
	}
}
$("#district").on("select2:close", function () {
	validate_district();
});

function validate_profile_address() {
	document.getElementById("error_profile_address").innerHTML = "";
	if ($("#profile_address").val() == "") {
		document.getElementById("error_profile_address").innerHTML =
			"?????a ch??? c??? th??? kh??ng ???????c ????? tr???ng!";
		flag = 0;
	}
}
$("#profile_address").blur(function () {
	validate_address();
});

function validate_profile() {
	flag = 1;
	validate_profile_address();
	validate_profile_birth();
	validate_district();
	validate_profile_name();
	validate_province();
	if (flag == 0) return false;
	else return true;
}

function update_profile() {
	if (validate_profile()) {
		var name = $("#profile_name").val().trim();
		birth = $("#profile_birthday").val().trim();
		province = $("#province").val().trim();
		district = $("#district").val().trim();
		address = $("#profile_address").val().trim();
		$.ajax({
			url: "/Handles/Home/AccountController/update_company_profile",
			type: "POST",
			data: {
				name: name,
				birth: birth,
				city_id: province,
				district_id: district,
				address: address,
			},
			dataType: "json",
			success: function (output) {
				if (output["result"]) {
					alert(output["message"]);
					window.location.href = "/account-manager";
				} else {
					$("#error_profile_name").html(output["message"]);
				}
			},
		});
	}
}
// het validate th??ng tin c?? nh??n

// hover cho cong viec da luu
$(".employee").hover(
	function () {
		this.querySelector(
			".icon_location"
		).innerHTML = `<img src="/images/location_icon_hover.svg" alt="dia chi">`;
		this.querySelector(
			".icon_job_location"
		).innerHTML = `<img src="/images/job_location_icon_hover.svg" alt="o cung chu nha">`;
		this.querySelector(
			".icon_birthday"
		).innerHTML = `<img src="/images/birthday_icon_hover.svg" alt="tuoi">`;
		this.querySelector(
			".icon_exp"
		).innerHTML = `<img src="/images/exp_icon_hover.svg" alt="kinh nghiem">`;
		this.querySelector(
			".icon_job_tag"
		).innerHTML = `<img src="/images/job_tag_icon_hover.svg" alt="them vao yeu thich">`;
	},
	function () {
		this.querySelector(
			".icon_location"
		).innerHTML = `<img src="/images/location_icon.svg" alt="dia chi">`;
		this.querySelector(
			".icon_job_location"
		).innerHTML = `<img src="/images/job_location_icon.svg" alt="o cung chu nha">`;
		this.querySelector(
			".icon_birthday"
		).innerHTML = `<img src="/images/birthday_icon.svg" alt="tuoi">`;
		this.querySelector(
			".icon_exp"
		).innerHTML = `<img src="/images/exp_icon.svg" alt="kinh nghiem">`;
		this.querySelector(
			".icon_job_tag"
		).innerHTML = `<img src="/images/job_tag_icon.svg" alt="them vao yeu thich">`;
	}
);
//het hover cho cong viec da luu

//x??? l?? l???ch
if ($(".calender").html()) {
	let monEle = document.querySelector("#month");
	let yearEle = document.querySelector("#year");
	let currentMonth = new Date().getMonth();
	let currentYear = new Date().getFullYear();

	function displayCalender() {
		let currentMonthName = new Date(currentYear, currentMonth).toLocaleString(
			"en-us",
			{ month: "long" }
		);
		monEle.innerHTML = currentMonthName;
		yearEle.innerHTML = currentYear;
	}
	window.onload = displayCalender;

	function getDayInMonth() {
		return new Date(currentYear, currentMonth + 1, 0).getDate();
	}

	function getDayInPrevMonth() {
		if (currentMonth == 0) {
			month = 11;
			year = currentYear - 1;
			return new Date(year, month + 1, 0).getDate();
		} else {
			month = currentMonth - 1;
			year = currentYear;
			return new Date(year, month + 1, 0).getDate();
		}
	}

	function getStartDayInMonth() {
		return new Date(currentYear, currentMonth, 1).getDay();
	}

	function activeCurrentDay(day) {
		let day1 = new Date().toDateString();
		let day2 = new Date(currentYear, currentMonth, day).toDateString();
		return day1 == day2 ? "active" : "";
	}

	let dateEle = document.querySelector(".day_box");

	function renderDate() {
		displayCalender();
		let dayInPrevMonth = getDayInPrevMonth();
		let daysInMonth = getDayInMonth();
		let startDay = getStartDayInMonth();
		dateEle.innerHTML = "";
		for (let i = 0; i < startDay; i++) {
			dateEle.innerHTML += `<button class="disable">${
				Number(dayInPrevMonth) - Number(startDay) + i + 1
			}</button>`;
		}
		for (let i = 0; i < daysInMonth; i++) {
			dateEle.innerHTML += `<button class="enable  ${activeCurrentDay(
				i + 1
			)}">${i + 1}</button>`;
		}
		if (daysInMonth + startDay <= 35) {
			for (let i = 0; i < 35 - daysInMonth - startDay; i++) {
				dateEle.innerHTML += `<button class="disable ">${i + 1}</button>`;
			}
		} else {
			for (let i = 0; i < 42 - daysInMonth - startDay; i++) {
				dateEle.innerHTML += `<button class="disable ">${i + 1}</button>`;
			}
		}
	}

	window.onload = renderDate;

	$("#prev_month").click(function () {
		if (currentMonth == 0) {
			currentMonth = 11;
			currentYear--;
			renderDate();
		} else {
			currentMonth--;
			renderDate();
		}
	});

	$("#next_month").click(function () {
		if (currentMonth == 11) {
			currentMonth = 0;
			currentYear++;
			renderDate();
			displayCalender();
		} else {
			currentMonth++;
			renderDate();
			displayCalender();
		}
	});
}
// het xu ly lich

//popup cap nhat trang thai ung vien
$(".change_candidate_status").click(function () {
	if ($(this).parent().find(".menu_status").is(":hidden")) {
		$(this).parent().find(".menu_status").show();
		$(this).find(".img").html('<img src="/images/arrow_up.svg" alt="mui ten">');
	} else {
		$(this).parent().find(".menu_status").hide();
		$(this)
			.find(".img")
			.html('<img src="/images/arrow_down.svg" alt="mui ten">');
	}
});

function change_worker_point_status(id, status) {
	// alert(new_id + ',' + status);
	$.ajax({
		url: "/Handles/Home/AccountController/change_worker_point_status",
		type: "POST",
		data: {
			id: id,
			status: status,
		},
		success: function () {},
	});
}

$(document).on("click", ".candidate_status .menu_status .accept", function () {
	$(this).parent().prev().find(".text").html("???? ch???p nh???n");
	$(this).parent().prev().find(".text").removeClass("refuse");
	$(this).parent().prev().find(".text").removeClass("not_connect");
	$(this).parent().prev().find(".text").addClass("accept");
	$(this).parent().hide();
	$(this)
		.parent()
		.prev()
		.find(".img")
		.html('<img src="/images/arrow_down.svg" alt="mui ten">');
	$(this).parent().children().removeClass("selected");
	$(this).addClass("selected");
	worker_point_id = $(this).parent().attr("id");
	worker_point_status = $(this).val();
	change_worker_point_status(worker_point_id, worker_point_status);
});

$(document).on("click", ".candidate_status .menu_status .refuse", function () {
	$(this).parent().prev().find(".text").html("???? t??? ch???i");
	$(this).parent().prev().find(".text").removeClass("accept");
	$(this).parent().prev().find(".text").removeClass("not_connect");
	$(this).parent().prev().find(".text").addClass("refuse");
	$(this).parent().hide();
	$(this)
		.parent()
		.prev()
		.find(".img")
		.html('<img src="/images/arrow_down.svg" alt="mui ten">');
	$(this).parent().children().removeClass("selected");
	$(this).addClass("selected");
	worker_point_id = $(this).parent().attr("id");
	worker_point_status = $(this).val();
	change_worker_point_status(worker_point_id, worker_point_status);
});

$(document).on(
	"click",
	".candidate_status .menu_status .not_connect",
	function () {
		$(this).parent().prev().find(".text").html("Kh??ng li??n l???c ???????c");
		$(this).parent().prev().find(".text").removeClass("refuse");
		$(this).parent().prev().find(".text").removeClass("accept");
		$(this).parent().prev().find(".text").addClass("not_connect");
		$(this).parent().hide();
		$(this)
			.parent()
			.prev()
			.find(".img")
			.html('<img src="/images/arrow_down.svg" alt="mui ten">');
		$(this).parent().children().removeClass("selected");
		$(this).addClass("selected");
		worker_point_id = $(this).parent().attr("id");
		worker_point_status = $(this).val();
		change_worker_point_status(worker_point_id, worker_point_status);
	}
);
//het popup cap nhat trang thai ung vien

//popup cap nhat trang thai tin tuyen dung
$(".change_post_status").click(function () {
	if ($(this).parent().find(".menu_status").is(":hidden")) {
		$(".menu_status").hide();
		$(this).parent().find(".menu_status").show();
		$(this).find(".img").html('<img src="/images/arrow_up.svg" alt="mui ten">');
	} else {
		$(this).parent().find(".menu_status").hide();
		$(this)
			.find(".img")
			.html('<img src="/images/arrow_down.svg" alt="mui ten">');
	}
});

function change_new_status(new_id, status) {
	// alert(new_id + ',' + status);
	$.ajax({
		url: "/change-new-status",
		type: "POST",
		data: {
			id: new_id,
			new_status: status,
		},
		success: function () {},
	});
}

$(document).on("click", ".post_status .menu_status .end", function () {
	$(this).parent().prev().find(".text").html($(this).html());
	$(this).parent().prev().find(".text").removeClass("done");
	$(this).parent().prev().find(".text").removeClass("working");
	$(this).parent().prev().find(".text").addClass("end");
	$(this).parent().hide();
	$(this)
		.parent()
		.prev()
		.find(".img")
		.html('<img src="/images/arrow_down.svg" alt="mui ten">');
	$(this).parent().children().removeClass("selected");
	$(this).addClass("selected");
	new_id = $(this).parent().attr("id");
	new_status = $(this).val();
	change_new_status(new_id, new_status);
});

$(document).on("click", ".post_status .menu_status .done", function () {
	$(this).parent().prev().find(".text").html($(this).html());
	$(this).parent().prev().find(".text").removeClass("end");
	$(this).parent().prev().find(".text").removeClass("working");
	$(this).parent().prev().find(".text").addClass("done");
	$(this).parent().hide();
	$(this)
		.parent()
		.prev()
		.find(".img")
		.html('<img src="/images/arrow_down.svg" alt="mui ten">');
	$(this).parent().children().removeClass("selected");
	$(this).addClass("selected");
	new_id = $(this).parent().attr("id");
	new_status = $(this).val();
	change_new_status(new_id, new_status);
});

$(document).on("click", ".post_status .menu_status .finding", function () {
	$(this).parent().prev().find(".text").html($(this).html());
	$(this).parent().prev().find(".text").removeClass("done");
	$(this).parent().prev().find(".text").removeClass("end");
	$(this).parent().prev().find(".text").addClass("working");
	$(this).parent().hide();
	$(this)
		.parent()
		.prev()
		.find(".img")
		.html('<img src="/images/arrow_down.svg" alt="mui ten">');
	$(this).parent().children().removeClass("selected");
	$(this).addClass("selected");
	new_id = $(this).parent().attr("id");
	new_status = $(this).val();
	change_new_status(new_id, new_status);
});
//het popup cap nhat trang thai tin tuyen dung

//popup cap nhat trang thai cong viec
$(".change_job_status").click(function () {
	if ($(this).parent().find(".menu_status").is(":hidden")) {
		$(".menu_status").hide();
		$(this).parent().find(".menu_status").show();
		$(this).find(".img").html('<img src="/images/arrow_up.svg" alt="mui ten">');
	} else {
		$(this).parent().find(".menu_status").hide();
		$(this)
			.find(".img")
			.html('<img src="/images/arrow_down.svg" alt="mui ten">');
	}
});

function change_work_status(apply_id, work_status) {
	// alert(new_id + ',' + status);
	$.ajax({
		url: "/Handles/Home/AccountController/change_work_status",
		type: "POST",
		data: {
			id: apply_id,
			work_status: work_status,
		},
		success: function () {
			if (work_status == 2) {
				html = `<button class="open_rate_btn" onclick="rate_action(${apply_id})"><img src="/images/employee_rate.svg" alt="danh gia"></button>`;
				$("#job_rate_" + apply_id).html(html);
			} else {
				$("#job_rate_" + apply_id).html(
					'<button class="open_rate_btn" disabled><img src="/images/employee_rate_disable.svg" alt="danh gia"></button>'
				);
			}
		},
	});
}

$(document).on("click", ".job_status .menu_status .not_start", function () {
	$(this).parent().prev().find(".text").html($(this).html());
	$(this).parent().prev().find(".text").removeClass("done");
	$(this).parent().prev().find(".text").removeClass("working");
	$(this).parent().prev().find(".text").addClass("not_start");
	$(this).parent().hide();
	$(this)
		.parent()
		.prev()
		.find(".img")
		.html('<img src="/images/arrow_down.svg" alt="mui ten">');
	$(this).parent().children().removeClass("selected");
	$(this).addClass("selected");
	apply_id = $(this).parent().attr("id");
	work_status = $(this).val();
	change_work_status(apply_id, work_status);
});

$(document).on("click", ".job_status .menu_status .done", function () {
	$(this).parent().prev().find(".text").html($(this).html());
	$(this).parent().prev().find(".text").removeClass("not_start");
	$(this).parent().prev().find(".text").removeClass("working");
	$(this).parent().prev().find(".text").addClass("done");
	$(this).parent().hide();
	$(this)
		.parent()
		.prev()
		.find(".img")
		.html('<img src="/images/arrow_down.svg" alt="mui ten">');
	$(this).parent().children().removeClass("selected");
	$(this).addClass("selected");
	apply_id = $(this).parent().attr("id");
	work_status = $(this).val();
	change_work_status(apply_id, work_status);
});

$(document).on("click", ".job_status .menu_status .working", function () {
	$(this).parent().prev().find(".text").html($(this).html());
	$(this).parent().prev().find(".text").removeClass("done");
	$(this).parent().prev().find(".text").removeClass("not_start");
	$(this).parent().prev().find(".text").addClass("working");
	$(this).parent().hide();
	$(this)
		.parent()
		.prev()
		.find(".img")
		.html('<img src="/images/arrow_down.svg" alt="mui ten">');
	$(this).parent().children().removeClass("selected");
	$(this).addClass("selected");
	apply_id = $(this).parent().attr("id");
	work_status = $(this).val();
	change_work_status(apply_id, work_status);
});
//het popup cap nhat trang thai cong viec

//popup ghi chu
$(".candidate_note_btn").click(function (e) {
	if ($(this).next().is(":hidden")) {
		$(".popup_note").hide();
		$(this).next().show();
	} else {
		$(this).next().hide();
	}
});

$(document).click(function (e) {
	// alert(e.target);
	$(".candidate_note_btn").each(function (c) {
		// alert($(this).target);
		if (
			!$(this).is(e.target) &&
			$(this).has(e.target).length === 0 &&
			!$(this).next().is(e.target) &&
			$(this).next().has(e.target).length === 0
		) {
			$(this).next().hide();
		}
	});
});

function clear_note(id) {
	$("#note_" + id).val("");
	update_note(id);
}

function update_note(id) {
	note_content = $("#note_" + id).val();
	$.ajax({
		url: "/Handles/Home/AccountController/update_note",
		type: "POST",
		data: {
			id: id,
			note: note_content,
		},
		success: function () {
			alert("???? l??u ghi ch??");
			$("#popup_note_" + id).hide();
		},
	});
}
//het popup ghi chu

//popup danh gia
function get_rate() {
	$('[name="star"]').each(function () {
		if ($(this).is(":checked")) {
			rate_star = $(this).val();
		}
	});
	rate_content = $("#rate_content").val();
	rate = {
		rate_star: rate_star,
		rate_content: rate_content,
	};
	return rate;
}

function submit_rate(id) {
	rate = get_rate();
	rate_content = rate["rate_content"];
	rate_star = rate["rate_star"];
	$.ajax({
		url: "/Handles/Home/AccountController/submit_rate",
		type: "POST",
		data: {
			id: id,
			rate_star: rate_star,
			rate_content: rate_content,
		},
		success: function () {
			$(".popup_rate").hide();
			$(".popup_rate_success").show();
			html = `<span class="score">
			<div class="score-wrap">
				<span class="stars-active"
					style="width:${Math.round((rate_star / 5) * 100)}%">
					<i class="fa fa-star"
						aria-hidden="true"></i>
					<i class="fa fa-star"
						aria-hidden="true"></i>
					<i class="fa fa-star"
						aria-hidden="true"></i>
					<i class="fa fa-star"
						aria-hidden="true"></i>
					<i class="fa fa-star"
						aria-hidden="true"></i>
				</span>
				<span class="stars-inactive">
					<i class="fa fa-star"
						aria-hidden="true"></i>
					<i class="fa fa-star"
						aria-hidden="true"></i>
					<i class="fa fa-star"
						aria-hidden="true"></i>
					<i class="fa fa-star"
						aria-hidden="true"></i>
					<i class="fa fa-star"
						aria-hidden="true"></i>
				</span>
			</div>
		</span>`;
			$("#job_rate_" + id).html(html);
		},
	});
}

function rate_action(id) {
	if ($(".popup_rate").is(":hidden")) {
		$(".popup_rate").show();
		$(".popup_rate #rate").unbind();
		$(".popup_rate #rate").click(function () {
			submit_rate(id);
		});
	}
}

function close_rate_success() {
	$(".popup_rate_success").hide();
}

$(document).click(function (e) {
	// ?????i t?????ng container ch???a popup
	var container = $(".popup_rate .popup_content");
	// alert($(".popup_rate").is(":hidden"));

	// N???u click b??n ngo??i ?????i t?????ng container th?? ???n n?? ??i
	if (
		!$(".open_rate_btn").is(e.target) &&
		$(".open_rate_btn").has(e.target).length === 0 &&
		!container.is(e.target) &&
		container.has(e.target).length === 0
	) {
		container.parent().parent().hide();
	}
});
//het popup danh gia

function renew_post(id) {
	$.ajax({
		url: "/Handles/Home/AccountController/renew_post",
		type: "POST",
		data: {
			id: id,
		},
		dataType: "JSON",
		success: function (status) {
			if (status) {
				alert("L??m m???i tin th??nh c??ng!");
			} else {
				alert("???? c?? l???i x???y ra!");
			}
		},
	});
}

// c???p nh???t ???nh ?????i di???n
const ipnFileElement = document.querySelector("#change_avata");
const validImageTypes = ["image/gif", "image/jpeg", "image/png"];

ipnFileElement.addEventListener("change", function (e) {
	const files = e.target.files;
	const file = files[0];
	const fileType = file["type"];
	const filesize = 2097152;
	if (!validImageTypes.includes(fileType)) {
		alert("???nh kh??ng ????ng ?????nh d???ng");
		return;
	}
	if (file.size > filesize) {
		alert("K??ch c??? ???nh qu?? l???n!");
		document.getElementById("change_avata").value = "";
		return;
	}
	var user_data = new FormData();
	user_data.append("image", file);
	$.ajax({
		url: "/update-company-image",
		cache: false,
		contentType: false,
		processData: false,
		type: "POST",
		data: user_data,
		success: function () {
			alert("C???p nh???t ???nh th??nh c??ng!");
			const fileReader = new FileReader();
			fileReader.readAsDataURL(file);
			fileReader.onload = function () {
				const url = fileReader.result;
				document.getElementById(
					"show_avata"
				).innerHTML = `<img src="${url}" alt="${file.name}" class="preview-img" />`;
			};
		},
	});
});
=======

function reset_form_post() {
    $('.block_post input').val(function() {
        return $(this).defaultValue;
    });
    $('.block_post textarea').val('');
    $(".block_post select").prop('selectedIndex', 0).trigger('change');
    age_range.setValues(25, 60);
}
// het nut reset form dang bai

function submit_post() {
    if (form_post_validate()) {
        $('.popup_post_success').show();
    }
}
//popup dang tin thanh cong
function close_post_success() {
    $('.popup_post_success').hide();
}
//het popup dang tin thanh cong


// validate thong tin ca nhan
function removeAscent(str) {
    if (str === null || str === undefined) return str;
    str = str.toLowerCase();
    str = str.replace(/??|??|???|???|??|??|???|???|???|???|???|??|???|???|???|???|???/g, "a");
    str = str.replace(/??|??|???|???|???|??|???|???|???|???|???/g, "e");
    str = str.replace(/??|??|???|???|??/g, "i");
    str = str.replace(/??|??|???|???|??|??|???|???|???|???|???|??|???|???|???|???|???/g, "o");
    str = str.replace(/??|??|???|???|??|??|???|???|???|???|???/g, "u");
    str = str.replace(/???|??|???|???|???/g, "y");
    str = str.replace(/??/g, "d");
    str = str.replace(/\s/g, '');
    return str;
}

function validate_profile() {
    $('#error_profile_email').html('');
    $('#error_profile_phone').html('');
    $('#error_profile_name').html('');
    $('#error_profile_birthday').html('');
    $('#error_profile_province').html('');
    $('#error_profile_district').html('');
    $('#error_profile_address').html('');
    var name_format = /^[a-zA-Z!@#\$%\^\&*\)\(+=._-]{2,}$/g;
    var phone_format = /((0)+([0-9]{9})\b)/g;
    var mail_format = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    flag = 1;

    if ($("#profile_email").val().trim() == "") {
        $('#error_profile_email').html('Email kh??ng ???????c ????? tr???ng!');
        flag = 0;
    } else {
        if (!$("#profile_email").val().match(mail_format)) {
            $('#error_profile_email').html('Email kh??ng ????ng ?????nh d???ng!');
            flag = 0;
        }
    }
    if ($("#profile_name").val().trim() == "") {
        $('#error_profile_name').html('H??? t??n kh??ng ???????c ????? tr???ng!');
        flag = 0;
    } else {
        if (!removeAscent($("#profile_name").val()).match(name_format)) {
            $('#error_profile_name').html('H??? t??n kh??ng ????ng ?????nh d???ng!');
            flag = 0;
        }
    }
    if ($("#profile_phone").val().trim() == "") {
        $('#error_profile_phone').html('S??? ??i???n tho???i kh??ng ???????c ????? tr???ng!');
        flag = 0;
    } else {
        if (!$("#profile_phone").val().match(phone_format)) {
            $('#error_profile_phone').html('S??? ??i???n tho???i kh??ng ????ng ?????nh d???ng!');
            flag = 0;
        }
    }
    if ($("#profile_birthday").val().trim() == "") {
        $('#error_profile_birthday').html('Ng??y sinh kh??ng ???????c ????? tr???ng!');
        flag = 0;
    }
    if ($("#profile_province").val().trim() == "") {
        $('#error_profile_province').html('T???nh/Th??nh ph??? kh??ng ???????c ????? tr???ng!');
        flag = 0;
    }
    if ($("#profile_district").val().trim() == "") {
        $('#error_profile_district').html('Qu???n/Huy???n kh??ng ???????c ????? tr???ng!');
        flag = 0;
    }
    if ($("#profile_address").val().trim() == "") {
        $('#error_profile_address').html('?????a ch??? c??? th??? kh??ng ???????c ????? tr???ng!');
        flag = 0;
    }

}

function update_profile() {
    validate_profile()
}
// het validate th??ng tin c?? nh??n



// het dang tin

// const ipnFileElement = document.querySelector('#avata');
// const validImageTypes = ['image/gif', 'image/jpeg', 'image/png'];

// ipnFileElement.addEventListener('change', function(e) {
//     const files = e.target.files
//     const file = files[0]
//     const fileType = file['type']

//     if (!validImageTypes.includes(fileType)) {
//         alert('???nh kh??ng ????ng ?????nh d???ng')
//         return
//     }

//     const fileReader = new FileReader()
//     fileReader.readAsDataURL(file)

//     fileReader.onload = function() {
//         const url = fileReader.result;
//         document.getElementById('show_avata').innerHTML = `<img src="${url}" alt="${file.name}" class="preview-img" />`;
//     }
// })



// hover cho cong viec da luu
$(".employee").hover(function() {
    this.querySelector('.icon_location').innerHTML = `<img src="/images/location_icon_hover.svg" alt="dia chi">`;
    this.querySelector('.icon_job_location').innerHTML = `<img src="/images/job_location_icon_hover.svg" alt="o cung chu nha">`;
    this.querySelector('.icon_birthday').innerHTML = `<img src="/images/birthday_icon_hover.svg" alt="tuoi">`;
    this.querySelector('.icon_exp').innerHTML = `<img src="/images/exp_icon_hover.svg" alt="kinh nghiem">`;
    this.querySelector('.icon_job_tag').innerHTML = `<img src="/images/job_tag_icon_hover.svg" alt="them vao yeu thich">`;
}, function() {
    this.querySelector('.icon_location').innerHTML = `<img src="/images/location_icon.svg" alt="dia chi">`;
    this.querySelector('.icon_job_location').innerHTML = `<img src="/images/job_location_icon.svg" alt="o cung chu nha">`;
    this.querySelector('.icon_birthday').innerHTML = `<img src="/images/birthday_icon.svg" alt="tuoi">`;
    this.querySelector('.icon_exp').innerHTML = `<img src="/images/exp_icon.svg" alt="kinh nghiem">`;
    this.querySelector('.icon_job_tag').innerHTML = `<img src="/images/job_tag_icon.svg" alt="them vao yeu thich">`;
});
//het hover cho cong viec da luu





// t???m ???n box ????? test
// $('.box_dynamic').hide();
// $('.box_right').hide();
// $('.block_general').hide();
// $('.block_post').show();


//xu ly lich
let monEle = document.querySelector('#month');
let yearEle = document.querySelector('#year');
let currentMonth = new Date().getMonth();
let currentYear = new Date().getFullYear();

function displayCalender() {
    let currentMonthName = new Date(currentYear, currentMonth).toLocaleString('en-us', { month: 'long' });
    monEle.innerHTML = currentMonthName;
    yearEle.innerHTML = currentYear;
}
window.onload = displayCalender;

function getDayInMonth() {
    return new Date(currentYear, currentMonth + 1, 0).getDate();
}

function getDayInPrevMonth() {
    if (currentMonth == 0) {
        month = 11;
        year = currentYear - 1;
        return new Date(year, month + 1, 0).getDate();
    } else {
        month = currentMonth - 1;
        year = currentYear;
        return new Date(year, month + 1, 0).getDate();
    }
}


function getStartDayInMonth() {
    return new Date(currentYear, currentMonth, 1).getDay();
}

function activeCurrentDay(day) {
    let day1 = new Date().toDateString();
    let day2 = new Date(currentYear, currentMonth, day).toDateString();
    return day1 == day2 ? 'active' : '';
}

let dateEle = document.querySelector('.day_box');

function renderDate() {
    displayCalender();
    let dayInPrevMonth = getDayInPrevMonth();
    let daysInMonth = getDayInMonth();
    let startDay = getStartDayInMonth();
    dateEle.innerHTML = "";
    for (let i = 0; i < startDay; i++) {
        dateEle.innerHTML += `<button class="disable">${Number(dayInPrevMonth)-Number(startDay)+i+1}</button>`;
    }
    for (let i = 0; i < daysInMonth; i++) {
        dateEle.innerHTML += `<button class="enable  ${activeCurrentDay(i+1)}">${i+1}</button>`;
    }
    if (daysInMonth + startDay <= 35) {
        for (let i = 0; i < (35 - daysInMonth - startDay); i++) {
            dateEle.innerHTML += `<button class="disable ">${i+1}</button>`;
        }
    } else {
        for (let i = 0; i < (42 - daysInMonth - startDay); i++) {
            dateEle.innerHTML += `<button class="disable ">${i+1}</button>`;
        }
    }
}

window.onload = renderDate;

$('#prev_month').click(function() {
    if (currentMonth == 0) {
        currentMonth = 11;
        currentYear--;
        renderDate();
    } else {
        currentMonth--;
        renderDate();
    }
})

$('#next_month').click(function() {
    if (currentMonth == 11) {
        currentMonth = 0;
        currentYear++;
        renderDate();
        displayCalender();
    } else {
        currentMonth++;
        renderDate();
        displayCalender();
    }
})

// het xu ly lich

//popup cap nhat trang thai ung vien
$('.change_candidate_status').click(function() {
    if ($(this).parent().find('.menu_status').is(':hidden')) {
        $(this).parent().find('.menu_status').show();
        $(this).find('.img').html('<img src="/images/arrow_up.svg" alt="mui ten">');
    } else {
        $(this).parent().find('.menu_status').hide();
        $(this).find('.img').html('<img src="/images/arrow_down.svg" alt="mui ten">');
    }
})

$(document).on('click', '.menu_status .accept', function() {
    $(this).parent().prev().find('.text').html('???? ch???p nh???n');
    $(this).parent().prev().find('.text').removeClass('refuse');
    $(this).parent().prev().find('.text').removeClass('not_connect');
    $(this).parent().prev().find('.text').addClass('accept')
    $(this).parent().hide();
    $(this).parent().prev().find('.img').html('<img src="/images/arrow_down.svg" alt="mui ten">');
    $(this).parent().children().removeClass('selected');
    $(this).addClass('selected');
})

$(document).on('click', '.menu_status .refuse', function() {
    $(this).parent().prev().find('.text').html('???? t??? ch???i');
    $(this).parent().prev().find('.text').removeClass('accept');
    $(this).parent().prev().find('.text').removeClass('not_connect');
    $(this).parent().prev().find('.text').addClass('refuse')
    $(this).parent().hide();
    $(this).parent().prev().find('.img').html('<img src="/images/arrow_down.svg" alt="mui ten">');
    $(this).parent().children().removeClass('selected');
    $(this).addClass('selected');
})

$(document).on('click', '.menu_status .not_connect', function() {
    $(this).parent().prev().find('.text').html('Kh??ng li??n l???c ???????c');
    $(this).parent().prev().find('.text').removeClass('refuse');
    $(this).parent().prev().find('.text').removeClass('accept');
    $(this).parent().prev().find('.text').addClass('not_connect')
    $(this).parent().hide();
    $(this).parent().prev().find('.img').html('<img src="/images/arrow_down.svg" alt="mui ten">');
    $(this).parent().children().removeClass('selected');
    $(this).addClass('selected');
})


//het popup cap nhat trang thai ung vien

//popup cap nhat trang thai tin tuyen dung
$('.change_post_status').click(function() {
    if ($(this).parent().find('.menu_status').is(':hidden')) {
        $('.menu_status').hide();
        $(this).parent().find('.menu_status').show();
        $(this).find('.img').html('<img src="/images/arrow_up.svg" alt="mui ten">');
    } else {
        $(this).parent().find('.menu_status').hide();
        $(this).find('.img').html('<img src="/images/arrow_down.svg" alt="mui ten">');
    }
})

$(document).on('click', '.menu_status .end', function() {
    $(this).parent().prev().find('.text').html($(this).html());
    $(this).parent().prev().find('.text').removeClass('done');
    $(this).parent().prev().find('.text').removeClass('working');
    $(this).parent().prev().find('.text').addClass('end')
    $(this).parent().hide();
    $(this).parent().prev().find('.img').html('<img src="/images/arrow_down.svg" alt="mui ten">');
    $(this).parent().children().removeClass('selected');
    $(this).addClass('selected');
})

$(document).on('click', '.menu_status .done', function() {
    $(this).parent().prev().find('.text').html($(this).html());
    $(this).parent().prev().find('.text').removeClass('end');
    $(this).parent().prev().find('.text').removeClass('working');
    $(this).parent().prev().find('.text').addClass('done')
    $(this).parent().hide();
    $(this).parent().prev().find('.img').html('<img src="/images/arrow_down.svg" alt="mui ten">');
    $(this).parent().children().removeClass('selected');
    $(this).addClass('selected');
})

$(document).on('click', '.menu_status .finding', function() {
    $(this).parent().prev().find('.text').html($(this).html());
    $(this).parent().prev().find('.text').removeClass('done');
    $(this).parent().prev().find('.text').removeClass('end');
    $(this).parent().prev().find('.text').addClass('working')
    $(this).parent().hide();
    $(this).parent().prev().find('.img').html('<img src="/images/arrow_down.svg" alt="mui ten">');
    $(this).parent().children().removeClass('selected');
    $(this).addClass('selected');
})


//het popup cap nhat trang thai tin tuyen dung

//popup cap nhat trang thai cong viec
$('.change_job_status').click(function() {
    if ($(this).parent().find('.menu_status').is(':hidden')) {
        $('.menu_status').hide();
        $(this).parent().find('.menu_status').show();
        $(this).find('.img').html('<img src="/images/arrow_up.svg" alt="mui ten">');
    } else {
        $(this).parent().find('.menu_status').hide();
        $(this).find('.img').html('<img src="/images/arrow_down.svg" alt="mui ten">');
    }
})

$(document).on('click', '.menu_status .not_start', function() {
    $(this).parent().prev().find('.text').html($(this).html());
    $(this).parent().prev().find('.text').removeClass('done');
    $(this).parent().prev().find('.text').removeClass('working');
    $(this).parent().prev().find('.text').addClass('not_start')
    $(this).parent().hide();
    $(this).parent().prev().find('.img').html('<img src="/images/arrow_down.svg" alt="mui ten">');
    $(this).parent().children().removeClass('selected');
    $(this).addClass('selected');
})

$(document).on('click', '.menu_status .done', function() {
    $(this).parent().prev().find('.text').html($(this).html());
    $(this).parent().prev().find('.text').removeClass('not_start');
    $(this).parent().prev().find('.text').removeClass('working');
    $(this).parent().prev().find('.text').addClass('done')
    $(this).parent().hide();
    $(this).parent().prev().find('.img').html('<img src="/images/arrow_down.svg" alt="mui ten">');
    $(this).parent().children().removeClass('selected');
    $(this).addClass('selected');
})

$(document).on('click', '.menu_status .working', function() {
    $(this).parent().prev().find('.text').html($(this).html());
    $(this).parent().prev().find('.text').removeClass('done');
    $(this).parent().prev().find('.text').removeClass('not_start');
    $(this).parent().prev().find('.text').addClass('working')
    $(this).parent().hide();
    $(this).parent().prev().find('.img').html('<img src="/images/arrow_down.svg" alt="mui ten">');
    $(this).parent().children().removeClass('selected');
    $(this).addClass('selected');
})


//het popup cap nhat trang thai cong viec

//popup ghi chu
$('.candidate_note_btn').click(function() {
        if ($(this).next().is(':hidden')) {
            $('.popup_note').hide();
            $(this).next().show();
        } else {
            $(this).next().hide();
        }
    })
    //het popup ghi chu

//popup danh gia


function rate_action(id) {
    if ($('.popup_rate').is(':hidden')) {
        $('.popup_rate').show();
        $('.popup_rate #rate').unbind();
        $('.popup_rate #rate').click(function() {
            alert(id);
            $('.popup_rate').hide();
            $('.popup_rate_success').show();
        })
    }
}

function close_rate_success() {
    $('.popup_rate_success').hide();
}

$(document).click(function(e) {
    // ?????i t?????ng container ch???a popup
    var container = $(".popup_rate .popup_content");
    // alert($(".popup_rate").is(":hidden"));

    // N???u click b??n ngo??i ?????i t?????ng container th?? ???n n?? ??i
    if (!$('.open_rate_btn').is(e.target) && $('.open_rate_btn').has(e.target).length === 0 && !container.is(e.target) && container.has(e.target).length === 0) {
        container.parent().parent().hide();
    }
});


//het popup danh gia
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
