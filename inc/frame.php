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
    <meta name="description" content="<?php bloginfo('description'); ?>" />
    <title><?php if(function_exists('show_wp_title')){show_wp_title();} ?></title>
    <link rel="shortcut icon" href="<?php site_icon_url(); ?>" type="image/x-icon" />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/theme.min.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/static/lightgallery/lightgallery.min.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/static/iconfont/iconfont.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/custom/iconfont/iconfont.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/custom/user.css">
</head>