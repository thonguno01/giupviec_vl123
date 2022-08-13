
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Quản lý tài khoản
            <small>Danh sách</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i>Quản lý tài khoản</a></li>
            <li><a href="">Danh sách</a></li>
        </ol>
    </section>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body ">
					<form method="GET" action="/admin/search_tag">
                    <div class="input-group timkiemph form-search-tag " style="display: flex;width: 45%;">
                         <select class="form-control tk_tags" id="tags" name="tags" style="margin-left: 15px important;">
                            <? 
                            if (isset($tagSearch)) {?>
                                <? foreach ($list_tag_full as $key => $tag) {
                                    if ($tag['id'] == $tagSearch) {?>
                                        <option value="<?=$tag['id']?>"> <?=$tag['content']?></option>
                                <?  }} ?>
                                <? foreach ($list_tag_full as $key => $tag) {
                                    if ($tag['id']!= $tagSearch) {?>
                                        <option value="<?=$tag['id']?>"> <?=$tag['content']?></option>
                                <?  }} ?>
                                
                            <?}else{?>
                                <option value="0">Chọn loại công việc</option>
                                <?foreach ($list_tag_full as $key => $tag) {?>
                                    <option value="<?=$tag['id']?>"><?=$tag['content'] ?></option>
                                <?}  
                            } ?>
                        </select>
                        <div class="input-group-append ml-2" style="margin-left: 1.5rem!important;">
                            <input type="submit" class="btn btn-warning search_tag btn-search" value="Tìm kiếm" >
                        </div>
                    </div>
					</form>
                    <span style="color:red;">Nhập thông tin để tìm kiếm.</span>
                    <div class="content_search">
                        <table data-toolbar="#toolbar" data-toggle="table" class="table table-hover">
                            <thead style="background: #f1f4f7;">
                            <tr>
                                <th data-field="stt" data-sortable="true">ID</th>
                                <th data-field="account1" data-sortable="true">Ảnh</th>
                                <th data-field="account" data-sortable="true">Nội dung</th>
                                <th data-field="account2" data-sortable="true">Mô tả</th>
                                <th>Sửa</th>
                            </tr>
                            </thead>
                            <tbody class="">
                            <? if(!empty($list_tag)){
                                foreach($list_tag as $list){ ?> 
                                    <tr>
                                        <td> <?=$list['id']?></td>
                                        <td>
										<?if($list['image']){?>
											<img src="<?= rewirte_job_style_img_href($list['id'], $list['image']) ?>" alt="anh tag" style="max-width:100px; max-height: 100px">
											<?} else{?>
												<img src="/images/giup-viec.png" alt="anh tag" style="max-width:100px; max-height: 100px">
										<?}?>
                                        </td>
                                        <td> <?=$list['content']?></td>
                                        <td><?=$list['description'];?></td>
                                        <td class="form-group">
                                            <a href="edit_tag/<? echo $list['id'] ?>" class="btn btn-primary" style="padding: 4px 6px;"><i
                                                        class="glyphicon glyphicon-pencil"></i></a>
                                        </td>
                                    </tr>
                                <?} 
                            }?> 
                            </tbody>
                        </table>
                        <div class="t_paginate">
                            <div class="t_paginate_group">  
                                    <?=$links; ?>          
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

