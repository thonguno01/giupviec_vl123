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
    .p-title{
        color: red;
        font-size: 16px;
        display: inline-block;
    }
    .p-value{
        color: black; 
        
        display: inline-block;
        font-size: 16px;
    }

    /**/
</style>

<div class="content-wrapper">
    <section class="content-header">
        <h1>
             Quản lý thuê giúp việc
            <small> Cộng điểm cho nhà tuyển dụng</small>
        </h1>
    </section>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default" style="padding-bottom: 20px">
               
                     <button class="btn btn-info" style="margin-top:15px;" onclick="history.back()">  Quay lại</button>
               
                        <div class="container">

                            <div class="row"> 
                                <p class="col-2 p-title"> ID:</p>
                                <p class="col-7 p-value" ><?=$company['id']?></p>
                            </div>
                            <div class="row"> 
                                <p class="col-2 p-title"> Tên công ty:</p>
                                <p class="col-7 p-value" ><?=$company['name']?></p>
                            </div>
                            <div class="row"> 
                                <p class="col-2 p-title"> Email:</p>
                                <p class="col-7 p-value" ><?=$company['email']?></p>
                            </div>
                            
                            <div class="row">
                                    <form class="col-md-7 form-point">
                                        <fieldset class="form-group">
                                            <label for="point_add">Nhập điểm cộng thêm</label>
                                            <input type="number" min="0" class="form-control" id="point_add" placeholder="0" data-id="<?=$company['id']?>" poitn-pay="<?=$company['point_pay']?>">
                                        </fieldset>
                                        <button type="button" class="btn btn-success update_point">Cập nhật</button>
                                         <button type="reset" class="btn btn-dark">Cài lại</button>
                                    </form>
                                 </div>
                            </div>
            </div>
            </div>
        </div>
    </div>
</div>
<script>
function goBack() {
  window.history.back();
}
</script>
