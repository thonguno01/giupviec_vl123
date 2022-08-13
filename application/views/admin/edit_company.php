<style>
  .t_form_group{
    padding-right: 20px;
    padding-left: 20px;
  }
</style>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Quản lý thuê giúp việc
            <small> Sửa tài khoản người thuê giúp việc</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="/admin/list_ntd"><i class="fa fa-dashboard"></i>quay lại</a></li>
        </ol>
    </section>
    <div class="row">
        <div class="col-lg-12">
            <div class="t_box_right">
                <div class="t_form_group">
				<div class="form_register">
			<div class="image">
			<input id="avata" type="file">
				<div id="show_avata">
  					<?if($company['image']){?>
						<img src="<?=rewirte_company_img_href($company['id'],$company['image'])?>" alt="anh dai dien">
						<?}?>
				</div>
			</div>
			<div class="form_input">
                <div class="row">
                    <div class="left">
                        <label for="email">
                                    <span>Email</span>
                                    <span class="warning">*</span>
                                </label>
                        <input type="text" name="email" id="email" placeholder="Nhập địa chỉ email" value="<?=$company['email']?>" disabled>
                    </div>
                    <div class="right">
                        <label for="phone">
                                    <span>Số điện thoại</span>
                                    <span class="warning">*</span>
                                </label>
                        <input type="text" name="phone" id="phone" placeholder="Nhập số điện thoại" value="<?=$company['phone']?>" disabled>
                    </div>
                </div>
                <div class="row">
                    <div class="left">
                        <label for="name">
                                    <span>Họ và tên</span>
                                    <span class="warning">*</span>
                                </label>
                        <input type="text" name="name" id="name" placeholder="Nhập họ và tên" value="<?=$company['name']?>">
                        <p class="warning" id="error_name"></p>
                    </div>
                    <div class="right">
                        <label for="birthday">
                                    <span>Ngày sinh</span>
                                    <span class="warning">*</span>
                                </label>
                        <input type="date" name="birth" id="birth" value="<?=date('Y-m-d',$company['birth'])?>">
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
                        <label for="address">
                                    <span>Địa chỉ cụ thể</span>
                                    <span class="warning">*</span>
                                </label>
                        <input type="text" name="address" id="address" placeholder="Nhập địa chỉ cụ thể" value="<?=$company['address']?>">
                        <p class="warning" id="error_address"></p>
                    </div>
                </div>
                <div class="btn_register">
					<button onclick="update_company()" type="button">Cập nhật</button>
				</div>
            </div>
	</div>
                </div>
            </div>

        </div>
    </div>
</div>

