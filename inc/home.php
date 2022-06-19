<?php 
    if(get_option("i_swiper")) {
        
    $swiper_query = new WP_Query(array(
        'post__in' => explode(',',get_option("i_swiper")),
        'post__not_in' => get_option('sticky_posts'),
        'orderby' => 'post__in',
        'showposts' => 10,
    ));
?>
<div class="container wrapper-home">
    <div class="swiper">
        <div class="swiper-wrapper">
            <?php $i=0; ?>
            <?php if($swiper_query->have_posts()) : while($swiper_query->have_posts()) : $swiper_query->the_post(); ?>
            <div class="swiper-slide">
                <a href="<?php the_permalink() ?>">
                    <?php if (has_post_thumbnail()) { ?>
                    <?php the_post_thumbnail('large'); ?>
                    <?php } else {?>
                        <img src="<?php if(get_option("i_loading_pic")) { echo get_option("i_loading_pic");} else{ echo i_loading_pic(); } ?>"
                        data-original="<?php if(get_option("i_random_pic")) { echo get_option("i_random_pic");} else{ echo i_cover_pic(); } ?>?top=<?php $i++; echo $i; ?>" />
                    <?php } ?>
                </a>
                <a href="<?php the_permalink(); ?>" class="swiper-img-mask">
                    <div class="title" data-swiper-parallax="200" data-swiper-parallax-duration="800"><?php the_title(); ?></div>
                </a>
            </div>
            <?php endwhile; ?>
            <?php endif; ?>
        </div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
        <div class="swiper-pagination"></div>
    </div>
</div>
<?php } else {?>
    <div class="wrapper">
    <div class="banner"></div>
    <div class="content-wrapper">
        <div class="text-wrapper">
            <h2><?php if(get_option("i_wrapper_text")) {echo get_option("i_wrapper_text");} else{echo '<p id="hitokoto"><span id="hitokoto_text">一言加载中...</span></p>';} ?></h2>
            <i><?php if(get_option("i_wrapper_name")) {echo get_option("i_wrapper_name");} else{echo '<p id="hitokoto_author"></p>';} ?></i>
        </div>
    </div>
    </div>
<?php }?>

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