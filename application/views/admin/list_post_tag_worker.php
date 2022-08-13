<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Bài viết tags giúp việc
            <small>Danh sách</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="list_post_tag.php"><i class="fa fa-dashboard"></i>Bài viết tags giúp việc</a></li>
            <li><a href="">Danh sách</a></li>
        </ol>
    </section>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body ">
					<form method="GET" action="search_tag_worker">
                    <div class="input-group timkiemph form-search-tag-gv " style="display: flex;width: 45%;">
                         <select class="form-control tk_gvtags" id="gvtags" name="gvtags" style="margin-left: 15px important;">
                            <? 
                            if (isset($tag_search)) {?>
								<option value="0">Chọn loại công việc</option>
                                <? foreach ($list_tag as $key => $tag) {
                                    if ($tag['id'] == $tag_search) {?>
                                        <option value="<?=$tag['id']?>" selected> <?=$tag['content']?></option>
                                <?  }else{?>
									<option value="<?=$tag['id']?>"> <?=$tag['content']?></option>
								<?}
							} ?>
                                
                            <?}else{?>
                                <option value="0">Chọn loại công việc</option>
                                <?foreach ($list_tag as $key => $tag) {?>
                                    <option value="<?=$tag['id']?>"><?=$tag['content'] ?></option>
                                <?}  
                            } ?>
                        </select>
                        <div class="input-group-append ml-2" style="margin-left: 1.5rem!important;">
                            <input type="submit" class="btn btn-warning search_tag_gv btn-search" value="Tìm kiếm" >
                        </div>
                    </div>
					</form>
                    <span style="color:red;">Nhập thông tin để tìm kiếm.</span>
                    <div class="content_search">
                        <table data-toolbar="#toolbar" data-toggle="table" class="table table-hover">
                            <thead style="background: #f1f4f7;">
                            <tr>
                                <th data-field="stt" data-sortable="true">ID</th>
                                <th data-field="avt" data-sortable="true">Loại công việc</th>
                                <th data-field="" data-sortable="true">Thể loại</th>
                                <th data-field="name" data-sortable="true">Đường dẫn</th>
                                <th>Sửa</th>
                            </tr>
                            </thead>
                            <tbody class="">
                            <? if(!empty($list_post)){
                                foreach($list_post as $row){ ?>  
                                <tr>
                                    <td class="td-count" scope="row"><?= $row['new_id']; ?></td>
                                    <td><?=$row['content'];?></td>
                                    <td>Bài viết tag giúp việc</td>
                                    <td style="">
                                        <a href="<?=rewrite_tag_link($row['alias'],$row['id'])?>" class="t_city_item" target="_blank"><?=base_url().rewrite_tag_link($row['alias'],$row['id'])?></a>
                                    </td>

                                    <td class="form-group">
                                        <a href="edit_post_tag/<? echo $row['new_id'] ?>" class="btn btn-primary" style="padding: 4px 6px;"><i
                                                class="glyphicon glyphicon-pencil"></i></a>
                                    </td>
                                </tr>
                                <?}?>
                            <?}?>
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

