<?php
/*Template Name: 友情链接*/
?>

<!DOCTYPE html>
<html lang="zh">
<head>
    <?php i_frame(); ?>
    <title><?php the_title(); ?> - <?php bloginfo('name') ?></title>
</head> 
<body>
    <?php get_header(); ?>
    <div class="container single-main page-main page-link">
        <div class="left">
            <div class="post-content">
                <?php the_content(); ?>
                <?php wp_list_bookmarks('orderby=id&show_description=1&show_name=1'); ?>
            </div>
            <?php 
                if(get_option("i_comments_page") == 1) { ?>
                    <?php comments_template('/comments.php');?>
                <?php
                }
            ?>
        </div>
    </div>

    <?php get_footer(); ?>
    <?php i_frame_js(); ?>
</body>
</html>