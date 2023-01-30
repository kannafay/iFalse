<link rel="stylesheet" href="<?php echo i_static(); ?>/fancybox/fancybox.css">
<link rel="stylesheet" href="<?php echo i_static(); ?>/highlight/styles/vs2015.min.css">

<div class="container single-top article-top">
    <div class="single-banner">
        <div class="single-cate">
            <div class="single-cate-box">
                <span class="iconfont icon-zhinanzhen"></span>
                <b><?php echo the_category(' ') ?></b>
            </div>
        </div>
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
                <?php edit_post_link('编辑文章') ?>
            </div>
        </div>
        <div class="breadcrumb"><?php if ( function_exists('i_breadcrumb') ) i_breadcrumb();?></div>
    </div>
</div>
<div class="container single-main article-main">
    <div class="left">
        <div class="post-content">
            <?php the_content(); ?>
            <?php if(get_the_tag_list()){ ?><div class="the-tag"><?php echo get_the_tag_list('<span>',' ','</span>'); ?></div><?php } ?>
            <?php if(get_option("i_plane") != 1) { ?>
                <div class="the-end"><i></i><span>THE END</span><i></i></div>
            <?php } ?>
            <?php if(get_option("i_post_copyright") == 1) { ?>
                <div class="post-copyright">
                    <div class="post-copyright-title">© 版权声明</div>
                    <div class="post-copyright-text"><?php if(get_option("i_post_copyright_text")){echo get_option("i_post_copyright_text");}else{echo '分享是一种美德，转载请保留原链接';} ?></div>
                </div>
            <?php } ?>
        </div>
        <?php if(get_option("i_next_post") == 1) { ?>
            <div class="post-context">
            <div class="post-context_text">上下篇章</div>
                <div class="post-prev-next">
                    <div class="post-prev"><span>← 上一章节</span><p><?php if(get_previous_post()){previous_post_link('%link');}else{echo "这已经是第一章内容了";}; ?></p></div><i></i>
                    <div class="post-next"><span>下一章节 →</span><p><?php if(get_next_post()){next_post_link('%link');}else{echo "这已经是最后章内容了";}; ?></p></div>
                </div>
            </div>
        <?php } ?>
        <?php 
            if(get_option("i_comments_article") == 1) { ?>
                <?php comments_template('/comments.php'); ?>
            <?php
            }
        ?>
    </div>
    <?php if(get_option("i_post_sidebar") == 1) { ?>
        <style>
            .single-main .left {
                width: 100%;
                padding-right: 0;
                border-right: none;
            }
        </style>
    <?php } else { ?>
        <div class="right">
            <?php get_template_part('sidebar-article')?>
        </div>
    <?php } ?>
</div>

<div class="post-menu-btn">
    <div>
        <span class="iconfont icon-nav-list"></span>
    </div>
</div>

<script src="<?php echo i_static(); ?>/fancybox/fancybox.umd.js"></script>
<script src="<?php echo i_static(); ?>/highlight/highlight.min.js"></script>