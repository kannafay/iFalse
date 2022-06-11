<div class="wrapper">
    <div class="banner"></div>
    <div class="content-wrapper">
        <div class="text-wrapper">
            <h2><?php if(get_option("i_wrapper_text")) {echo get_option("i_wrapper_text");} else{echo '<p id="hitokoto"><span id="hitokoto_text">一言加载中...</span></p>';} ?></h2>
            <i><?php if(get_option("i_wrapper_name")) {echo get_option("i_wrapper_name");} else{echo '<p id="hitokoto_author"></p>';} ?></i>
        </div>
    </div>
</div>

<div class="container main-content main">
    <div class="content">
        <?php
            if(get_option("i_notice")) {?>
                <div class="notice">
                    <span class="iconfont icon-xiaoxi"></span>
                    <p><?php echo get_option("i_notice"); ?></p>
                </div>
            <?php }
        ?>
        <div class="title-part">
            <p id="title-part">最新发布</p>
            <?php get_search_form(); ?>
        </div>
        <?php 
            if(get_option("i_blog_or_card") == 1) {
                get_template_part('inc/home-blog');
            } else{
                get_template_part('inc/home-card');
            } 
        ?>
    </div>
</div>

<script src="<?php echo get_template_directory_uri(); ?>/js/yiyan.js"></script>