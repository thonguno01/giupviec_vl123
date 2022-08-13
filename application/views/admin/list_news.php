<style type="text/css">
    .timkiemgs .select2-selection{
        margin-left: 1.5rem;
        height: 35px;
    }
    .select2-dropdown--below{
        width: 368.038px!important;
        margin-left: 1.5rem;
    }
</style>

<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Danh sách
            <small>Việc làm</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Việc làm</a></li>
            <li><a href="#">Danh sách</a></li>
        </ol>
    </section>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body ">
					<form method="GET" action="/admin/search_news">
                    <div class="input-group timkiemph form-search-job " style="display: flex;width: 100%;">
                          <!-- id -->
                         <input type="text" name="id" class="form-control col-5 id" 
                            <? if (isset($id)) {?>
                                     value="<?=$id?>" 
                                <?}?>
                                    placeholder="Nhập mã việc làm" 
                           aria-label="Nhập từ khoá" aria-describedby="basic-addon2" style="margin-right: 15px;">
                        <!-- tk email -->
                        <input type="text" name="title" class="form-control col-5 title"
                            <? if (isset($title)) {?>
                                value="<?=$title?>" 
                            <?}?>
                                placeholder="Nhập tiêu đề"
                          aria-label="Nhập từ khoá" aria-describedby="basic-addon2" style="margin-right: 15px;">
                        <!-- tk ten -->
                        <input type="text"  name="name" class="form-control col-5 name"
                             <? if (isset($name)) {?>
                                value="<?=$name?>" 
                            <?}?>
                                  placeholder="Nhập tên người đăng"
                       aria-label="Nhập từ khoá" aria-describedby="basic-addon2" style="margin-right: 15px;">
                        <!-- tp -->
                        <select class="form-control tk_city" id="tk_city" name="city_id" style="margin-left: 15px important;">
						<? 
                            // $list_city = list_city();
                            if (isset($city_id)) {?>
								<option value="0">Tất cả tỉnh/thành phố</option>
                                <? foreach ($list_city as $key => $cty) {
                                    if ($cty['cit_id'] == $city_id) {?>
                                        <option value="<?=$cty['cit_id']?>" selected> <?=$cty['cit_name']?></option>
                                <?  }} ?>
                                <? foreach ($list_city as $key => $cty) {
                                    if ($cty['cit_id']!= $city_id && $cty['cit_parent'] == 0) {?>
                                        <option value="<?=$cty['cit_id']?>"> <?=$cty['cit_name']?></option>
                                <?  }} ?>
                                
                            <?}else{?>
                                <option value="0">Chọn tỉnh/thành phố</option>
                                <?foreach ($list_city as $key => $cit) {?>
                                    <option value="<?=$cit['cit_id']?>"><?=$cit['cit_name'] ?></option>
                                <?}  
                            } ?>
                        </select>
                         
                        <!-- tk địa chỉ -->
                        <input type="text" name="address" class="form-control phone ml-2"
						<? if (isset($address)) {?>
                                value ="<?=$address?>"  
                            <?}?> placeholder="Nhập địa chỉ" aria-label="Nhập từ khoá" aria-describedby="basic-addon2" style="margin-left: 15px;">
                        <input type="date" name="ngaybd" class="form-control phone ml-2"
                            <? if (isset($ngaybd)) {?>
                                value ="<?=$ngaybd?>"  
                            <?}?>
                                 placeholder="Nhập ngày bắt đầu"
                          style="margin-left: 15px;">
                        <input type="date" name="ngaykt" class="form-control phone ml-2"
                            <? 
                                if (isset($ngaykt)) {?>
                                     value ="<?=$ngaykt?>"  
                                <?}?>
                                     placeholder="Nhập ngày kết thúc"
                        style="margin-left: 15px;">


                        <select class="form-control nguon" id="status" name="new_status" style="margin-left: 1.5rem!important;">
                            <? if (isset($new_status)) {?>
								<option value="">Chọn trạng thái</option>
                                <option value="1"  <? if($new_status == '1' ) echo "selected" ?>>Đang tìm giúp việc</option>
                                <option value="2" <? if($new_status == '2' ) echo "selected" ?>>Đã tìm được giúp việc</option>
                                <option value="3" <? if($new_status == '3' ) echo "selected" ?>>Kết thúc tìm giúp việc</option>
                                <option value="0" <? if($new_status == '0' ) echo "selected" ?>>Hết hạn</option>
                            <?}else{?>
                                <option value="">Chọn trạng thái</option>
                                <option value="1">Đang tìm giúp việc</option>       
                                <option value="2">Đã tìm được giúp việc</option>
                                <option value="3">Kết thúc tìm giúp việc</option>
                                <option value="0">Hết hạn</option>
                            <?} ?>
                            
                        </select>
                        <div class="input-group-append ml-2" style="margin-left: 1.5rem!important;">
                            <input type="submit" class="btn btn-warning search_job btn-search" value="Tìm kiếm" >
                        </div>
                    </div>
					</form>
                    <span style="color:red;">Nhập thông tin để tìm kiếm.</span>
                    <div class="content_search">
                        <table data-toolbar="#toolbar" data-toggle="table" class="table table-hover">
                            <thead style="background: #f1f4f7;">
                            <tr>
                                <th data-field="stt" data-sortable="true">STT</th>
                                <th data-field="id" data-sortable="true">ID</th>
                                <th data-field="title" data-sortable="true">Tiêu đề</th>
                                <th data-field="name" data-sortable="true">Người đăng</th>
                                <th data-field="adress" data-sortable="true" style="width: 20%;">Địa chỉ</th>
                                <th data-field="date_regis" data-sortable="true">Ngày Đăng</th>
                                <th data-field="luong" data-sortable="true">Mức lương</th>
                                <th data-field="active" data-sortable="true">Trạng thái</th>
                                <th data-field="index" data-sortable="true">index</th>
                                <th>Sửa</th>
                            </tr>
                            </thead>
                            <tbody class="">
                            <? if(!empty($list_news)){
                                $key = 1;
                                foreach($list_news as $list){ ?>  
                                    <tr>
                                        <td class="td-count" scope="row"><?= $key++; ?></td>
                                        <td>
                                            <?=$list['id'];?>
                                        </td>
                                        <td style="">
                                            <? echo $list['title'] ?>
                                            <br>
                                            <a href="<? echo rewrite_new_detail_link($list['alias'], $list['id']) ?>" target="_blank"><? echo rewrite_new_detail_link($list['alias'], $list['id']) ?>
                                        </td>
                                        <td style=""></a>
                                            <? echo $list['name'] ?>
                                            <br>
                                            <a href="<? echo rewrite_company_link($list['alias_company'], $list['company_id']) ?>" target="_blank"><? echo rewrite_company_link($list['alias_company'], $list['company_id']) ?>
                                        </td>
                                        <td style="height: 50px; -webkit-line-clamp: 2;-webkit-box-orient: vertical;overflow: hidden;display: -webkit-box;"><? echo $list['full_address'] ?></td>
                                        <td>
                                             <? echo date('d-m-Y', $list['create_at']) ?>
                                        </td>
                                        <td >
                                            <? echo rewrite_salary($list['salary_type'], $list['salary1'], $list['salary2'],$list['salary_time']) ?>
                                        </td>   
                                        <td class="">
                                            <? if ($list['new_status'] == 0 || $list['close_time']<strtotime(date('Y-m-d'))) {?>
                                                <p class="t_table_selectgray">Hết hạn</p>
                                            <?}else{?>
                                                <? if($list['new_status'] == 1) {?>
                                                <select data-id="<?=$list['id']?>" data-select="data-select" class="t_table_select t_table_selectyl form-control new_status" >
                                                    <option value="1">Đang tìm giúp việc</option>       
                                                    <option value="2">Đã tìm được giúp việc</option>
                                                    <option value="3">Kết thúc tìm giúp việc</option>
                                                </select>
                                                <?}elseif($list['new_status'] == 2) {?>
                                                <select data-id="<?=$list['id']?>" data-select="data-select" class="t_table_select t_table_selectgr form-control new_status" >
                                                    <option value="2">Đã tìm được giúp việc </option>   
                                                    <option value="1">Đang tìm giúp việc</option>       
                                                    <option value="3">  Kết thúc tìm giúp việc</option>                                                     
                                                </select>
                                                <?}elseif($list['new_status'] == 3) {?>
                                                <select data-id="<?=$list['id']?>" data-select="data-select" class="t_table_select t_table_selectr form-control new_status" >
                                                    <option value="3">Kết thúc tìm giúp việc</option>       
                                                    <option value="2">Đã tìm được giúp việc </option>   
                                                    <option value="1">Đang tìm giúp việc</option>                                                       
                                                </select>
                                            <?}}?>
                                        </td>
                                        <td>
                                            <input data-id="<?=$list['id']?>" class="new_index" type="checkbox" <?=($list['new_index']==1)?"checked":""?>>
                                        </td>
                                        <td class="form-group">
                                            <a href="edit_news/<? echo $list['id'] ?>" class="btn btn-primary" style="padding: 4px 6px;"><i class="glyphicon glyphicon-pencil"></i></a>
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
