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
            <small>Danh sách</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="/admin/list_company"><i class="fa fa-dashboard"></i> Người thuê giúp việc</a></li>
            <li><a href="/admin/list_company">Danh sách</a></li>
        </ol>
    </section>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body ">
					<form action="/admin/search_company" method="GET">
                    <div class="input-group timkiemph form-search-ntd " style="display: flex;width: 100%;">
                          <!-- id -->
                        <input type="text" name="id" class="form-control col-5 id" 
                        <? if (isset($id)) {?>
                                 value="<?=$id?>" 
                            <?}?>
                                placeholder="Nhập mã công ty"
                       aria-label="Nhập từ khoá" aria-describedby="basic-addon2" style="margin-right: 15px;">
                        <!-- tk email -->
                        <input type="text" name="email" class="form-control col-5 email"
                            <? if (isset($email)) {?>
                                value="<?=$email?>" 
                            <?}?>
                                placeholder="Nhập email"
                          aria-label="Nhập từ khoá" aria-describedby="basic-addon2" style="margin-right: 15px;">
                        <!-- tk ten -->
                        <input type="text"  name="name" class="form-control col-5 name"
                             <? if (isset($name)) {?>
                                value="<?=$name?>" 
                            <?}?>
                                  placeholder="Nhập tên"

                       aria-label="Nhập từ khoá" aria-describedby="basic-addon2" style="margin-right: 15px;">
                        <!-- tk sdt -->
                        <input type="text" name="phone" class="form-control col-5 phone" 
                             <? if (isset($phone)) {?>
                                value="<?=$phone?>" 
                            <?}?>
                                 placeholder="Nhập số điện thoại" 

                         aria-label="Nhập từ khoá" aria-describedby="basic-addon2" style="margin-right: 15px;">

                        <!-- tp -->
                        <select class="form-control tk_city" id="tk_city" name="city" style="margin-left: 15px important;">
                         
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
                        <input type="text" name="address" class="form-control phone ml-2" placeholder="Nhập địa chỉ" aria-label="Nhập từ khoá" aria-describedby="basic-addon2" style="margin-left: 15px;">

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

                        <select class="form-control nguon" id="nguon_dk" name="nguon_dk" style="margin-left: 1.5rem!important;">
                            <? if (isset($nguon_dk)) {
                                if ($nguon_dk == 1) {?>
                                   <option value="1">Web</option>
                                    <option value="0">Chọn nguồn ĐK</option>
                                    <option value="2">App</option>
                                <?}elseif($nguon_dk == 2){?>
                                    <option value="2">App</option>
                                    <option value="0">Chọn nguồn ĐK</option>
                                    <option value="1">Web</option>
                                <?}
                            }else{?>
                                <option value="0">Chọn nguồn ĐK</option>
                                <option value="1">Web</option>
                                <option value="2">App</option>
                            <?} ?>
                            
                        </select>
                        <div class="input-group-append ml-2" style="margin-left: 1.5rem!important;">
                            <input type="submit" class="btn btn-warning search_tutor btn-search" value="Tìm kiếm" >
                        </div>
                    </div>
					</form>
                    <span style="color:red;">Nhập tên, số điện thoại, email, ID để tìm kiếm.</span>
                    <div class="content_search">
                        <table data-toolbar="#toolbar" data-toggle="table" class="table table-hover">
                            <thead style="background: #f1f4f7;">
                            <tr>
                                <th data-field="stt" data-sortable="true">STT</th>
                                <th data-field="id" data-sortable="true">ID</th>
                                <th data-field="name" data-sortable="true">Họ & Tên</th>
                                <th data-field="email" data-sortable="true">Email</th>
                                <th data-field="sdt" data-sortable="true">SĐT</th>
                                <th data-field="adress" data-sortable="true">Địa chỉ</th>
                                <th data-field="date_regis" data-sortable="true">Ngày ĐK</th>
                                <th data-field="re_regis" data-sortable="true">Nguồn ĐK</th>
								<th data-field="xacthuc" data-sortable="true">Kích hoạt</th>
                                <th data-field="active" data-sortable="true">Trạng thái</th>
                                <th>Sửa</th>
                            </tr>
                            </thead>
                            <tbody class="">
                            <? if(!empty($list_company)){
                                $key = 1;
                                foreach($list_company as $list){ ?>  
                                    <tr>
                                        <td class="td-count" scope="row"><?= $key++; ?></td>
                                        <td>
                                            <?=$list['id'];?>
                                        </td>
                                        <td style="">
                                            <? echo $list['name'] ?>
                                            <br>
                                            <a href="<? echo rewrite_company_link($list['alias'], $list['id']) ?>" target="_blank"><? echo rewrite_company_link($list['alias'], $list['id']) ?>
                                        </td>
                                        <td style=""></a>
                                            <? echo $list['email'] ?>
                                        </td>
                                        <td style=""><? echo $list['phone'] ?></td>
                                        <td>
                                            <? echo $list['address'] ?>
                                        </td>
                                        <td >
                                            <? echo date('d-m-Y', $list['create_at']) ?>
                                        </td>
                                        <td>
                                            <?= ($list['register_source'] == 1) ? 'Web' : 'App' ?>
                                        </td>
                                        <td class="">
                                            <?
                                            if ($list['active'] == 0) {?>
                                                <select class="form-control active_uv" name="active" style="border:none;" data-id="<?=$list['id']; ?>">
                                                    <option value="0">Chưa kích hoạt</option>
                                                    <option value="1">Kích hoạt</option>
                                                </select>
                                            <?} else if($list['active'] == 1){?>
                                                <select class="form-control un_active_uv" name="active" style="border:none;" data-id="<?=$list['id']; ?>">
                                                    <option value="1">Đã kích hoạt</option>
                                                    <option value="0">Hủy kích hoạt</option>
                                                </select>
                                            <?}?>
                                        </td>
                                        <td>
                                            <? if($list['turn'] == 1):?>
                                                <input type="checkbox" class="up_turn" data-id="<?=$list['id'];?>" data-type="0" checked>
                                            <? else:?>
                                                <input class="up_turn" data-id="<?=$list['id'];?>" data-type="1" type="checkbox">
                                            <? endif;?>
                                        </td>
                                   
                                        <td class="form-group">
                                            <a href="/admin/edit_company/<? echo $list['id'] ?>" class="btn btn-primary" style="padding: 4px 6px;"><i class="glyphicon glyphicon-pencil"></i></a>
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
