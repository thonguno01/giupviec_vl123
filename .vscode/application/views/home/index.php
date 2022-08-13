<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/head.css">
    <link rel="stylesheet" href="/css/cart_popup.css">
    <link rel="stylesheet" href="<?=$style?>.css">
    <title>Document</title>
</head>
<body>
    <?
    require_once APPPATH.'views\home\includes\head.php';
    $this->load->view($page_name);
    require_once APPPATH.'views\home\includes\footer.php'; 
    ?>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script type="text/javascript" src="<?=$js?>.js"></script>
    <script type="text/javascript" src="<?=$js_2?>.js"></script>
</body>
</html>