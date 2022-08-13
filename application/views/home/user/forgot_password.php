<div class="main_content">
	<div class="main_box">
		<p class="title">Quên mật khẩu</p>
		<div class="center_box">
			<div class="box_img">
				<img src="/images/forgot_password_bg.png" alt="anh nen">
			</div>
			<div class="box_form">
				<div class="row_input">
					<img src="/images/input_email_white.svg" alt="icon email">
					<input type="text" name="email" id="email" placeholder="abx@gmail.com">
				</div>
				<p class="warning" id="error_email"></p>
				<div class="text_box">
					<p class="content">Nhập Email đã đăng ký tài khoản <?=$account_type?> trên <a href="#">giupviec.vieclam123.vn</a></p>
					<p class="content">Chúng tôi sẽ gửi <strong>email</strong> đặt lại mật khẩu tới email của bạn.</p>
				</div>
				<button type="button" onclick="return form_validate();" id="send_email">Tiếp tục</button>
			</div>
		</div>
	</div>
</div>
