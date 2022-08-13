
    <!-- Bat dau noi dung -->
    <div class="main_content">
        <!-- bat dau box left -->
        <div class="box_left">
            <div class="profile">
			<div class="avt">
				<div class="box_img">
					<div class="avata" id="show_avata">
						<? if ($company['image'] != '') { ?>
							<img src="<?= rewirte_company_img_href($company['id'], $company['image']) ?>" alt="anh dai dien">
						<? } else { ?>
							<img src="/images/logo_vieclam123.png" alt="anh dai dien">
						<? } ?>
					</div>

				</div>
				<button type="button"><img src="/images/upload_img.svg" alt="tai anh len">
					<input id="change_avata" type="file">
				</button>
			</div>
				<div class="info">
				<p class="name"><?=$company['name']?></p>
				<p class="id">ID: <?=$company['id']?></p>
				<p class="point">Điểm xem miễn phí hôm nay: <?=$company['point_free']+$company['point_pay']?></p>
			</div>
        </div>
        <div class="menu_manager">
            <div class="btn_post">
                <button id="new_post">Đăng tin tuyển dụng</button>
            </div>
            <button id="general">Quản lý chung</button>
            <button id="post" class="active">Đăng tin tuyển giúp việc</button>
            <button id="list_post">Tin đã đăng</button>
            <button id="list_apply">Người giúp việc đã ứng tuyển</button>
            <button id="list_accept">Người giúp việc đã nhận việc</button>
            <button id="list_save">Người giúp việc đã lưu</button>
            <button id="list_from_filter">Người giúp việc từ điểm lọc</button>
            <button id="profile_detail">Thông tin cá nhân</button>
            <button id="change_password">Đổi mật khẩu</button>
            <button onclick="logout_action()" id="log_out">Đăng xuất</button>
        </div>
        <div class="btn_collapse">
            <button type="button" id="collapse_profile"><img src="/images/btn_collapse_col.svg" alt="thu gon"></button>
        </div>
    </div>
    <!-- het box left -->
    <div class="box_dynamic">
    <!-- dang tin -->
    <div class="block_post">
        <div class="box_content">
            <p class="title">Đăng tin tuyển giúp việc</p>
            <form>
                <div class="form_input">
                    <div class="row">
                        <div class="center">
                            <label for="title">
                                <span>Tiêu đề</span>
                                <span class="warning">*</span>
                            </label>
                            <input type="text" name="title" id="title" placeholder="Nhập tiêu đề tin tuyển dụng">
                            <p class="warning" id="error_title"></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="center">
                            <label for="job_style">
                                    <span>Loại hình dịch vụ</span>
                                    <span class="warning">*</span>
                                </label>
                            <select name="job_style" id="job_style">
                                    <option></option>
                                    <?foreach($list_job_style as $job){?>
										<option value="<?=$job['id']?>"><?=$job['content']?></option>
										<?}?>
                                </select>
                            <p class="warning" id="error_job_style"></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="center">
                            <label for="job_style">
                            <span>Tuổi</span>
                            <span class="warning">*</span>
                        </label>
                            <div id="menu_age" style="width:100%">
                                <input class="range_age" type="text" id="range_age">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="left">
                            <label for="experience">
                                    <span>Kinh nghiệm</span>
                                    <span class="warning">*</span>
                                </label>
                            <select name="experience" id="experience">
                                    <option></option>
                                    <option value="0">Chưa có kinh nghiệm</option>
                                    <option value="1">Dưới 1 năm</option>
                                    <option value="2">1-2 năm</option>
                                    <option value="3">3-5 năm</option>
                                    <option value="4">6-9 năm</option>
                                    <option value="5">Trên 10 năm</option>
                                </select>
                            <p class="warning" id="error_experience"></p>
                        </div>
                        <div class="right">
                            <label for="education">
                                    <span>Trình độ học vấn</span>
                                    <span class="warning">*</span>
                                </label>
                            <select name="education" id="education">
                                    <option value="" selected></option>
									<option value="0">Không có bằng cấp</option>
                                    <option value="1">THCS</option>
                                    <option value="2">THPT</option>
                                    <option value="3">Cao đẳng</option>
                                    <option value="4">Đại học</option>
                                </select>
                            <p class="warning" id="error_education"></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="left">
                            <label for="province">
                                    <span>Tỉnh/Thành phố</span>
                                    <span class="warning">*</span>
                                </label>
                            <select name="province" id="province">
                                    <option value="" selected></option>
                                    <?foreach($list_city as $city){?>
										<option value="<?=$city['cit_id']?>"><?=$city['cit_name']?></option>
										<?}?>
                                </select>
                            <p class="warning" id="error_province"></p>
                        </div>
                        <div class="right">
                            <label for="district">
                                    <span>Quận/Huyện</span>
                                    <span class="warning">*</span>
                                </label>
                            <select name="district" id="district">
                                    <option value="" selected></option>
                                </select>
                            <p class="warning" id="error_district"></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="left">
                            <label for="address">
                                    <span>Địa chỉ cụ thể</span>
                                    <span class="warning">*</span>
                                </label>
                            <input type="text" name="address" id="address" placeholder="Nhập địa chỉ cụ thể">
                            <p class="warning" id="error_address"></p>
                        </div>
                        <div class="right">
                            <label for="stay">
                                    <span>Ở cùng chủ nhà</span>
                                    <span class="warning">*</span>
                                </label>
                            <select name="stay" id="stay">
							<?foreach($list_work_type as $work_type){?>
										<option value="<?=$work_type['id']?>"><?=$work_type['work_name']?></option>
										<?}?>
                                </select>
                            <p class="warning" id="error_district"></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="center">
                            <label for="address">
                                <span>Mức lương</span>
                                <span class="warning">*</span>
                            </label>
                            <div class="sal_opt">
                                <input type="radio" name="sal_option" id="static_sal_btn" value="0" checked>
                                <input type="radio" name="sal_option" value="1" id="dynamic_sal_btn">
                                <label for="static_sal_btn" class="option static_sal_btn">
                                    <span>Cố định</span>
                                </label>
                                <label for="dynamic_sal_btn" class="option dynamic_sal_btn">
                                    <span>Ước lượng</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row_sal dynamic_sal" id="sal_dynamic" style="display: none;">
                        <div class="left" id="dynamic">
                            <div class="sal_from">
                                <label for="sal_from">Từ</label>
                                <div>
                                    <input type="text" name="sal_from" id="sal_from">
                                    <div class="text"><span>VND</span></div>
                                </div>
                            </div>
                            <div class="sal_to">
                                <label for="sal_to">Đến</label>
                                <div>
                                    <input type="text" name="sal_to" id="sal_to">
                                    <div class="text"><span>VND</span></div>
                                </div>
                            </div>
                        </div>
                        <div class="middle">
                            /
                        </div>
                        <div class="right">
                            <select name="sal_time" id="sal_time_dynamic">
                                    <option value="3">Giờ</option>
                                    <option value="2">Tuần</option>
                                    <option value="1" selected>Tháng</option>
                                </select>
                        </div>
                    </div>
                    <div class="row_sal static_sal" id="sal_static">
                        <div class="left" id="static">
                            <input type="text" name="sal" id="sal">
                            <div class="text"><span>VND</span></div>
                        </div>
                        <div class="middle">
                            /
                        </div>
                        <div class="right">
                            <select name="sal_time" id="sal_time_static">
                                    <option value="3">Giờ</option>
                                    <option value="2">Tuần</option>
                                    <option value="1" selected>Tháng</option>
                                </select>
                        </div>
                    </div>
                    <p class="warning" id="error_sal"></p>
                    <div class="row">
                        <div class="left">
                            <label for="day_start">
                                <span>Ngày bắt đầu làm việc</span>
                                <span class="warning">*</span>
                            </label>
                            <input type="text" placeholder="dd/mm/yyy"
                    onfocus="(this.type='date')" name="day_start" id="day_start">
                            <p class="warning" id="error_day_start"></p>
                        </div>
                        <div class="right">
                            <label for="day_close">
                                    <span>Thời hạn nhận việc</span>
                                    <span class="warning">*</span>
                                </label>
                            <input type="text" placeholder="dd/mm/yyy"
                    onfocus="(this.type='date')" name="day_close" id="day_close">
                            <p class="warning" id="error_day_close"></p>
                        </div>
                    </div>
                    <!-- lich lam viec -->
                    <div class="row">
                        <div class="text">
                            <span><img src="/images/calendar_icon.svg" alt="lich lam viec"></span>
                            <span>Lịch làm việc</span>
                            <span class="warning">*</span>
                        </div>
                    </div>
                    <p class="warning" id="error_schedule"></p>
                    <div class="table_schedule">
                        <div class="schedule_row" id="t2">
                            <div class="col_1">
                                <label class="container">
                                        <div class="date">T2</div>
                                        <input type="checkbox" class="checkbox_schedule" checked="checked" onchange="hide_schedule_row('t2')">
                                        <span class="checkmark"></span>
                                    </label>
                            </div>
                            <div class="col_2 col_time" id="t2_am">
                                <span>Từ</span>
                                <input type="text" class="time start" value="07:00">
                                <span>Đến</span>
                                <input type="text" class="time end" value="11:00">
                                <button id="add_t2" type="button" onclick="add_schedule_row('t2')"><img src="/images/add_schedule.svg" alt="them lich"></button>
                            </div>
                            <div class="col_3 col_time" id="t2_pm">
                                <span>Từ</span>
                                <input type="text" class="time start" value="18:00">
                                <span>Đến</span>
                                <input type="text" class="time end" value="21:00">
                                <button type="button" id="minus_t2" onclick="minus_schedule_row('t2')"><img src="/images/clear_schedule.svg" alt="xoa lich"></button>
                            </div>
                        </div>
                        <div class="schedule_row" id="t3">
                            <div class="col_1">
                                <label class="container">
                                        <div class="date">T3</div>
                                        <input type="checkbox" class="checkbox_schedule" checked="checked" onchange="hide_schedule_row('t3')">
                                        <span class="checkmark"></span>
                                    </label>
                            </div>
                            <div class="col_2 col_time" id="t3_am">
                                <span>Từ</span>
                                <input type="text" class="time start" value="07:00">
                                <span>Đến</span>
                                <input type="text" class="time end" value="11:00">
                                <button id="add_t3" onclick="add_schedule_row('t3')" type="button"><img src="/images/add_schedule.svg" alt="them lich"></button>
                            </div>
                            <div class="col_3 col_time" id="t3_pm">
                                <span>Từ</span>
                                <input type="text" class="time start" value="18:00">
                                <span>Đến</span>
                                <input type="text" class="time end" value="21:00">
                                <button id="minus_t3" onclick="minus_schedule_row('t3')" type="button"><img src="/images/clear_schedule.svg" alt="xoa lich"></button>
                            </div>
                        </div>
                        <div class="schedule_row" id="t4">
                            <div class="col_1">
                                <label class="container">
                                        <div class="date">T4</div>
                                        <input type="checkbox" class="checkbox_schedule" checked="checked" onchange="hide_schedule_row('t4')">
                                        <span class="checkmark"></span>
                                    </label>
                            </div>
                            <div class="col_2 col_time" id="t4_am">
                                <span>Từ</span>
                                <input type="text" class="time start" value="07:00" id="t4_am">
                                <span>Đến</span>
                                <input type="text" class="time end" value="11:00">
                                <button id="add_t4" onclick="add_schedule_row('t4')" type="button"><img src="/images/add_schedule.svg" alt="them lich"></button>
                            </div>
                            <div class="col_3 col_time" id="t4_pm">
                                <span>Từ</span>
                                <input type="text" class="time start" value="18:00">
                                <span>Đến</span>
                                <input type="text" class="time end" value="21:00">
                                <button id="minus_t4" onclick="minus_schedule_row('t4')" type="button"><img src="/images/clear_schedule.svg" alt="xoa lich"></button>
                            </div>
                        </div>
                        <div class="schedule_row" id="t5">
                            <div class="col_1">
                                <label class="container">
                                        <div class="date">T5</div>
                                        <input type="checkbox" class="checkbox_schedule" checked="checked" onchange="hide_schedule_row('t5')">
                                        <span class="checkmark"></span>
                                    </label>
                            </div>
                            <div class="col_2 col_time" id="t5_am">
                                <span>Từ</span>
                                <input type="text" class="time start" value="07:00">
                                <span>Đến</span>
                                <input type="text" class="time end" value="11:00">
                                <button id="add_t5" onclick="add_schedule_row('t5')" type="button"><img src="/images/add_schedule.svg" alt="them lich"></button>
                            </div>
                            <div class="col_3 col_time" id="t5_pm">
                                <span>Từ</span>
                                <input type="text" class="time start" value="18:00">
                                <span>Đến</span>
                                <input type="text" class="time end" value="21:00">
                                <button id="minus_t5" onclick="minus_schedule_row('t5')" type="button"><img src="/images/clear_schedule.svg" alt="xoa lich"></button>
                            </div>
                        </div>
                        <div class="schedule_row" id="t6">
                            <div class="col_1">
                                <label class="container">
                                        <div class="date">T6</div>
                                        <input type="checkbox" class="checkbox_schedule" checked="checked" onchange="hide_schedule_row('t6')">
                                        <span class="checkmark"></span>
                                    </label>
                            </div>
                            <div class="col_2 col_time" id="t6_am">
                                <span>Từ</span>
                                <input type="text" class="time start" value="07:00">
                                <span>Đến</span>
                                <input type="text" class="time end" value="11:00">
                                <button id="add_t6" onclick="add_schedule_row('t6')" type="button"><img src="/images/add_schedule.svg" alt="them lich"></button>
                            </div>
                            <div class="col_3 col_time" id="t6_pm">
                                <span>Từ</span>
                                <input type="text" class="time start" value="18:00">
                                <span>Đến</span>
                                <input type="text" class="time end" value="21:00">
                                <button id="minus_t6" onclick="minus_schedule_row('t6')" type="button"><img src="/images/clear_schedule.svg" alt="xoa lich"></button>
                            </div>
                        </div>
                        <div class="schedule_row" id="t7">
                            <div class="col_1">
                                <label class="container">
                                        <div class="date">T7</div>
                                        <input type="checkbox" class="checkbox_schedule"  onchange="hide_schedule_row('t7')">
                                        <span class="checkmark"></span>
                                    </label>
                            </div>
                            <div class="schedule_msg" id="schedule_msg_t7">Ngày nghỉ</div>
                        </div>
                        <div class="schedule_row" id="cn">
                            <div class="col_1">
                                <label class="container">
                                        <div class="date">CN</div>
                                        <input type="checkbox" class="checkbox_schedule"  onchange="hide_schedule_row('cn')">
                                        <span class="checkmark"></span>
                                    </label>
                            </div>
                            <div class="schedule_msg" id="schedule_msg_cn">Ngày nghỉ</div>
                        </div>
                    </div>
                    <!-- het lich lam viec -->
                    <div class="row">
                        <div class="center">
                            <label for="job_detail"><span><img src="/images/job_detail.svg" alt="mo ta cong viec"></span><span>Mô tả công việc </span> <span class="warning">*</span></label>
                            <textarea name="" id="job_detail" placeholder="Mô tả chi tiết công việc"></textarea>
                            <p class="warning" id="error_job_detail"></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="center">
                            <label for="job_require"><span><img src="/images/job_require.svg" alt="yeu cau cong viec"></span><span>Yêu cầu công việc </span> <span class="warning">*</span></label>
                            <textarea name="" id="job_require" placeholder="Nhà tuyển dụng đặt ra những yêu cầu gì với người giúp việc?"></textarea>
                            <p class="warning" id="error_job_require"></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="center">
                            <label for="job_benefit"><span><img src="/images/job_benefit.svg" alt="yeu cau cong viec"></span><span>Quyền lợi </span> <span class="warning">*</span></label>
                            <textarea name="" id="job_benefit" placeholder="Người giúp việc sẽ được hưởng những quyền lợi gì?"></textarea>
                            <p class="warning" id="error_job_benefit"></p>
                        </div>
                    </div>
                    <div class="box_btn">
                        <button class="update" onclick="submit_post()" type="button">Đăng tin</button>
                        <button class="reset_form" onclick="reset_form_post()" type="button">Cài đặt lại</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- het dang tin -->

    </div>
    <!-- bat dau box right -->
    <div class="box_right">
        <div class="calender">
            <div class="month_box">
                <img src="/images/calendar.svg" alt="lich">
                <p class="month"><span id="month">___</span><span> </span><span id="year">___</span></p>
                <div class="action_month">
                    <button id="prev_month"><img
                                        src="/images/calender_arrow_left_blue.svg"
                                        alt="prev"></button>
                    <button id="next_month"><img
                                        src="/images/calender_arrow_right_blue.svg"
                                        alt="next"></button>
                </div>
            </div>
            <div class="week_box">
                <p>Sun</p>
                <p>Mon</p>
                <p>Tue</p>
                <p>Wed</p>
                <p>Thu</p>
                <p>Fri</p>
                <p>Sat</p>
            </div>
            <div class="day_box">


            </div>

        </div>
        <div class="img">
            <img src="/images/calendar_img.png" alt="anh lich">
        </div>

    </div>
    <!-- het box right -->

    </div>
    </div>
    <!-- Ket thuc noi dung -->

    <!-- popup -->
    <!-- popup confirm logout -->
    <div class="confirm_logout">
        <div class="popup_bg">
            <div class="popup_content">
                <p class="title">Thông báo</p>
                <p class="content">Bạn chắc chắn muốn đăng xuất tài khoản này?</p>
                <div class="confirm_button">
                    <button class="yes" id="yes">Đăng xuất</button>
                    <button class="no" id="no">Hủy</button>
                </div>
            </div>
        </div>
    </div>
    <!-- het popup confirm logout -->

    <!-- popup confirm bo ung tuyen -->
    <div class="confirm_unapply">
        <div class="popup_bg">
            <div class="popup_content">
                <p class="title">Thông báo</p>
                <p class="content">Bạn chắc chắn muốn bỏ ứng tuyển tin tuyển dụng này?</p>
                <div class="confirm_button">
                    <button class="yes" id="yes">Bỏ ứng tuyển</button>
                    <button class="no" id="no">Hủy</button>
                </div>
            </div>
        </div>
    </div>
    <!-- het popup confirm bo ung tuyen -->

    <!-- popup confirm bo luu -->
    <div class="confirm_unsave">
        <div class="popup_bg">
            <div class="popup_content">
                <p class="title">Thông báo</p>
                <p class="content">Bạn chắc chắn muốn bỏ lưu ứng viên này? </p>
                <div class="confirm_button">
                    <button class="yes" id="yes">Bỏ lưu</button>
                    <button class="no" id="no">Hủy</button>
                </div>
            </div>
        </div>
    </div>
    <!-- het popup confirm bo luu -->
    <!-- popup chap nhan ung vien -->
    <div class="confirm_accept">
        <div class="popup_bg">
            <div class="popup_content">
                <p class="title">Thông báo</p>
                <p class="content">Bạn chắc chắn chấp nhận yêu cầu ứng tuyển của ứng viên này ? </p>
                <div class="confirm_button">
                    <button class="yes" id="yes">Chấp nhận</button>
                    <button class="no" id="no">Hủy</button>
                </div>
            </div>
        </div>
    </div>
    <!-- het popup chap nhan ung vien -->

    <!-- popup tu choi ung vien -->
    <div class="confirm_refuse">
        <div class="popup_bg">
            <div class="popup_content">
                <p class="title">Thông báo</p>
                <p class="content">Bạn chắc chắn từ chối yêu cầu ứng tuyển của ứng viên này? </p>
                <div class="confirm_button">
                    <button class="yes" id="yes">Từ chối</button>
                    <button class="no" id="no">Hủy</button>
                </div>
            </div>
        </div>
    </div>
    <!-- het popup tu choi ung vien -->
    <!-- popup dang tin thanh cong -->
    <div class="popup_post_success">
        <div class="popup_bg">
            <div class="popup_content">
                <p class="title">Thông báo</p>
                <p class="content">Đăng tin thành công!</p>
                <div class="confirm_button">
                    <button onclick="window.location.href='/account-manager/list-post'" class="ok" id="ok">OK</button>
                </div>
            </div>
        </div>
    </div>
    <!-- het popup dang tin thanh cong -->

    <!-- popup doi mat khau thanh cong -->
    <div class="popup_change_pwd_success">
        <div class="popup_bg">
            <div class="popup_content">
                <p class="title">Thông báo</p>
                <p class="content">Đổi mật khẩu thành công!</p>
                <div class="confirm_button">
                    <button onclick="close_change_pwd_success()" class="ok" id="ok">OK</button>
                </div>
            </div>
        </div>
    </div>
    <!-- het popup doi mat khau thanh cong -->

    <!-- popup sai mat khau -->
    <div class="popup_invalid_pwd">
        <div class="popup_bg">
            <div class="popup_content">
                <p class="title">Cảnh báo!</p>
                <p class="content">Mật khẩu hiện tại không đúng, vui lòng kiểm tra lại.</p>
                <div class="confirm_button">
                    <button onclick="close_invalid_pwd()" class="ok" id="ok">OK</button>
                </div>
            </div>
        </div>
    </div>
    <!-- het popup sai mat khau -->
    <!-- popup danh gia -->
    <div class="popup_rate">
        <div class="popup_bg">
            <div class="popup_content">
                <div class="bg">
                    <img src="/images/popup_rate_bg.png" alt="anh nen">
                </div>
                <div class="content">
                    <div class="stars">
                        <input class="star star-5" id="star-5" type="radio" name="star" value="5" checked="">
                        <label class="star star-5" for="star-5"></label>
                        <input class="star star-4" id="star-4" type="radio" name="star" value="4">
                        <label class="star star-4" for="star-4"></label>
                        <input class="star star-3" id="star-3" type="radio" name="star" value="3">
                        <label class="star star-3" for="star-3"></label>
                        <input class="star star-2" id="star-2" type="radio" name="star" value="2">
                        <label class="star star-2" for="star-2"></label>
                        <input class="star star-1" id="star-1" type="radio" name="star" value="1">
                        <label class="star star-1" for="star-1"></label>
                    </div>
                    <textarea placeholder="Để lại lời nhận xét giúp ứng viên nâng cao thêm chất lượng công việc bạn nha..."></textarea>
                </div>
                <div class="confirm_button">
                    <button class="yes" id="rate">Đánh giá</button>
                </div>
            </div>
        </div>
    </div>
    <!-- het popup danh gia -->

    <!-- popup danh gia thanh cong -->
    <div class="popup_rate_success">
        <div class="popup_bg">
            <div class="popup_content">
                <p class="title">Thông báo</p>
                <p class="content">Bạn vừa tạo đánh giá chất lượng dịch vụ của người giúp việc tại <span><a>giupviec.vieclam123.vn</a></span></p>
                <div class="confirm_button">
                    <button onclick="close_rate_success()" class="ok" id="ok">OK</button>
                </div>
            </div>
        </div>
    </div>
    <!-- het popup danh gia thanh cong -->
    <!-- het popup -->
