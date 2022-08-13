<!DOCTYPE html>
<html lang="vi">

<head>
  <title>Giúp việc | Admin</title>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="robots" content="noindex,nofollow" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="timviec365.com" />

  <title><?= (isset($title)) ? $title : '' ?></title>
  <meta name="keywords" content="<?= (isset($keyword)) ? $keyword : "" ?>" />
  <meta name="description" content="<?= (isset($description)) ? $description : "" ?>" />

  <meta property="og:url" content="<?= (isset($canonical)) ? $canonical : "" ?>">
  <meta property="og:title" content="<?= (isset($title)) ? $title : '' ?>" />
  <meta property="og:description" content="<?= (isset($description)) ? $description : "" ?>" />
  <meta property="og:type" content="website" />
  <meta property="og:locale" content="vi_VN" />
  <?php
  if (isset($ogImage)) {
  ?>
    <meta property="og:image:secure_url" content="<?= $ogImage ?> " />
    <meta property="og:image" content="<?= $ogImage ?> " />
  <?php } ?>

  <meta name="twitter:card" content="summary" />
  <meta name="twitter:description" content="<?= (isset($description)) ? $description : "" ?>" />
  <meta name="twitter:title" content="<?= (isset($title)) ? $title : '' ?>" />


  <link rel="canonical" href="<?= (isset($canonical)) ? $canonical : "" ?>" />

  <link rel="stylesheet" href="/css/select2.min.css">
	<link rel="stylesheet" href="/css/font-awesome.min.css">
	<link rel="stylesheet" href="/css/rSlider.min.css">
	<link rel="stylesheet" href="/css/admin/pagination.css">
  <link rel="stylesheet" href="/admincssjs/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="/admincssjs/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="/admincssjs/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="/admincssjs/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="/admincssjs/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="/admincssjs/bower_components/morris.js/morris.css">
  <link rel="stylesheet" href="/admincssjs/bower_components/jvectormap/jquery-jvectormap.css">
  <link rel="stylesheet" href="/admincssjs/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="/admincssjs/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="/admincssjs/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">



  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <?php
  if (isset($style)) {
    if (is_array($style) == true) {
      foreach ($style as $key => $val) {
  ?>
        <link rel="stylesheet" href="<?= $val ?>">
      <?php
      }
    } else { ?>
      <link rel="stylesheet" href="<?= $style ?>">
  <?php }
  } ?>

</head>

<body class="hold-transition skin-blue sidebar-mini">
  <?php
      include(APPPATH . 'views/admin/includes/header.php');
      include(APPPATH . 'views/admin/includes/side-bar.php');
  if (isset($page_name))
    $this->load->view($page_name);
  ?>


  <script type="text/javascript" src="/scripts/jquery.min.js"></script>
  <script type="text/javascript" src="/scripts/select2.min.js"></script>
	<script type="text/javascript" src="/scripts/rSlider.min.js"></script>
	<script type="text/javascript" src="/scripts/admin/function.js"></script>
	<script type="text/javascript" src="/scripts/admin/event.js"></script>
<!--/.main-->
<!-- <script src="bower_components/jquery/dist/jquery.min.js"></script> -->

<!-- <script src="/admincssjs/asset/js/bootstrap-table.js"></script>
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script> -->

<script src="/admincssjs/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="/admincssjs/bower_components/raphael/raphael.min.js"></script>
<script src="/admincssjs/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="/admincssjs/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="/admincssjs/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<script src="/admincssjs/bower_components/moment/min/moment.min.js"></script>
<script src="/admincssjs/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="/admincssjs/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="/admincssjs/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script src="/admincssjs/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="/admincssjs/bower_components/fastclick/lib/fastclick.js"></script>
<script src="/admincssjs/dist/js/adminlte.min.js"></script>
<script src="/admincssjs/dist/js/pages/dashboard.js"></script>
<script src="/admincssjs/dist/js/demo.js"></script>
<script src="/admincssjs/dist/js/additional-methods.js"></script>
<script src="/admincssjs/dist/js/jquery.validate.min.js"></script>

<script src="/ckeditor/ckeditor.js" type="text/javascript"></script>
<script type="text/javascript">
  
</script>
  <?php
  if (isset($js)) {
    if (is_array($js) == true) {
      foreach ($js as $key => $value) {
  ?>
        <script type="text/javascript" src="<?= $value ?>"></script>
      <?php
      }
    } else { ?>
      <script type="text/javascript" src="<?= $js ?>"></script>
  <?php
    }
  }
  ?>

</body>

</html>
