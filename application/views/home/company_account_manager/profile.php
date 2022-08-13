
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
			<button id="general" class="active">Quản lý chung</button>
			<button id="post">Đăng tin tuyển giúp việc</button>
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
    <!-- thong tin ca nhan -->
    <div class="block_profile">
        <div class="box_content">
            <p class="title">THÔNG TIN CÁ NHÂN</p>
            <div class="form_input">
                <div class="row">
                    <div class="left">
                        <label for="profile_email">
                                    <span>Email</span>
                                    <span class="warning">*</span>
                                </label>
                        <input type="text" name="profile_email" id="profile_email" placeholder="Nhập địa chỉ email" value="<?=$company['email']?>" disabled>
                        <p class="warning" id="error_profile_email"></p>
                    </div>
                    <div class="right">
                        <label for="profile_phone">
                                    <span>Số điện thoại</span>
                                    <span class="warning">*</span>
                                </label>
                        <input type="text" name="profile_phone" id="profile_phone" placeholder="Nhập số điện thoại" value="<?=$company['phone']?>" disabled>
                        <p class="warning" id="error_profile_phone"></p>
                    </div>
                </div>
                <div class="row">
                    <div class="left">
                        <label for="profile_name">
                                    <span>Họ và tên</span>
                                    <span class="warning">*</span>
                                </label>
                        <input type="text" name="profile_name" id="profile_name" placeholder="Nhập họ và tên" value="<?=$company['name']?>">
                        <p class="warning" id="error_profile_name"></p>
                    </div>
                    <div class="right">
                        <label for="profile_birthday">
                                    <span>Ngày sinh</span>
                                    <span class="warning">*</span>
                                </label>
                        <input type="date" name="profile_birthday" id="profile_birthday" value="<?=date('Y-m-d',$company['birth'])?>">
                        <p class="warning" id="error_profile_birthday"></p>
                    </div>
                </div>
                <div class="row">
                    <div class="left">
                        <label for="province">
                                    <span>Tỉnh/Thành phố</span>
                                    <span class="warning">*</span>
                                </label>
                        <select name="province" id="province">
                                    <?
									foreach($list_city as $city){
										if($city['cit_id']==$company['city_id']){
											echo '<option value="'.$city['cit_id'].'" selected>'.$city['cit_name'].'</option>';
										}
										else{
											echo '<option value="'.$city['cit_id'].'">'.$city['cit_name'].'</option>';
										}
									}
									?>
                                </select>
                        <p class="warning" id="error_province"></p>
                    </div>
                    <div class="right">
                        <label for="district">
                                    <span>Quận/Huyện</span>
                                    <span class="warning">*</span>
                                </label>
                        <select name="district" id="district">
									<?
									foreach($list_district as $district){
										if($district['cit_id']==$company['city_id']){
											echo '<option value="'.$district['cit_id'].'" selected>'.$district['cit_name'].'</option>';
										}
										else{
											echo '<option value="'.$district['cit_id'].'">'.$district['cit_name'].'</option>';
										}
									}
									?>
                                </select>
                        <p class="warning" id="error_district"></p>
                    </div>
                </div>
                <div class="row">
                    <div class="center">
                        <label for="profile_address">
                                    <span>Địa chỉ cụ thể</span>
                                    <span class="warning">*</span>
                                </label>
                        <input type="text" name="profile_address" id="profile_address" placeholder="Nhập địa chỉ cụ thể" value="<?=$company['address']?>">
                        <p class="warning" id="error_profile_address"></p>
                    </div>
                </div>
                <div class="box_btn">
                    <button class="update" onclick="update_profile()" type="button">Cập nhật</button>
                </div>
            </div>
        </div>
    </div>
    <!-- het thong tin ca nhan -->
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
