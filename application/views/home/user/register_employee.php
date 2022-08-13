<div class="main_content">
	<div class="form_register">
		<title class="form_title">NGƯỜI GIÚP VIỆC ĐĂNG KÝ</title>
		<div class="image">
			<input id="avata" type="file">
			<div id="show_avata">

<<<<<<< HEAD
			</div>
		</div>
		<div class="form_input">
			<div class="row">
				<div class="left">
					<label for="email">
						<span>Email</span>
						<span class="warning">*</span>
					</label>
					<input type="text" name="email" id="email" placeholder="Nhập địa chỉ email">
					<p class="warning" id="error_email"></p>
				</div>
				<div class="right">
					<label for="phone">
						<span>Số điện thoại</span>
						<span class="warning">*</span>
					</label>
					<input type="text" name="phone" id="phone" placeholder="Nhập số điện thoại">
					<p class="warning" id="error_phone"></p>
				</div>
			</div>
			<div class="row">
					<div class="left">
						<label for="password">
							<span>Mật khẩu</span>
							<span class="warning">*</span>
						</label>
						<div class="row_input">
						<input type="password" name="password" id="password" placeholder="Nhập mật khẩu">
						<button class="view_pass" type="button" id="view_pass" onclick="show_pass()"><i class="fa fa-eye-slash" aria-hidden="true"></i></button>
						</div>
						<p class="warning" id="error_password"></p>
					</div>
					<div class="right">
						<label for="repassword">
							<span>Nhập lại mật khẩu</span>
							<span class="warning">*</span>
						</label>
						<div class="row_input">
						<input type="password" name="repassword" id="repassword" placeholder="Nhập lại mật khẩu">
						<button class="view_pass" type="button" id="view_repass" onclick="show_repass()"><i class="fa fa-eye-slash" aria-hidden="true"></i></button>
						</div>
						<p class="warning" id="error_repassword"></p>
=======
			</div>
		</div>
		<div class="form_input">
			<div class="row">
				<div class="left">
					<label for="email">
						<span>Email</span>
						<span class="warning">*</span>
					</label>
					<input type="text" name="email" id="email" placeholder="Nhập địa chỉ email">
					<p class="warning" id="error_email"></p>
				</div>
				<div class="right">
					<label for="phone">
						<span>Số điện thoại</span>
						<span class="warning">*</span>
					</label>
					<input type="text" name="phone" id="phone" placeholder="Nhập số điện thoại">
					<p class="warning" id="error_phone"></p>
				</div>
			</div>
			<div class="row">
				<div class="left">
					<label for="password">
						<span>Mật khẩu</span>
						<span class="warning">*</span>
					</label>
					<input type="password" name="password" id="password" placeholder="Nhập mật khẩu">
					<p class="warning" id="error_password"></p>
				</div>
				<div class="right">
					<label for="repassword">
						<span>Nhập lại mật khẩu</span>
						<span class="warning">*</span>
					</label>
					<input type="password" name="repassword" id="repassword" placeholder="Nhập lại mật khẩu">
					<p class="warning" id="error_repassword"></p>
				</div>
			</div>
			<div class="row">
				<div class="left">
					<label for="name">
						<span>Họ và tên</span>
						<span class="warning">*</span>
					</label>
					<input type="text" name="name" id="name" placeholder="Nhập họ và tên">
					<p class="warning" id="error_name"></p>
				</div>
				<div class="right">
					<label for="birth">
						<span>Ngày sinh</span>
						<span class="warning">*</span>
					</label>
					<input type="date" name="birth" id="birth">
					<p class="warning" id="error_birth"></p>
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
						<? foreach ($list_city as $city) { ?>
							<option value="<?= $city['cit_id'] ?>"><?= $city['cit_name'] ?></option>
						<? } ?>
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
					<select name="stay" id="work_type">
						<? foreach ($list_work_type as $work_type) {?>
								<option value="<?= $work_type['id'] ?>"><?= $work_type['work_name'] ?></option>
						<?} ?>
					</select>
					<p class="warning" id="error_work_type"></p>
				</div>
			</div>
			<div class="row">
				<div class="center">
					<label for="job_style">
						<span>Loại công việc</span>
						<span class="warning">*</span>
					</label>
					<select name="job_style[]" id="job_style" multiple="multiple">
						<option></option>
						<option value="1">Giúp việc theo giờ</option>
						<option value="2">Giúp việc văn phòng</option>
						<option value="3">Giúp việc chăm sóc trẻ em </option>
						<option value="4">Giúp việc gia đình</option>
					</select>
					<p class="warning" id="error_job_style"></p>
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
						<option value="1">Chưa có kinh nghiệm</option>
						<option value="2">Dưới 1 năm</option>
						<option value="3">1-2 năm</option>
						<option value="4">3-5 năm</option>
						<option value="5">6-9 năm</option>
						<option value="6">Trên 10 năm</option>
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
						<option value="1">THCS</option>
						<option value="2">THPT</option>
						<option value="3">Cao đẳng</option>
						<option value="4">Đại học</option>
					</select>
					<p class="warning" id="error_education"></p>
				</div>
			</div>
			<div class="row">
				<div class="center">
					<label for="address">
						<span>Mức lương ước lượng</span>
						<span class="warning">*</span>
					</label>
					<div class="sal_opt">
						<input type="radio" name="select" id="option-1" checked>
						<input type="radio" name="select" id="option-2">
						<label for="option-1" class="option option-1">
							<span>Cố định</span>
						</label>
						<label for="option-2" class="option option-2">
							<span>Ước lượng</span>
						</label>
					</div>
				</div>
			</div>
			<div class="row_sal">
				<div class="left" id="static">
					<input type="number" name="sal" id="sal" value="5000000">
					<div class="text"><span>VND</span></div>
					<p class="warning" id="error_static_sal"></p>
				</div>
				<div class="left" id="dynamic" style="display:none">
					<div class="sal_from">
						<label for="sal_from">Từ</label>
						<div>
							<input type="number" name="sal_from" id="sal_from" value="5000000">
							<div class="text"><span>VND</span></div>
						</div>
					</div>
					<div class="sal_to">
						<label for="sal_to">Đến</label>
						<div>
							<input type="number" name="sal_to" id="sal_to" value="5000000">
							<div class="text"><span>VND</span></div>
						</div>
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
					</div>
					<p class="warning" id="error_dynamic_sal"></p>
				</div>
				<div class="middle">
					/
				</div>
				<div class="right">
					<select name="sal_time" id="sal_time">
						<option value="1">Giờ</option>
						<option value="2">Tuần</option>
						<option value="3" selected>Tháng</option>
					</select>
				</div>
<<<<<<< HEAD
			<div class="row">
				<div class="left">
					<label for="name">
						<span>Họ và tên</span>
						<span class="warning">*</span>
					</label>
					<input type="text" name="name" id="name" placeholder="Nhập họ và tên">
					<p class="warning" id="error_name"></p>
				</div>
				<div class="right">
					<label for="birth">
						<span>Ngày sinh</span>
						<span class="warning">*</span>
					</label>
					<input type="text" placeholder="Nhập ngày sinh"
                    onfocus="date_inp(event)" name="birth" id="birth">
					<p class="warning" id="error_birth"></p>
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
						<? foreach ($list_city as $city) { ?>
							<option value="<?= $city['cit_id'] ?>"><?= $city['cit_name'] ?></option>
						<? } ?>
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
					<select name="stay" id="work_type">
						<? foreach ($list_work_type as $work_type) {?>
								<option value="<?= $work_type['id'] ?>"><?= $work_type['work_name'] ?></option>
						<?} ?>
					</select>
					<p class="warning" id="error_work_type"></p>
				</div>
			</div>
			<div class="row">
				<div class="center">
					<label for="job_style">
						<span>Loại công việc</span>
						<span class="warning">*</span>
					</label>
					<select name="job_style[]" id="job_style" multiple="multiple">
						<option></option>
						<?foreach($list_job_style as $job_style){?>
							<option value="<?=$job_style['id']?>"><?=$job_style['content']?></option>
							<?}?>
						<!-- <option value="1">Giúp việc theo giờ</option>
						<option value="2">Giúp việc văn phòng</option>
						<option value="3">Giúp việc chăm sóc trẻ em </option>
						<option value="4">Giúp việc gia đình</option> -->
					</select>
					<p class="warning" id="error_job_style"></p>
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
						<option value="0">Không bằng cấp</option>
						<option value="1">THCS</option>
						<option value="2">THPT</option>
						<option value="3">Cao đẳng</option>
						<option value="4">Đại học</option>
					</select>
					<p class="warning" id="error_education"></p>
				</div>
			</div>
			<div class="row">
				<div class="center">
					<label for="address">
						<span>Mức lương ước lượng</span>
						<span class="warning">*</span>
					</label>
					<div class="sal_opt">
						<input type="radio" name="select" id="option-1" checked>
						<input type="radio" name="select" id="option-2">
						<label for="option-1" class="option option-1">
							<span>Cố định</span>
						</label>
						<label for="option-2" class="option option-2">
							<span>Ước lượng</span>
						</label>
					</div>
				</div>
			</div>
			<div class="row_sal">
				<div class="left" id="static">
					<input type="text" name="sal" id="sal">
					<div class="text"><span>VND</span></div>
					
				</div>
				<div class="left" id="dynamic" style="display:none">
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
					<select name="sal_time" id="sal_time">
						<option value="3">Giờ</option>
						<option value="2">Tuần</option>
						<option value="1" selected>Tháng</option>
					</select>
				</div>
			</div>
			<p class="warning" id="error_sal"></p>
			<div class="row">
				<div class="text">
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
=======
			</div>
			<div class="row">
				<div class="text">
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
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
						<span>Từ</span>
						<input type="text" class="time start" value="18:00">
						<span>Đến</span>
						<input type="text" class="time end" value="21:00">
<<<<<<< HEAD
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
=======
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
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
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
							<input type="checkbox" class="checkbox_schedule" onchange="hide_schedule_row('t7')">
							<span class="checkmark"></span>
						</label>
					</div>
					<div class="col_2 col_time" id="t7_am">
						<span>Từ</span>
						<input type="text" class="time start" value="07:00">
						<span>Đến</span>
						<input type="text" class="time end" value="11:00">
						<button id="add_t7" onclick="add_schedule_row('t7')" type="button"><img src="/images/add_schedule.svg" alt="them lich"></button>
					</div>
					<div class="col_3 col_time" id="t7_pm">
						<span>Từ</span>
						<input type="text" class="time start" value="18:00">
						<span>Đến</span>
						<input type="text" class="time end" value="21:00">
						<button id="minus_t7" onclick="minus_schedule_row('t7')" type="button"><img src="/images/clear_schedule.svg" alt="xoa lich"></button>
					</div>
				</div>
				<div class="schedule_row" id="cn">
					<div class="col_1">
						<label class="container">
							<div class="date">CN</div>
							<input type="checkbox" class="checkbox_schedule" onchange="hide_schedule_row('cn')">
							<span class="checkmark"></span>
						</label>
					</div>
					<div class="col_2 col_time" id="cn_am">
						<span>Từ</span>
						<input type="text" class="time start" value="07:00">
						<span>Đến</span>
						<input type="text" class="time end" value="11:00">
						<button id="add_cn" onclick="add_schedule_row('cn')" type="button"><img src="/images/add_schedule.svg" alt="them lich"></button>
					</div>
					<div class="col_3 col_time" id="cn_pm">
						<span>Từ</span>
						<input type="text" class="time start" value="18:00" name='cn_pm_start'>
						<span>Đến</span>
						<input type="text" class="time end" value="21:00">
						<button id="minus_cn" onclick="minus_schedule_row('cn')" type="button"><img src="/images/clear_schedule.svg" alt="xoa lich"></button>
					</div>
				</div>
			</div>

			<!-- het lich lam viec -->
			<div class="btn_register">
				<button type="button" onclick="register()">Đăng ký</button>
			</div>
			<div class="login_row">
				<span>Bạn đã có tài khoản?</span>
<<<<<<< HEAD
				<span><a href="/login/employee">Đăng nhập ngay</a></span>
=======
				<span><a href="/login">Đăng nhập ngay</a></span>
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
			</div>
		</div>
	</div>
</div>
