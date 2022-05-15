<!DOCTYPE html>
<html lang="zh">
<head>
    <?php i_frame(); ?>
    <title><?php single_cat_title(); ?> - <?php bloginfo('name') ?></title>
</head> 
<body>
    <?php get_header(); ?>
    <?php i_archive(); ?>
    <?php get_footer(); ?>
    <?php i_frame_js(); ?>
</body>
</html>