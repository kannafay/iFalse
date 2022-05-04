<!DOCTYPE html>
<html lang="zh">
<head>
    <?php i_frame(); ?>
    <title><?php the_title(); ?> - <?php bloginfo('name') ?></title>
</head> 
<body>
    <?php get_header(); ?>
    <?php i_page(); ?>
    <?php get_footer(); ?>
    <?php i_frame_js(); ?>
</body>
</html>