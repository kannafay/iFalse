<div class="wrapper">
    <div class="banner"></div>
    <div class="content-wrapper">
        <div class="text-wrapper">
            <h2 class="h2-title"><?php the_time('Y年m月'); ?></h2>
        </div>
    </div>
</div>
<div class="container main-content main">
    <div class="content">
        <?php
            if(get_option("i_notice")) {?>
                <div class="notice">
                    <div class="notice-box">
                        <span></span>
                        <p><?php echo get_option("i_notice"); ?></p>
                    </div>
                </div>
            <?php }
        ?>
        <div class="title-part">
            <p class="date"><span><?php the_time('Y年m月'); ?></span>发布的内容</p>
            <?php get_search_form(); ?>
        </div>
        <?php 
            if(get_option("i_blog_to_column") == 1) {
                get_template_part('inc/home-blog');
            } else{
                if(get_option("i_blog_auto_column") == 1) {
                    autoBlog();
                } else {
                    get_template_part('inc/home-card');
                }
            } 
        ?>
    </div>
</div>
