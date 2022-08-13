
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
			<button id="post">Đăng tin tuyển giúp việc</button>
			<button id="list_post" class="active">Tin đã đăng</button>
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
        <!-- danh sach tin tuyen dung da dang -->
        <div class="posted_list">
            <div class="box_content">
                <div class="top">
                    <p class="title">Tin tuyển dụng đã đăng</p>
                </div>
                <div class="data_table">
                    <div class="row thead">
                        <p class="job_id">Mã công việc</p>
                        <p class="job_title">Tiêu đề</p>
                        <p class="job_location">Địa chỉ làm việc</p>
                        <p class="job_salary">Mức lương</p>
                        <p class="post_status">Trạng thái</p>
                        <p class="job_edit">Sửa tin</p>
						<p class="re_new">Làm mới</p>
                    </div>
					<? foreach ($list_news as $new) { ?>
						<div class="row">
							<p class="job_id"><?= $new['id'] ?></p>
							<p class="job_title"><a href="<?=rewrite_new_detail_link($new['new_alias'],$new['id'])?>"><?= $new['title'] ?></a></p>
							<p class="job_location"><?= $new['full_address'] ?></p>
							<p class="job_salary">
								<? if ($new['salary_type'] == 0) {
									echo (number_format($new['salary1'], 0, '', '.') . 'vnđ');
								} else {
									echo (number_format($new['salary1'], 0, '', '.') . 'vnđ' . ' - ' . number_format($new['salary2'], 0, '', '.') . 'vnđ');
								}
								switch ($new['salary_time']) {
									case '1':
										echo " /Tháng";
										break;
									case '2':
										echo " /Tuần";
										break;
									case '3':
										echo " /Giờ";
										break;
									default:
										break;
								}
								?>
							</p>

							<div class="post_status">
								<?
								switch($new['new_status']){
									case '1':
										echo '<button class="change_post_status">
										<span class="text working">Đang tìm giúp việc</span>
										<span class="img"><img src="/images/arrow_down.svg" alt="mui ten"></span>
										</button>
										<div class="menu_status" style="display: none;" id='.$new['id'].'>
										<button value="3" class="end">Kết thúc tìm giúp việc</button>
										<button value="1" class="finding selected">Đang tìm giúp việc</button>
										<button value="2" class="done">Đã tìm được giúp việc</button>
										</div>';
										break;
									case '2':
										echo '<button class="change_post_status">
										<span class="text done">Đã tìm được giúp việc</span>
										<span class="img"><img src="/images/arrow_down.svg" alt="mui ten"></span>
										</button>
										<div class="menu_status" style="display: none;" id='.$new['id'].'>
										<button value="3" class="end">Kết thúc tìm giúp việc</button>
										<button value="1" class="finding">Đang tìm giúp việc</button>
										<button value="2" class="done selected">Đã tìm được giúp việc</button>
										</div>';
										break;
									case '3':
										echo '<button class="change_post_status">
										<span class="text end">Kết thúc tìm giúp việc</span>
										<span class="img"><img src="/images/arrow_down.svg" alt="mui ten"></span>
										</button>
										<div class="menu_status" style="display: none;" id='.$new['id'].'>
										<button value="3" class="end selected">Kết thúc tìm giúp việc</button>
										<button value="1" class="finding">Đang tìm giúp việc</button>
										<button value="2" class="done">Đã tìm được giúp việc</button>
										</div>';
										break;
									
								}
								?>
								<!-- <button class="change_post_status">
									<span class="text end">Kết thúc tìm giúp việc</span>
									<span class="img"><img src="/images/arrow_down.svg" alt="mui ten"></span>
								</button>
								<div class="menu_status" style="display: none;">
									<button class="end selected">Kết thúc tìm giúp việc</button>
									<button class="finding">Đang tìm giúp việc</button>
									<button class="done">Đã tìm được giúp việc</button>
								</div> -->
							</div>
							<button class="job_edit" onclick="window.location.href='edit-post?id=<?=$new['id']?>'"><img src="/images/job_edit.svg" alt="sua tin"></button>
							<button class="re_new" type="button" onclick="renew_post(<?= $new['id'] ?>)"><i class="fa fa-refresh" aria-hidden="true"></i></button>
						</div>
					<? } ?>
                    <!-- <div class="row">
                        <p class="job_id">ID001</p>
                        <p class="job_title">Tìm gấp giúp việc nhà tại Hà Nội </p>
                        <p class="job_location">Số 1 Minh Khai</p>
                        <p class="job_salary">8.000.000VNĐ /Tháng</p>

                        <div class="post_status">
                            <button class="change_post_status">
                            <span class="text end">Kết thúc tìm giúp việc</span>
                            <span class="img"><img src="/images/arrow_down.svg" alt="mui ten"></span>
                            </button>
                            <div class="menu_status" style="display: none;">
                                <button class="end selected">Kết thúc tìm giúp việc</button>
                                <button class="finding">Đang tìm giúp việc</button>
                                <button class="done">Đã tìm được giúp việc</button>
                            </div>
                        </div>
                        <button class="job_edit"><img src="/images/job_edit.svg" alt="sua tin"></button>
                    </div> -->
                    
                </div>
                <div class="pagination_box">
					<div class="pagination">
						<ul>
							<li><button id="minus_page"><img src="/images/pagination_prev.svg" alt="nut lui trang"></button></li>
							<li><input type="number" id="current_page" class="active" max="<?=$total_page?>" value="<?=$page?>"></li>
							<li><button id="add_page"><img src="/images/pagination_next.svg" alt="nut tien"></button></li>
						</ul>
					</div>
					<span class="total_page"> of <?=$total_page?></span>
				</div>
            </div>
        </div>
        <!-- het danh sach tin tuyen dung da dang -->

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
                    <button onclick="close_post_success()" class="ok" id="ok">OK</button>
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
