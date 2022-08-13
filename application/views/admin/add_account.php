<style>
    th,td {
        padding: 5px 10px;
        border: 1px solid #d2d6de;
        text-align: center;
    }

    table {
        width: 100%;
    }
    .right{
        padding: 15px;
    }
</style>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Quản lý tài khoản
            <small>Thêm mới</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="/admin"><i class="fa fa-dashboard"></i>Quản lý tài khoản</a></li>
            <li><a href="">Thêm mới</a></li>
        </ol>
    </section>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body ">
                    <div class="content_search">
                        <form action="" method="POST" id="add_tags" style="width: 100%">

                            <div class="left"  style="width: 50%; float: left">
                                <div class="row_tag">
                                    <label for="" class="label_tit lbl_name_tag"><span>* </span>Tên đăng nhập</label>
                                    <input type="text" class="name_tag" name="userName" id="name">
                                </div>
                                <div class="row_tag">
                                    <label for="" class="label_tit lbl_name_tag">Họ tên</label>
                                    <input type="text" class="name_tag" name="name" id="fullname">
                                </div>
                                <div class="row_tag">
                                    <label for="" class="label_tit lbl_name_tag">Số điện thoại</label>
                                    <input type="text" class="name_tag" name="phone" id="phone">
                                </div>
                                <div class="row_tag">
                                    <label for="" class="label_tit lbl_name_tag"><span>* </span>Mật khẩu</label>
                                    <input type="password" id="password" class="name_tag" name="password" id="password">
                                </div>
                                <div class="row_tag">
                                    <label for="" class="label_tit lbl_name_tag"><span>* </span>Nhập lại mật khẩu</label>
                                    <input type="password" class="name_tag" name="repassword">
                                </div>
                                <div class="row_tag">
                                    <label for="" class="label_tit lbl_name_tag"><span>* </span>Email</label>
                                    <input type="text" class="name_tag" name="email" id="email">
                                </div>
                            </div>
                            <div class="right" style="width: 50%; float:right;">
                                <div class="row_tag">
                                    <label for="" class="label_tit lbl_name_tag"><span>* </span>Quyền quản lý</label>
                                    <table>
                                        <tr>
                                            <th>Chọn</th>
                                            <th>Danh sách</th>
                                            <!--                                            <th>Thêm</th>-->
                                            <!--                                            <th>Sửa</th>-->
                                        </tr>
                                        <?php foreach($admin_module as $row_modul){?>
                                            <tr>
                                                <td><input type="checkbox" value="<?=$row_modul['mod_id']?>" id="modul" name="modul"></td>
                                                <td><?=$row_modul['mod_name'];?></td>
                                            </tr>
                                        <?php }?>
                                    </table>
                                </div>
                            </div>

                            <div class="row_tag" style="width: 100%">
                                <input type="submit" name="add_user_admin" class="add_user_admin" value="Cập nhật">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

