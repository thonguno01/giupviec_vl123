<style type="text/css">
    
</style>
<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Thêm mới 
        <small>Tags</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Tags</a></li>
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
                                    <form method="POST" class="form" id="formAddTag">
                                        <div class="row">
                                            <div class="col-md-6">
											<input hidden type="text" name="tag_id" value="<?=$tag['id']?>">
                                                <div class="form-group t-form-group">
                                                    <label for="">Nội dung <span>*</span></label>
                                                    <input type="text" class="form-control" name="content" placeholder="Nhập nôi dung" value="<?=$tag['content']?>">
                                                    <span class="form-message"></span>
                                                </div>
                                                <div class="form-group t-form-group">
                                                <label for="">Mô tả<span>*</span></label>
                                                    <textarea class="form-control" name="description" placeholder="Nhập mô tả " rows="5" cols="25"><?=$tag['description']?></textarea>
                                                    <span class="form-message"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="st-tb-tow text-center">
                                                    <div class="user-img text-center" id="show_img">
														<?if($tag['image']){?>
                                                        <img src="<?= rewirte_job_style_img_href($tag['id'], $tag['image']) ?>" id="ghost" id="img-preview" class="avt" style= 'max-width:118px; max-height:133px'>
														<?}else{?>
															<img src="/images/giup-viec.png" id="ghost" id="img-preview" class="avt" width="118px" height="133px">
															<?}?>
                                                    </div>
													<input type="file" id="image" name="image" class="t_upload_img">
                                                    <div class="xt-p text-center pt-3">
                                                        <p>
                                                            Chọn ảnh 
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                         <div class="infor-tt text-center">
                                            <button class="btn btn_reg1 click_add_tutor" type="submit" name="add_tutor">Cập nhật</button>
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
