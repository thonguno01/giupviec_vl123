<style type="text/css">
    .timkiemgs .select2-selection{
        margin-left: 1.5rem;
        height: 35px;
    }
    .select2-dropdown--below{
        width: 368.038px!important;
        margin-left: 1.5rem;
    }
    .content_search{
        width: 100%;
        overflow-x: auto;
    }
    /**/
</style>

<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Quản lý thuê giúp việc
            <small>Lịch sử sử dụng điểm</small>
        </h1>
        
    </section>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body ">
                      <div class="content_search">
                        <p>ID: <?=$company["id"]?></p>
                        <p>Tên công ty: <?=$company["name"]?></p>
                        <p>Email: <?=$company["email"]?></p>
                    </div>
					<form method="GET" action="/admin/search_history_point">
                    <div class="input-group timkiemph form-search-history " style="display: flex;width: 100%;">
                        <input type="hidden" name="company_id" value="<?=$company["id"]?>">
                        <label for="ngaybd" class="col-md-3"> Nhập ngày bắt đầu:</label>
                        <input type="date" name="ngaybd" id="ngaybd" class="form-control phone ml-2"
                            <? if (isset($ngaybd)) {?>
                                value ="<?=$ngaybd?>"  
                            <?}else{?>
                                 placeholder="Nhập ngày bắt đầu"
                            <?} ?>
                          style="margin-left: 15px;">
                        <label for="ngaykt" class="col-md-3"> Nhập ngày kết thúc:</label>
                        <input type="date" name="ngaykt" id="ngaykt" class="form-control phone ml-2"
                            <? 
                                if (isset($ngaykt)) {?>
                                     value ="<?=$ngaykt?>"  
                                <?}else{?>
                                     placeholder="Nhập ngày kết thúc"
                                <?} ?>
                            
                        style="margin-left: 15px;">

                        <div class="input-group-append ml-2" style="margin-left: 1.5rem!important;">
                            <input type="submit" class="btn btn-warning search_tutor btn-search-history" value="Tìm kiếm" >
                        </div>
                    </div>
					</form>
                  
                    <div class="content_search">
                        <table data-toolbar="#toolbar" data-toggle="table" class="table table-hover">
                            <thead style="background: #f1f4f7;">
                            <tr>
                                <th data-field="stt" data-sortable="true">STT</th>
                                <th data-field="noidung" data-sortable="true">Nội dung</th>
                                <th data-field="time" data-sortable="true">Thời gian</th>
                               
                            </tr>
                            </thead>
                            <tbody class="">
                            <? if(!empty($list_history)){
                                date_default_timezone_set('Asia/Ho_Chi_Minh');
                                $key = 1;
                                foreach($list_history as $item){ ?>  
                                    <tr>
                                        <td class="td-count" scope="row"><?= $key++; ?></td>
                                        <td> Sử dụng điểm xem thông tin của ứng viên mã số:<span style="color: blue;"> <?=$item['user_id']?></span></td>
                                        <td> <?=date("H:i d-m-Y",$item['create_at'])?></td>
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
