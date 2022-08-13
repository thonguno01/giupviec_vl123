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
            <small> Danh sách quản lý điểm</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>  Danh sách quản lý điểm</a></li>
            <li><a href="#">Danh sách</a></li>
        </ol>
    </section>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body ">
                    <div class="input-group timkiemph form-search-point-ntd " style="display: flex;width: 100%;">
                          <!-- id -->
                        <input type="text" name="id" class="form-control col-5 id" 
                                placeholder="Nhập mã ntd"
                       aria-label="Nhập từ khoá" aria-describedby="basic-addon2" style="margin-right: 15px;">
                        <!-- tk ten -->
                        <input type="text"  name="name" class="form-control col-5 name"
                                  placeholder="Nhập tên"
                       aria-label="Nhập từ khoá" aria-describedby="basic-addon2" style="margin-right: 15px;">
                        <div class="input-group-append ml-2" style="margin-left: 1.5rem!important;">
                            <input type="button" class="btn btn-warning search_tutor btn-search-point" value="Tìm kiếm" >
                        </div>
                    </div>
                    <span style="color:red;">Nhập tên,ID để tìm kiếm.</span>
                    <div class="content_search">
                        <table data-toolbar="#toolbar" data-toggle="table" class="table table-hover">
                            <thead style="background: #f1f4f7;">
                            <tr>
                                <th data-field="stt" data-sortable="true">STT</th>
                                <th data-field="id" data-sortable="true">ID</th>
                                 <th data-field="email" data-sortable="true">Email</th>
                                <th data-field="name" data-sortable="true">Họ & Tên</th>
                                <th data-field="point_pay" data-sortable="true">Điểm mua</th>
                                <th data-field="point_free" data-sortable="true">Điểm miễn phí</th>
                                <th>Sửa</th>
                            </tr>
                            </thead>
                            <tbody class="">
                            <? if(!empty($list_company)){
                                $key = 1;
                                foreach($list_company as $list){ ?>  
                                    <tr>
                                        <td class="td-count" scope="row"><?= $key++; ?></td>
                                        <td><?=$list['id'];?></td>
                                        <td><?=$list['email'];?></td>
                                        <td style="">
                                            <? echo $list['name'] ?>
                                            <br>
                                            <a href="/admin/history_point/<?= $list['id']?>">Xem lịch sử dùng điểm</a>
                                        </td>
                                         <td><?=$list['point_pay'];?></td>
                                         <td><?=$list['point_free'];?></td>
                                        <td class="form-group">
                                            <a href="/admin/add_point_company/<?= $list['id']?>" class="btn btn-primary" style="padding: 4px 6px;"><i class="glyphicon glyphicon-pencil"></i>
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
