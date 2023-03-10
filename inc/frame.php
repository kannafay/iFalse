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
    <?php if(is_home()) { ?>
            <meta name="keywords" content="<?=get_option("i_keywords") ? get_option("i_keywords") : 'iFalse主题'?>" />
            <meta name="description" content="<?php bloginfo('description'); ?>" />
        <?php } else { ?>
            <meta name="keywords" content="<?=the_title()?>" />
        <?php }
    ?>
    <title><?php if(function_exists('show_wp_title')){show_wp_title();} ?></title>
    <link rel="shortcut icon" href="<?php site_icon_url(); ?>" type="image/x-icon" />
    <link rel="stylesheet" href="<?php echo i_static(); ?>/css/_init.css">
    <link rel="stylesheet" href="<?php echo i_static(); ?>/css/404.css">
    <link rel="stylesheet" href="<?php echo i_static(); ?>/css/article.css">
    <link rel="stylesheet" href="<?php echo i_static(); ?>/css/article-style.css">
    <link rel="stylesheet" href="<?php echo i_static(); ?>/css/footer.css">
    <link rel="stylesheet" href="<?php echo i_static(); ?>/css/header.css">
    <link rel="stylesheet" href="<?php echo i_static(); ?>/css/home.css">
    <link rel="stylesheet" href="<?php echo i_static(); ?>/css/links.css">
    <link rel="stylesheet" href="<?php echo i_static(); ?>/css/login.css">
    <link rel="stylesheet" href="<?php echo i_static(); ?>/css/page-template.css">
    <link rel="stylesheet" href="<?php echo i_static(); ?>/css/say.css">
    <link rel="stylesheet" href="<?php echo i_static(); ?>/css/searchform.css">
    <link rel="stylesheet" href="<?php echo i_static(); ?>/css/sidebar.css">
    <link rel="stylesheet" href="<?php echo i_static(); ?>/iconfont/iconfont.css">
    <?php if(get_option("i_custom_html_head")){echo get_option("i_custom_html_head");}; ?>
    <style><?php if(get_option("i_custom_css_head")){echo get_option("i_custom_css_head");}; ?></style>
    <?php if(get_option("i_plane") == 1) { ?><link rel="stylesheet" href="<?php echo i_static(); ?>/css/style-plane.css">
    <?php } ?>
    <?php if(get_option("i_color")) { ?>
        <style>
        :root{
            --theme:<?php echo get_option("i_color"); ?>;
            --theme-sub:<?php 
                            if(get_option("i_color")){
                                if(get_option("i_color_sub")){
                                    echo get_option("i_color_sub"); 
                                }else if(get_option("i_color") && !get_option("i_color_sub")) {
                                    echo get_option("i_color");
                                }else {
                                    echo "#58b3f5";
                                }
                            }else if(!get_option("i_color") && get_option("i_color_sub")) {
                                echo "#58b3f5";
                            } else {
                                echo "#58b3f5";
                            } 
                        ?>;
            --theme-1:<?php echo get_option("i_color").'1a'; ?>;
            --theme-2:<?php echo get_option("i_color").'33'; ?>;
            --theme-3:<?php echo get_option("i_color").'4d'; ?>;
            --theme-5:<?php echo get_option("i_color").'80'; ?>;
            --notice: <?php echo get_option("i_color").'26'; ?>;
        }
        </style>
    <? } ?>
    <?php if(get_option("i_night") == 2) { 
        if(date("m") >= 3 && date("m") <= 8) { ?>
            <script>var judge = new Date().getHours() >= 20 || new Date().getHours() <= 5;</script>
        <?php } else if(date("m") >= 9 && date("m") <= 12 || date("m") <= 2) { ?>
            <script>var judge = new Date().getHours() >= 19 || new Date().getHours() <= 6;</script>
        <?php } ?>
    <?php } else if(get_option("i_night") == 1) { ?><script>var judge = true;</script> 
    <?php } else { ?><script>var judge = false;</script> 
    <?php } ?>
    <script src="<?php echo i_static(); ?>/js/jquery.min.js"></script>
    <script src="<?php echo i_static(); ?>/js/changeNight.js"></script>
</head>
