<div class="main_content">
	<div class="form_register">
			<title class="form_title">NGƯỜI TUYỂN DỤNG ĐĂNG KÝ</title>
			<div class="image">
			<input id="avata" type="file">
				<div id="show_avata">

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
						<input type="text" name="phone" id="phone" placeholder="Nhập số điện thoại" oninput="this.value = this.value.replace(/[' ~!@#$%^&*()_+=`{}\[\]\-|\\:;'<>,.\/? '.]/g, '');">
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
					<div class="center">
						<label for="address">
							<span>Địa chỉ cụ thể</span>
							<span class="warning">*</span>
						</label>
						<input type="text" name="address" id="address" placeholder="Nhập địa chỉ cụ thể">
						<p class="warning" id="error_address"></p>
					</div>
				</div>
				<div class="btn_register">
					<button onclick="register()" type="button">Đăng ký</button>
				</div>
				<div class="login_row">
					<span>Bạn đã có tài khoản?</span>
					<span><a href="/login/company">Đăng nhập ngay</a></span>
				</div>
			</div>
	</div>
</div>

