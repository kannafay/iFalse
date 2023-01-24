<link rel="stylesheet" href="<?php echo i_static(); ?>/fancybox/fancybox.css">
<link rel="stylesheet" href="<?php echo i_static(); ?>/highlight/styles/vs2015.min.css">

<div class="container single-top article-top say-top">
    <div class="single-banner">
        <div class="single-title"><h1><?php the_title(); ?></h1></div>
        <div class="single-detail">
            <div class="author">
                <a href="<?php the_post();home_url();echo '/author/';echo get_the_author_meta('user_login');rewind_posts(); ?>"><?php the_post();echo get_avatar( get_the_author_ID() );rewind_posts(); ?></a>
                <span><?php the_author_posts_link(); ?></span>
            </div>
            <div class="other">
                <span class="date"><?php echo get_the_date(); ?> <?php the_time(); ?></span>
                <span class="views"><?php setPostViews(get_the_ID()) ?><?php echo getPostViews(get_the_ID()) ?></span>
                <?php if(get_option("i_comments_article") == 1){ ?><span class="comments"><?php if(post_password_required()){echo '已加密';}elseif(comments_open()){comments_popup_link('沙发','1','%');}else{echo '已关闭';} ?></span><?php } ?>
                <?php edit_post_link('编辑说说') ?>
            </div>
        </div>
    </div>
</div>
<div class="container single-main article-main say-main">
    <div class="left">
        <div class="post-content">
            <?php the_content(); ?>
            <?php if(get_option("i_plane") != 1) { ?>
                <div class="the-end"><i></i><span>THE END</span><i></i></div>
            <?php } ?>
        </div>
        <?php 
            if(get_option("i_comments_article") == 1) { ?>
                <?php comments_template('/comments.php');?>
            <?php
            }
        ?>
    </div>
    <div class="right">
        <?php get_template_part('sidebar-article')?>
    </div>
</div>

<div class="post-menu-btn">
    <div>
        <span class="iconfont icon-nav-list"></span>
    </div>
</div>

<script src="<?php echo i_static(); ?>/fancybox/fancybox.umd.js"></script>
<script src="<?php echo i_static(); ?>/highlight/highlight.min.js"></script>