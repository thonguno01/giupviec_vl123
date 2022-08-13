<style type="text/css">
    .timkiemgs .select2-selection{
        margin-left: 1.5rem;
        height: 35px;
    }
    .select2-dropdown--below{
        width: 368.038px!important;
        margin-left: 1.5rem;
    }
   .label_tit{
    margin-top: 30px;
   }
</style>

<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Bài viết giúp việc
            <small>Sửa</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="list_post_tag.php"><i class="fa fa-dashboard"></i>Bài viết giúp việc</a></li>
            <li><a href="">Sửa</a></li>
        </ol>
    </section>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body ">
                  <form  id="form-gvTags" class="form-gvTags" action="">
                        <div class="row_tag">
                            <label for="content" class="label_tit title">Nội dung</label>
                            <textarea name="content" id="content" class="" id-new="<?php echo $post['new_id']; ?>" cols="30" rows="10"><?php echo $post['content'];?></textarea>
                        </div>
                        <div class="row_tag">
                            <label for="suggest_title" class="label_tit title">Tiêu đề gợi ý</label>
                            <input type="text" name="suggest_title" value="<?php echo $post['title_suggest']?>" style="width: 50%;">
                        </div>
                        <div class="row_tag">
                            <label for="suggest_content" class="label_tit title">Nội dung gợi ý</label>
                            <textarea name="suggest_content" class="" id="suggest_content" cols="30" rows="10"><?php echo $post['content_suggest'];?></textarea>
                        </div> 
                        <div class="row_tag">
                            <input type="button" name="edit_gvTag" id="update" class="update edit_gvtags" value="Cập nhật">
                            <input type="button" id="reset" class="update" value="Làm lại">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
