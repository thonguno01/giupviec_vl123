<div class="main_content">
	<div class="main_box">
		<p class="title">Quên mật khẩu</p>
		<div class="center_box">
			<div class="box_img">
				<img src="/images/reset_password_bg.png" alt="anh nen">
			</div>
			<div class="box_form">
					<label for="password">Mật khẩu mới</label>
					<div class="row_input">
						<img src="/images/input_password.svg" alt="icon mat khau">
						<input type="password" id="password" placeholder="Nhập mật khẩu mới">
					</div>
					<p class="warning" id="error_password"></p>
					<label for="repassword">Nhập lại mật khẩu mới</label>
					<div class="row_input">
						<img src="/images/input_password.svg" alt="icon nhap lai mat khau">
						<input type="password" id="repassword" placeholder="Nhập lại mật khẩu mới">
					</div>
					<p class="warning" id="error_repassword"></p>

					<button type="button" onclick="reset_password()" id="send_email">Đặt lại mật khẩu</button>
			</div>
		</div>
	</div>
</div>
