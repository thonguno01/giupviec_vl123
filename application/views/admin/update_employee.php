<style type="text/css">
    /*.ugs_avatar{display: none !important;}*/
    .user-img .avt{border-radius:50%;}
</style>
<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Sửa
        <small>Người giúp việc</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Người giúp việc</a></li>
        <li><a href="#">Thêm mới</a></li>
      </ol>
    </section>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <form class="form" id="formRegisterUv">
									<div class="form_input">
						<div class="row">
							<div class="left">
								<label for="email">
									<span>Email</span>
									<span class="warning">*</span>
								</label>
								<input type="text" name="email" id="email" disabled value="<?= $user['email'] ?>">
								<p class="warning" id="error_email"></p>
							</div>
							<div class="right">
								<label for="phone">
									<span>Số điện thoại</span>
									<span class="warning">*</span>
								</label>
								<input type="text" name="phone" id="phone" disabled value="<?= $user['phone'] ?>">
								<p class="warning" id="error_phone"></p>
							</div>
						</div>
						<div class="row">
							<div class="left">
								<label for="name">
									<span>Họ và tên</span>
									<span class="warning">*</span>
								</label>
								<input type="text" name="name" id="name" value="<?= $user['name'] ?>">
								<p class="warning" id="error_name"></p>
							</div>
							<div class="right">
								<label for="birth">
									<span>Ngày sinh</span>
									<span class="warning">*</span>
								</label>
								<input type="date" name="birth" id="birth" value="<?= date('Y-m-d', $user['birth']) ?>">
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
									<? foreach ($list_city as $city) {
										if ($city['cit_id'] == $user['city_id']) { ?>
											<option value="<?= $city['cit_id'] ?>" selected><?= $city['cit_name'] ?></option>
										<? } else { ?>
											<option value="<?= $city['cit_id'] ?>"><?= $city['cit_name'] ?></option>
									<? }
									} ?>
								</select>
								<p class="warning" id="error_province"></p>
							</div>
							<div class="right">
								<label for="district">
									<span>Quận/Huyện</span>
									<span class="warning">*</span>
								</label>
								<select name="district" id="district">
									<? foreach ($list_district as $city) {
										if ($city['cit_id'] == $user['district_id']) { ?>
											<option value="<?= $city['cit_id'] ?>" selected><?= $city['cit_name'] ?></option>
										<? } else { ?>
											<option value="<?= $city['cit_id'] ?>"><?= $city['cit_name'] ?></option>
									<? }
									} ?>
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
								<input type="text" name="address" id="address" value="<?= $user['address'] ?>">
								<p class="warning" id="error_address"></p>
							</div>
							<div class="right">
								<label for="stay">
									<span>Ở cùng chủ nhà</span>
									<span class="warning">*</span>
								</label>
								<select name="stay" id="stay">
									<? foreach ($list_work_type as $work_type) {
										if ($user['work_type_id'] == $work_type['id']) { ?>
											<option value="<?= $work_type['id'] ?>" selected><?= $work_type['work_name'] ?></option>
										<? } else { ?>
											<option value="<?= $work_type['id'] ?>"><?= $work_type['work_name'] ?></option>
									<? }
									} ?>
								</select>
								<p class="warning" id="error_work_type"></p>
							</div>
						</div>
						<div class="row">
							<div class="left">
								<label for="job_style">
									<span>Loại công việc</span>
									<span class="warning">*</span>
								</label>
								<select name="job_style[]" id="job_style" multiple="multiple">
									<?
									$user_job_style = explode(',', $user['job_style_id']);
									?>
									<? foreach ($list_job_style as $job_style) {
										if (in_array($job_style['id'], $user_job_style)) { ?>
											<option value="<?= $job_style['id'] ?>" selected><?= $job_style['content'] ?></option>
										<? } else { ?>
											<option value="<?= $job_style['id'] ?>"><?= $job_style['content'] ?></option>
									<? }
									} ?>
								</select>
								<p class="warning" id="error_job_style"></p>
							</div>
							<div class="right">
				<label for="avata">
						<span>Ảnh đại diện</span>
					</label>
				<input id="avata" type="file">
				</div>
						</div>
						<div class="row">
							<div class="left">
								<label for="experience">
									<span>Kinh nghiệm</span>
									<span class="warning">*</span>
								</label>
								<select name="experience" id="experience">
									<?
									switch ($user['exp']) {
										case '1':
											echo '<option value="0">Chưa có kinh nghiệm</option>
										  <option value="1" selected>Dưới 1 năm</option>
										  <option value="2">1-2 năm</option>
										  <option value="3">3-5 năm</option>
										  <option value="4">6-9 năm</option>
										  <option value="5">Trên 10 năm</option>';
											break;
										case '2':
											echo '<option value="0">Chưa có kinh nghiệm</option>
										  <option value="1">Dưới 1 năm</option>
										  <option value="2" selected>1-2 năm</option>
										  <option value="3">3-5 năm</option>
										  <option value="4">6-9 năm</option>
										  <option value="5">Trên 10 năm</option>';
											break;
										case '3':
											echo '<option value="0">Chưa có kinh nghiệm</option>
										  <option value="1">Dưới 1 năm</option>
										  <option value="2">1-2 năm</option>
										  <option value="3" selected>3-5 năm</option>
										  <option value="4">6-9 năm</option>
										  <option value="5">Trên 10 năm</option>';
											break;
										case '4':
											echo '<option value="0">Chưa có kinh nghiệm</option>
										  <option value="1">Dưới 1 năm</option>
										  <option value="2">1-2 năm</option>
										  <option value="3">3-5 năm</option>
										  <option value="4" selected>6-9 năm</option>
										  <option value="5">Trên 10 năm</option>';
											break;
										case '5':
											echo '<option value="0">Chưa có kinh nghiệm</option>
										  <option value="1">Dưới 1 năm</option>
										  <option value="2">1-2 năm</option>
										  <option value="3">3-5 năm</option>
										  <option value="4">6-9 năm</option>
										  <option value="5" selected>Trên 10 năm</option>';
											break;

										default:
											echo '<option value="0" selected>Chưa có kinh nghiệm</option>
										  <option value="1">Dưới 1 năm</option>
										  <option value="2">1-2 năm</option>
										  <option value="3">3-5 năm</option>
										  <option value="4">6-9 năm</option>
										  <option value="5">Trên 10 năm</option>';
											break;
									}
									?>
								</select>
								<p class="warning" id="error_experience"></p>
							</div>
							<div class="right">
								<label for="education">
									<span>Trình độ học vấn</span>
									<span class="warning">*</span>
								</label>
								<select name="education" id="education">
									<?
									switch ($user['edu']) {
										case '1':
											echo '<option value="0">Không có bằng cấp</option>
											<option value="1" selected>THCS</option>
											<option value="2">THPT</option>
											<option value="3">Cao đẳng</option>
											<option value="4">Đại học</option>';
											break;
										case '2':
											echo '<option value="0">Không có bằng cấp</option>
											<option value="1">THCS</option>
											<option value="2" selected>THPT</option>
											<option value="3">Cao đẳng</option>
											<option value="4">Đại học</option>';
											break;
										case '3':
											echo '<option value="0">Không có bằng cấp</option>
											<option value="1">THCS</option>
											<option value="2">THPT</option>
											<option value="3" selected>Cao đẳng</option>
											<option value="4">Đại học</option>';
											break;
										case '4':
											echo '<option value="0">Không có bằng cấp</option>
											<option value="1">THCS</option>
											<option value="2">THPT</option>
											<option value="3">Cao đẳng</option>
											<option value="4" selected>Đại học</option>';
											break;
										default:
											echo '<option value="0" selected>Không có bằng cấp</option>
										  <option value="1">THCS</option>
										  <option value="2">THPT</option>
										  <option value="3">Cao đẳng</option>
										  <option value="4">Đại học</option>';
											break;
									}
									?>
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
									<input type="radio" name="select" id="option-1" <? if ($user['salary_type'] == 0) echo 'checked' ?>>
									<input type="radio" name="select" id="option-2" <? if ($user['salary_type'] == 1) echo 'checked' ?>>
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
							<div class="left" id="static" <? if ($user['salary_type'] != 0) echo 'style="display:none"' ?>>
								<input type="number" name="sal" id="sal" value="<?= $user['salary1'] ?>">
								<div class="text"><span>VND</span></div>
							</div>
							<div class="left" id="dynamic" <? if ($user['salary_type'] != 1) echo 'style="display:none"' ?>>
								<div class="sal_from">
									<label for="sal_from">Từ</label>
									<div>
										<input type="number" name="sal_from" id="sal_from" value="<?= $user['salary1'] ?>">
										<div class="text"><span>VND</span></div>
									</div>
								</div>
								<div class="sal_to">
									<label for="sal_to">Đến</label>
									<div>
										<input type="number" name="sal_to" id="sal_to" value="<?= $user['salary2'] ?>">
										<div class="text"><span>VND</span></div>
									</div>
								</div>
							</div>
							<div class="middle">
								/
							</div>
							<div class="right">
								<select name="sal_time" id="sal_time">
									<? switch ($user['salary_time']) {
										case '1':
											echo '<option value="3">Giờ</option>
												<option value="2">Tuần</option>
												<option value="1" selected>Tháng</option>';
											break;
										case '2':
											echo '<option value="3">Giờ</option>
												<option value="2" selected>Tuần</option>
												<option value="1">Tháng</option>';
											break;
										case '3':
											echo '<option value="3" selected>Giờ</option>
												<option value="2">Tuần</option>
												<option value="1">Tháng</option>';
											break;
									} ?>
								</select>
							</div>
						</div>
						<p class="warning" id="error_sal"></p>
						<div class="row">
							<label>
								<span>Lịch làm việc</span>
								<span class="warning">*</span>
							</label>
						</div>
						<p class="warning" id="error_schedule"></p>
						<div class="table_schedule">
							<div class="schedule_row" id="t2">
								<div class="col_1">
									<label class="container">
										<div class="date">T2</div>
										<input type="checkbox" class="checkbox_schedule" <? if ($user_schedule['t2_ca1_bd']) echo 'checked' ?> onchange="hide_schedule_row('t2')">
										<span class="checkmark"></span>
									</label>
								</div>
								<? if ($user_schedule['t2_ca1_bd']) { ?>
									<div class="col_2 col_time" id="t2_am">
										<span>Từ</span>
										<input type="text" class="time start" value="<?= $user_schedule['t2_ca1_bd'] ?>">
										<span>Đến</span>
										<input type="text" class="time end" value="<?= $user_schedule['t2_ca1_kt'] ?>">
										<button id="add_t2" type="button" <? if ($user_schedule['t2_ca2_bd']) echo 'hidden' ?> onclick="add_schedule_row('t2')"><img src="/images/add_schedule.svg" alt="them lich"></button>
									</div>
									<? if ($user_schedule['t2_ca2_bd']) { ?>
										<div class="col_3 col_time" id="t2_pm">
											<span>Từ</span>
											<input type="text" class="time start" value="<?= $user_schedule['t2_ca2_bd'] ?>">
											<span>Đến</span>
											<input type="text" class="time end" value="<?= $user_schedule['t2_ca2_kt'] ?>">
											<button type="button" id="minus_t2" onclick="minus_schedule_row('t2')"><img src="/images/clear_schedule.svg" alt="xoa lich"></button>
										</div>
								<? }
								} else echo '<div class="schedule_msg" id="schedule_msg_t2">Tôi không làm việc</div>' ?>
							</div>
							<div class="schedule_row" id="t3">
								<div class="col_1">
									<label class="container">
										<div class="date">T3</div>
										<input type="checkbox" class="checkbox_schedule" <? if ($user_schedule['t3_ca1_bd']) echo 'checked' ?> onchange="hide_schedule_row('t3')">
										<span class="checkmark"></span>
									</label>
								</div>
								<? if ($user_schedule['t3_ca1_bd']) { ?>
									<div class="col_2 col_time" id="t3_am">
										<span>Từ</span>
										<input type="text" class="time start" value="<?= $user_schedule['t3_ca1_bd'] ?>">
										<span>Đến</span>
										<input type="text" class="time end" value="<?= $user_schedule['t3_ca1_kt'] ?>">
										<button id="add_t3" <? if ($user_schedule['t3_ca2_bd']) echo 'hidden' ?> onclick="add_schedule_row('t3')" type="button"><img src="/images/add_schedule.svg" alt="them lich"></button>
									</div>
									<? if ($user_schedule['t3_ca2_bd']) { ?>
										<div class="col_3 col_time" id="t3_pm">
											<span>Từ</span>
											<input type="text" class="time start" value="<?= $user_schedule['t3_ca2_bd'] ?>">
											<span>Đến</span>
											<input type="text" class="time end" value="<?= $user_schedule['t3_ca2_kt'] ?>">
											<button id="minus_t3" onclick="minus_schedule_row('t3')" type="button"><img src="/images/clear_schedule.svg" alt="xoa lich"></button>
										</div>
								<? }
								} else echo '<div class="schedule_msg" id="schedule_msg_t3">Tôi không làm việc</div>' ?>
							</div>
							<div class="schedule_row" id="t4">
								<div class="col_1">
									<label class="container">
										<div class="date">T4</div>
										<input type="checkbox" class="checkbox_schedule" <? if ($user_schedule['t4_ca1_bd']) echo 'checked' ?> onchange="hide_schedule_row('t4')">
										<span class="checkmark"></span>
									</label>
								</div>
								<? if ($user_schedule['t4_ca1_bd']) { ?>
									<div class="col_2 col_time" id="t4_am">
										<span>Từ</span>
										<input type="text" class="time start" value="<?= $user_schedule['t4_ca1_bd'] ?>" id="t4_am">
										<span>Đến</span>
										<input type="text" class="time end" value="<?= $user_schedule['t4_ca1_kt'] ?>">
										<button id="add_t4" <? if ($user_schedule['t4_ca2_bd']) echo 'hidden' ?> onclick="add_schedule_row('t4')" type="button"><img src="/images/add_schedule.svg" alt="them lich"></button>
									</div>
									<? if ($user_schedule['t4_ca2_bd']) { ?>
										<div class="col_3 col_time" id="t4_pm">
											<span>Từ</span>
											<input type="text" class="time start" value="<?= $user_schedule['t4_ca2_bd'] ?>">
											<span>Đến</span>
											<input type="text" class="time end" value="<?= $user_schedule['t4_ca2_kt'] ?>">
											<button id="minus_t4" onclick="minus_schedule_row('t4')" type="button"><img src="/images/clear_schedule.svg" alt="xoa lich"></button>
										</div>
								<? }
								} else echo '<div class="schedule_msg" id="schedule_msg_t4">Tôi không làm việc</div>' ?>
							</div>
							<div class="schedule_row" id="t5">
								<div class="col_1">
									<label class="container">
										<div class="date">T5</div>
										<input type="checkbox" class="checkbox_schedule" <? if ($user_schedule['t5_ca1_bd']) echo 'checked' ?> onchange="hide_schedule_row('t5')">
										<span class="checkmark"></span>
									</label>
								</div>
								<? if ($user_schedule['t5_ca1_bd']) { ?>
									<div class="col_2 col_time" id="t5_am">
										<span>Từ</span>
										<input type="text" class="time start" value="<?= $user_schedule['t5_ca1_bd'] ?>">
										<span>Đến</span>
										<input type="text" class="time end" value="<?= $user_schedule['t5_ca1_kt'] ?>">
										<button id="add_t5" <? if ($user_schedule['t5_ca2_bd']) echo 'hidden' ?> onclick="add_schedule_row('t5')" type="button"><img src="/images/add_schedule.svg" alt="them lich"></button>
									</div>
									<? if ($user_schedule['t5_ca2_bd']) { ?>
										<div class="col_3 col_time" id="t5_pm">
											<span>Từ</span>
											<input type="text" class="time start" value="<?= $user_schedule['t5_ca2_bd'] ?>">
											<span>Đến</span>
											<input type="text" class="time end" value="<?= $user_schedule['t5_ca2_kt'] ?>">
											<button id="minus_t5" onclick="minus_schedule_row('t5')" type="button"><img src="/images/clear_schedule.svg" alt="xoa lich"></button>
										</div>
								<? }
								} else echo '<div class="schedule_msg" id="schedule_msg_t5">Tôi không làm việc</div>' ?>
							</div>
							<div class="schedule_row" id="t6">
								<div class="col_1">
									<label class="container">
										<div class="date">T6</div>
										<input type="checkbox" class="checkbox_schedule" <? if ($user_schedule['t6_ca1_bd']) echo 'checked' ?> onchange="hide_schedule_row('t6')">
										<span class="checkmark"></span>
									</label>
								</div>
								<? if ($user_schedule['t6_ca1_bd']) { ?>
									<div class="col_2 col_time" id="t6_am">
										<span>Từ</span>
										<input type="text" class="time start" value="<?= $user_schedule['t6_ca1_bd'] ?>">
										<span>Đến</span>
										<input type="text" class="time end" value="<?= $user_schedule['t6_ca1_kt'] ?>">
										<button id="add_t6" <? if ($user_schedule['t6_ca2_bd']) echo 'hidden' ?> onclick="add_schedule_row('t6')" type="button"><img src="/images/add_schedule.svg" alt="them lich"></button>
									</div>
									<? if ($user_schedule['t6_ca2_bd']) { ?>
										<div class="col_3 col_time" id="t6_pm">
											<span>Từ</span>
											<input type="text" class="time start" value="<?= $user_schedule['t6_ca2_bd'] ?>">
											<span>Đến</span>
											<input type="text" class="time end" value="<?= $user_schedule['t6_ca2_kt'] ?>">
											<button id="minus_t6" onclick="minus_schedule_row('t6')" type="button"><img src="/images/clear_schedule.svg" alt="xoa lich"></button>
										</div>
								<? }
								} else echo '<div class="schedule_msg" id="schedule_msg_t6">Tôi không làm việc</div>' ?>
							</div>
							<div class="schedule_row" id="t7">
								<div class="col_1">
									<label class="container">
										<div class="date">T7</div>
										<input type="checkbox" class="checkbox_schedule" <? if ($user_schedule['t7_ca1_bd']) echo 'checked' ?> onchange="hide_schedule_row('t7')">
										<span class="checkmark"></span>
									</label>
								</div>
								<? if ($user_schedule['t7_ca1_bd']) { ?>
									<div class="col_2 col_time" id="t7_am">
										<span>Từ</span>
										<input type="text" class="time start" value="<?= $user_schedule['t7_ca1_bd'] ?>">
										<span>Đến</span>
										<input type="text" class="time end" value="<?= $user_schedule['t7_ca1_kt'] ?>">
										<button id="add_t7" <? if ($user_schedule['t7_ca2_bd']) echo 'hidden' ?> onclick="add_schedule_row('t7')" type="button"><img src="/images/add_schedule.svg" alt="them lich"></button>
									</div>
									<? if ($user_schedule['t7_ca2_bd']) { ?>
										<div class="col_3 col_time" id="t7_pm">
											<span>Từ</span>
											<input type="text" class="time start" value="<?= $user_schedule['t7_ca2_bd'] ?>">
											<span>Đến</span>
											<input type="text" class="time end" value="<?= $user_schedule['t7_ca2_kt'] ?>">
											<button id="minus_t7" onclick="minus_schedule_row('t7')" type="button"><img src="/images/clear_schedule.svg" alt="xoa lich"></button>
										</div>
								<? }
								} else echo '<div class="schedule_msg" id="schedule_msg_t7">Tôi không làm việc</div>' ?>
							</div>
							<div class="schedule_row" id="cn">
								<div class="col_1">
									<label class="container">
										<div class="date">CN</div>
										<input type="checkbox" class="checkbox_schedule" <? if ($user_schedule['t8_ca1_bd']) echo 'checked' ?> onchange="hide_schedule_row('cn')">
										<span class="checkmark"></span>
									</label>
								</div>
								<? if ($user_schedule['t8_ca1_bd']) { ?>
									<div class="col_2 col_time" id="cn_am">
										<span>Từ</span>
										<input type="text" class="time start" value="<?= $user_schedule['t8_ca1_bd'] ?>">
										<span>Đến</span>
										<input type="text" class="time end" value="<?= $user_schedule['t8_ca1_kt'] ?>">
										<button id="add_cn" <? if ($user_schedule['t8_ca2_bd']) echo 'hidden' ?> onclick="add_schedule_row('cn')" type="button"><img src="/images/add_schedule.svg" alt="them lich"></button>
									</div>
									<? if ($user_schedule['t8_ca2_bd']) { ?>
										<div class="col_3 col_time" id="cn_pm">
											<span>Từ</span>
											<input type="text" class="time start" value="<?= $user_schedule['t8_ca2_bd'] ?>" name='cn_pm_start'>
											<span>Đến</span>
											<input type="text" class="time end" value="<?= $user_schedule['t8_ca2_kt'] ?>">
											<button id="minus_cn" onclick="minus_schedule_row('cn')" type="button"><img src="/images/clear_schedule.svg" alt="xoa lich"></button>
										</div>
								<? }
								} else echo '<div class="schedule_msg" id="schedule_msg_cn">Tôi không làm việc</div>' ?>
							</div>
						</div>

						<!-- het lich lam viec -->
						<div class="row">
							<div class="center">
								<label for="intro"><span>Về bản thân</span></label>
								<textarea name="" id="intro" placeholder="Giới thiệu một vài điều về bản thân ứng viên"><?= $user['intro'] ?></textarea>
							</div>
						</div>
						<div class="row">
							<div class="center">
								<label for="exp"></span><span>Kinh nghiệm làm giúp việc</span></label>
								<textarea name="" id="work_process" placeholder="Giới thiệu một vài điều về kinh nghiệm làm giúp việc của ứng viên"><?= $user['work_process'] ?></textarea>
							</div>
						</div>
						<div class="row">
							<label class="text">
								<span>Kỹ năng công việc</span>
								<span class="warning">*</span>
							</label>
						</div>
						<p class="warning" id="error_skill"></p>
						<div class="box_skill">
							<div class="check_box">
								<div class="left">
									<? $user_job_skill = explode('|', $user['job_skill']);
									$list_job_skill = ['Nấu ăn', 'Giặt là', 'Đi dạo', 'Dọn dẹp văn phòng', 'Đi chợ mua thực phẩm', 'Sơ cứu đơn giản', 'Xử lý vết thương, băng bó', 'Chăm trẻ sơ sinh'];
									?>
									<label class="container">Nấu ăn
										<input type="checkbox" name="skill" <? if (in_array('Nấu ăn', $user_job_skill)) echo 'checked' ?> value="Nấu ăn">
										<span class="checkmark"></span>
									</label>
									<label class="container">Giặt là
										<input type="checkbox" name="skill" <? if (in_array('Giặt là', $user_job_skill)) echo 'checked' ?> value="Giặt là">
										<span class="checkmark"></span>
									</label>
									<label class="container">Đi dạo
										<input type="checkbox" name="skill" <? if (in_array('Đi dạo', $user_job_skill)) echo 'checked' ?> value="Đi dạo">
										<span class="checkmark"></span>
									</label>
									<label class="container">Dọn dẹp văn phòng
										<input type="checkbox" name="skill" <? if (in_array('Dọn dẹp văn phòng', $user_job_skill)) echo 'checked' ?> value="Dọn dẹp văn phòng">
										<span class="checkmark"></span>
									</label>
								</div>
								<div class="right">
									<label class="container">Đi chợ, mua thực phẩm
										<input type="checkbox" name="skill" <? if (in_array('Đi chợ, mua thực phẩm', $user_job_skill)) echo 'checked' ?> value="Đi chợ mua thực phẩm">
										<span class="checkmark"></span>
									</label>
									<label class="container">Sơ cứu đơn giản
										<input type="checkbox" name="skill" <? if (in_array('Sơ cứu đơn giản', $user_job_skill)) echo 'checked' ?> value="Sơ cứu đơn giản">
										<span class="checkmark"></span>
									</label>
									<label class="container">Xử lý vết thương, băng bó
										<input type="checkbox" name="skill" <? if (in_array('Xủ lý vết thương, băng bó', $user_job_skill)) echo 'checked' ?> value="Xử lý vết thương, băng bó">
										<span class="checkmark"></span>
									</label>
									<label class="container">Chăm trẻ sơ sinh
										<input type="checkbox" name="skill" <? if (in_array('Chăm trẻ sơ sinh', $user_job_skill)) echo 'checked' ?> value="Chăm trẻ sơ sinh">
										<span class="checkmark"></span>
									</label>
								</div>
							</div>
							<? foreach ($user_job_skill as $job_skill) {
								if (!in_array($job_skill, $list_job_skill)) { ?>
									<div class="other_skill">
										<label class="container">
											<input type="checkbox" checked class="add_skill">
											<span class="checkmark"></span>
										</label>
										<input type="text" placeholder="Kỹ năng khác" name="add_skill" value="<?= $job_skill ?>">
										<button class="btn_add_skill" type="button"><img src="/images/add_skill.svg" alt="them ky nang"></button>
										<button class="btn_remove_skill" type="button"><img src="/images/minus_skill.svg" alt="xoa ky nang"></button>
									</div>
							<? }
							}
							?>
							<div class="other_skill">
								<label class="container">
									<input type="checkbox" class="add_skill">
									<span class="checkmark"></span>
								</label>
								<input type="text" placeholder="Kỹ năng khác" name="add_skill" disabled>
								<button class="btn_add_skill" type="button" hidden><img src="/images/add_skill.svg" alt="them ky nang"></button>
								<button class="btn_remove_skill" disabled type="button" hidden><img src="/images/minus_skill_disabled.svg" alt="xoa ky nang"></button>
							</div>

						</div>
						<div class="box_btn">
							<button class="update" onclick="update_information()" type="button">Cập nhật</button>
						</div>
					</div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
