<div class="container single-top page-top">
    <div class="page-banner">
        <div class="page-title"><h1><?php the_title(); ?></h1></div>
        <div class="page-detail"><span>浏览 <?php setPostViews(get_the_ID()) ?><?php echo getPostViews(get_the_ID()) ?> / 发布于 <?php the_time('Y-m-d'); ?> / 评论 <?php comments_popup_link('沙发','1','%') ?> <?php edit_post_link('编辑页面') ?></span></div>
    </div>
</div>

<div class="container single-main page-main ">
    <div class="center">
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
