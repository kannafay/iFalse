<div class="container single-top page-top">
    <div class="page-banner">
        <div class="page-title"><h1><?php the_title(); ?></h1></div>
        <div class="page-detail">
            <?php the_post(); echo get_avatar( get_the_author_email(), '100' ); rewind_posts(); ?>
                <span class="date"><?php echo get_the_date(); ?></span>
                <span class="views"><?php setPostViews(get_the_ID()) ?><?php echo getPostViews(get_the_ID()) ?></span>
                <span class="comments"><?php comments_popup_link('沙发','1','%') ?></span>
                <?php edit_post_link('编辑页面') ?>
        </div>
    </div>
</div>

<div class="container single-main page-main ">
    <div class="left">
        <div class="post-content">
            <?php the_content(); ?>
            <div class="the-end" style="">—— THE END ——</div>
        </div>
        <?php 
            if(get_option("i_comments_page") == 1) { ?>
                <?php comments_template('/comments.php');?>
            <?php
            }
        ?>
    </div>
</div>
