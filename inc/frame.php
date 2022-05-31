<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="yes" name="apple-mobile-web-app-capable">
    <meta name="viewport" content="width=device-width,height=device-height,initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta name="title" content="<?php bloginfo('name'); ?>">
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <title><?php if(function_exists('show_wp_title')){show_wp_title();} ?></title>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/theme.min.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/static/lightgallery/lightgallery.min.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/static/iconfont/iconfont.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/custom/iconfont/iconfont.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/custom/user.css">
</head>