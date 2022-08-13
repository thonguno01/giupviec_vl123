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
            <small>Người giúp việc chưa hoàn thiện hồ sơ</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Người giúp việc chưa hoàn thiện hồ sơ</a></li>
            <li><a href="#">Danh sách</a></li>
        </ol>
    </section>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body ">
					<form method="GET" action="/admin/search_employee_not_complete_profile">
                    <div class="input-group timkiemph form-search-uv " style="display: flex;width: 100%;">
                        <!-- tk email -->
                        <input type="text" name="email" class="form-control col-5 email"
                            <? if (isset($email)) {?>
                                value="<?=$email?>" 
                            <?}?>
                                placeholder="Nhập email" aria-label="Nhập từ khoá" aria-describedby="basic-addon2" style="margin-right: 15px;">
                        <!-- tk ten -->
                        <input type="text"  name="name" class="form-control col-5 name"
                             <? if (isset($name)) {?>
                                value="<?=$name?>" 
                            <?}?>
                                  placeholder="Nhập tên" aria-label="Nhập từ khoá" aria-describedby="basic-addon2" style="margin-right: 15px;">
                        <!-- tk sdt -->
                        <input type="text" name="phone" class="form-control col-5 phone" 
                             <? if (isset($phone)) {?>
                                value="<?=$phone?>" 
                            <?}?>
                                 placeholder="Nhập số điện thoại" aria-label="Nhập từ khoá" aria-describedby="basic-addon2" style="margin-right: 15px;">
                         
                        <!-- tk địa chỉ -->
                        <input type="text" name="address" class="form-control phone ml-2" placeholder="Nhập địa chỉ" aria-label="Nhập từ khoá" aria-describedby="basic-addon2" style="margin-left: 15px;">

                        <input type="date" name="ngaybd" class="form-control phone ml-2"
                            <? if (isset($ngaybd)) {?>
                                value ="<?=$ngaybd?>"  
                            <?}?>
                                 placeholder="Nhập ngày bắt đầu" style="margin-left: 15px;">
                        <input type="date" name="ngaykt" class="form-control phone ml-2"
                            <? 
                                if (isset($ngaykt)) {?>
                                     value ="<?=$ngaykt?>"  
                                <?}?>
                                     placeholder="Nhập ngày kết thúc" style="margin-left: 15px;">
                        <div class="input-group-append ml-2" style="margin-left: 1.5rem!important;">
                            <input type="submit" class="btn btn-warning search_uv btn-search" value="Tìm kiếm" >
                        </div>
                    </div>
					</form>
                    <span style="color:red;">Nhập thông tin để tìm kiếm.</span>
                    <div class="content_search"> 
                        <table data-toolbar="#toolbar" data-toggle="table" class="table table-hover">
                            <thead style="background: #f1f4f7;">
                            <tr>
                                <th data-field="stt" data-sortable="true">STT</th>
                                <th data-field="avt" data-sortable="true">Mã</th>
                                <th data-field="name" data-sortable="true">Họ & Tên</th>
                                <th data-field="email" data-sortable="true">Email</th>
                                <th data-field="sdt" data-sortable="true">SĐT</th>
                                <th data-field="adress" data-sortable="true">Địa chỉ</th>
                                <th data-field="date_regis" data-sortable="true">Ngày ĐK</th>
								<th data-field="register" data-sortable="true">Đăng ký</th>
                            </tr>
                            </thead>
                            <tbody class="">
                            <? if(!empty($list_employee)){
                                $key = 1;
                                foreach($list_employee as $list){ ?>  
                                     <tr>
                                        <td class="td-count" scope="row"><?= $key++; ?></td>
                                        <td>
                                            <?=$list['profile_id'];?>
                                        </td>
                                        <td style="">
                                            <? echo $list['user_name'] ?>
                                        </td>
                                        <td style=""></a>
                                            <? echo $list['user_email'] ?>
                                        </td>
                                        <td style=""><? echo $list['user_phone'] ?></td>
                                        <td>
                                            <?=$list['user_address'];?>
                                        </td>
                                        <td >
                                            <? echo date('d-m-Y', $list['create_at']) ?>
                                        </td>
										<td>
											<a href="/admin/register_for_employee/<?=$list['profile_id']?>">
												<i class="fa fa-user-plus" aria-hidden="true"></i>
											</a>
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
</div>
