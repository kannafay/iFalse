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
                <?php the_post(); echo get_avatar( get_the_author_email(), '100' ); rewind_posts(); ?>
                <span><?php the_author_posts_link(); ?></span>
            </div>
            <div class="other">
                <span class="date"><?php echo get_the_date(); ?> <?php the_time(); ?></span>
                <span class="views"><?php setPostViews(get_the_ID()) ?><?php echo getPostViews(get_the_ID()) ?></span>
                <span class="comments"><?php if(post_password_required()){echo '已加密';}elseif(comments_open()){comments_popup_link('沙发','1','%');}else{echo '已关闭';} ?></span>
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
            <!-- <div class="the-end">—— THE END ——</div> -->
            <div class="the-tag"><?php echo get_the_tag_list('<span>',' ','</span>'); ?></div>
        </div>
        <?php if(get_option("i_next_post") == 1) { ?>
            <div class="post-context">
                <div class="post-prev-next">
                    <div class="post-prev"><span>上一篇：</span><?php previous_post_link('%link'); ?></div>
                    <div class="post-next"><span>下一篇：</span><?php next_post_link('%link'); ?></div>
                </div>
            </div>
        <?php } ?>
        <?php 
            if(get_option("i_comments_article") == 1) { ?>
                <?php comments_template('/comments.php');?>
            <?php
            }
        ?>
    </div>
    <div class="right">
        <?php get_template_part('inc/sidebar-article')?>
    </div>
</div>

<div class="post-menu-mb-btn">
    <div>
        <span class="iconfont icon-mulushu"></span>
    </div>
</div>