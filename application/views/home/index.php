
<?php
$ver = 1;
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Giúp việc</title>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
<<<<<<< HEAD
	<meta name="robots" content="<?= isset($index) ? $index : "noindex,nofollow"?>" />
	<title><?= isset($title_seo) ? $title_seo : ""?></title>
	<link href="" rel="shortcut icon" />
	<!-- meta -->
	<meta name="description" content="<?= isset($des_seo) ? $des_seo : ""?>">
	<meta name="Keywords" content="<?= isset($keyword_seo) ? $keyword_seo : ""?>">
	<meta property="og:locale" content="vi_VN" />
	<!-- title -->
	<meta property="og:type" content="website" />
	<meta property="og:title" content="<?= isset($title_seo) ? $title_seo : ""?>" />
	<meta property="og:description" content="<?= isset($des_seo) ? $des_seo : ""?>" />
	<meta property="og:image" content="<?= isset($image_seo) ? $image_seo : ""?>"/>
	<!-- twitter -->
	<meta name="twitter:card" content="summary" />
	<meta name="twitter:description" content="<?= isset($des_seo) ? $des_seo : ""?>"/>
	<meta name="twitter:title" content="<?= isset($title_seo) ? $title_seo : ""?>" />
	<link rel="canonical" href="<?= isset($canonical) ? $canonical : ""?>" />
	<!-- <link rel="preload" href="/images/banner_1.png" as="image" media="(max-width: 767px)"/>
	<link rel="preload" href="/images/bg_main_content.png" as="image" media="(max-width: 767px)"/> -->
	<? if(isset($preload)){
	foreach ($preload as $href) { ?>
		<link rel="preload" href="<?= $href ?>" as="image"/>
	<? }
	} ?>
	<link rel="preload" href="/css/font-awesome.min.css" as="style"/>
	<link rel="preload" href="/css/select2.min.css" as="style"/>
	<link rel="preload" href="/css/reset.css" as="style"/>
	<link rel="preload" href="/css/header.css" as="style"/>
	<link rel="preload" href="/css/footer.css" as="style"/>
	<? foreach ($style as $href) { ?>
		<link rel="preload" href="<?= $href ?>" as="style"/>
	<? } ?>
	<link rel="stylesheet" href="/css/font-awesome.min.css">
	<link rel="stylesheet" href="/css/select2.min.css">
=======
	<link rel="stylesheet" href="/css/font-awesome.min.css">
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
	<link rel="stylesheet" href="/css/reset.css">
	<link rel="stylesheet" href="/css/header.css">
	<link rel="stylesheet" href="/css/footer.css">
	<? foreach ($style as $style) { ?>
		<link rel="stylesheet" href="<?= $style ?>">
	<? } ?>
</head>

<body>
	<?
	require_once APPPATH . '/views/home/includes/'.$header.'.php';
	$this->load->view($page_name);
	require_once APPPATH . '/views/home/includes/'.$footer.'.php';   
	?>
	
	<script src="/scripts/lazysizes.min.js"></script>
	<script src="/scripts/jquery.min.js"></script>
	<script src="/scripts/select2.min.js"></script>   
	<script src="/scripts/home/function.js"></script>
	<script src="/scripts/home/event.js"></script>
	<? foreach ($js as $script) { ?>
		<script type="text/javascript" src="<?=$script .'?v='.$ver?>"></script>    
	<?}?>
</body>

</html>
