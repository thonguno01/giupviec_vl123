<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | Log in</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="/admincssjs/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="/admincssjs/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="/admincssjs/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="/admincssjs/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="/admincssjs/plugins/iCheck/square/blue.css">
  <!-- <link rel="stylesheet" href="../css/validator.css"> -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <style>
    .has-feedback label~.form-control-feedback{top: 0;}
  </style>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a><b>Admin</b></a>
  </div>
  <div class="login-box-body">
    <form id="admin-login" onsubmit="return false">
      <fieldset>
        <div class="form-group has-feedback t-form-group">
            <input type="text" class="form-control" placeholder="Username" name="name" id="name" rules="required" autofocus>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            <span class="form-message err_name"></span>
        </div>
        <div class="form-group has-feedback t-form-group">
          <input type="password" class="form-control" placeholder="Password" id="password" name="password" rules="required">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          <span class="form-message err_pass"></span>
        </div>
        <div class="row">
          <div class="col-xs-12">
            <button type="submit" onclick="login()" class="btn btn-primary btn-block btn-flat loginAdminUser">Đăng nhập</button>
          </div>
        </div>
      </fieldset>
    </form>
  </div>
</div>
<script src="/admincssjs/bower_components/jquery/dist/jquery.min.js"></script>
<script src="/admincssjs/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="/admincssjs/plugins/iCheck/icheck.min.js"></script>
<script src="/scripts/admin/login.js"></script>
<!-- <script src="../js/validator.js"></script> -->
</body>
</html>
