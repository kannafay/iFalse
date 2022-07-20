<!DOCTYPE html>
<html lang="<?php echo get_bloginfo('language'); ?>">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="Cache-Control" content="no-transform" />
	<meta http-equiv="Cache-Control" content="no-siteapp" />
    <meta name="renderer" content="webkit" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="viewport" content="width=device-width,height=device-height,initial-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <meta name="keywords" content="<?php if(get_option("i_keywords")){echo get_option("i_keywords");}else{echo 'iFalse,iFalse主题,一款界面清新、轻松上手的WordPress主题';} ?>" />
    <meta name="description" content="<?php bloginfo('description'); ?>" />
    <title><?php if(function_exists('show_wp_title')){show_wp_title();} ?></title>
    <link rel="shortcut icon" href="<?php site_icon_url(); ?>" type="image/x-icon" />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/404.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/searchform.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/article-style.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/page-template.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/article.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/backtop.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/sidebar.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/footer.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/header.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/home.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/links.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/login.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/say.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/static/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/static/fancybox/fancybox.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/static/highlight/styles/vs2015.min.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/static/iconfont/iconfont.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/user/iconfont/iconfont.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/user/user.css">
    <?php if(get_option("i_mourn") == 1){ ?><style>html{filter:grayscale(1);}body::-webkit-scrollbar-thumb{background-color: gray !important;}</style><?php }; ?>
    <?php if(get_option("i_night") == 1) { ?>
        <script>var judge = new Date().getHours() >= 21 || new Date().getHours() <= 6;</script>
    <?php } else { ?> 
        <script>var judge = false;</script> 
    <?php } ?>
    <script src="<?php echo get_template_directory_uri(); ?>/js/changeNight.js"></script>
</head>
