<?php i_note(); ?>
<!DOCTYPE html>
<html lang="zh">
<head>
    <?php i_frame(); ?>
    <title><?php bloginfo('name') ?> - <?php bloginfo('description'); ?></title>
</head> 
<body>
    <?php get_header(); ?>
    <?php i_home(); ?>
    <?php get_footer(); ?>
    <?php i_frame_js(); ?>
</body>
</html>