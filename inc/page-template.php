<div class="container single-top page-top">
    <div class="page-banner">
        <div class="page-title"><h1><?php the_title(); ?></h1></div>
        <div class="page-detail">
            <div class="author">
                <a href="<?php the_post();home_url();echo '/author/';echo get_the_author_meta('user_login');rewind_posts(); ?>"><?php the_post();echo get_avatar( get_the_author_ID() );rewind_posts(); ?></a>
                <span><?php the_author_posts_link(); ?></span>
            </div>
            <div class="other">
                <span class="date"><?php echo get_the_date(); ?> <?php the_time(); ?></span>
                <span class="views"><?php setPostViews(get_the_ID()) ?><?php echo getPostViews(get_the_ID()) ?></span>
                <?php if(get_option("i_comments_page") == 1){ ?><span class="comments"><?php if(post_password_required()){echo '已加密';}elseif(comments_open()){comments_popup_link('沙发','1','%');}else{echo '已关闭';} ?></span><?php } ?>
                <?php edit_post_link('编辑页面') ?>
            </div>
                
        </div>
    </div>
</div>

<div class="container single-main page-main">
    <div class="left">
        <div class="post-content">
            <?php the_content(); ?>
        </div>
        <?php 
            if(get_option("i_comments_page") == 1) { ?>
                <?php comments_template('/comments.php');?>
            <?php
            }
        ?>
    </div>
</div>
