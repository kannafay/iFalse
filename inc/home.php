<link rel="stylesheet" href="<?php echo i_static(); ?>/swiper/swiper-bundle.min.css">

<?php if(get_option("i_swiper")) {  
    $swiper_query = new WP_Query(array(
        'post__in' => explode(',',get_option("i_swiper")),
        'post__not_in' => get_option('sticky_posts'),
        'orderby' => 'post__in',
        'showposts' => 10,
    )) ?>
    <?php if(get_option("i_recommend")) { ?>
        <div class="container wrapper-home wrapper-recommend">

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
                                    data-original="<?php echo catch_that_image(); ?>?top=<?php $i++; echo $i; ?>" />
                                <?php } ?>
                            </a>
                            <a href="<?php the_permalink(); ?>" class="swiper-img-mask">
                                <div class="title" <?php if(get_option("i_swiper_effect") != 'fade'){echo 'data-swiper-parallax="200"';} ?> data-swiper-parallax-duration="600"><?php the_title(); ?></div>
                            </a>
                        </div>
                    <?php endwhile; ?>
                    <?php endif; ?>
                </div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
                <div class="swiper-pagination"></div>
            </div>
            <?php  
            $recommend_query = new WP_Query(array(
                'post__in' => explode(',',get_option("i_recommend")),
                'post__not_in' => get_option('sticky_posts'),
                'orderby' => 'post__in',
                'showposts' => 2,
                ))
            ?>
            <div class="recommend">
                <?php if($recommend_query->have_posts()) : while($recommend_query->have_posts()) : $recommend_query->the_post(); ?>
                    <div class="box">
                        <a href="<?php the_permalink() ?>">
                            <?php if (has_post_thumbnail()) { ?>
                            <?php the_post_thumbnail(); ?>
                            <?php } else {?>
                                <img src="<?php if(get_option("i_loading_pic")) { echo get_option("i_loading_pic");} else{ echo i_loading_pic(); } ?>"
                                data-original="<?php echo catch_that_image(); ?>?top=<?php $i++; echo $i; ?>" />
                            <?php } ?>
                            <div class="title"><p><?php the_title(); ?></p></div>
                        </a>
                        <div class="recommend-text">推荐</div>
                    </div>
                <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    <?php } else { ?>
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
                                    data-original="<?php echo catch_that_image(); ?>?top=<?php $i++; echo $i; ?>" />
                                <?php } ?>
                            </a>
                            <a href="<?php the_permalink(); ?>" class="swiper-img-mask">
                                <div class="title" <?php if(get_option("i_swiper_effect") != 'fade'){echo 'data-swiper-parallax="200"';} ?> data-swiper-parallax-duration="600"><?php the_title(); ?></div>
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
    <?php } ?>
    
<?php } else {?>
    <div class="wrapper">
    <div class="banner"></div>
    <div class="content-wrapper">
        <div class="text-wrapper">
            <?php if(get_option("i_wrapper_text") || get_option("i_wrapper_name")) { ?>
                <?php if(get_option("i_wrapper_text")){echo "<h2>".get_option("i_wrapper_text")."</h2>";}; ?>
                <?php if(get_option("i_wrapper_name")){echo "<i>".get_option("i_wrapper_name")."</i>";}; ?>
            <?php } else { ?>
                <h2><?php echo '<p id="hitokoto"><span id="hitokoto_text">一言加载中...</span></p>'; ?></h2>
                <i><?php echo '<p id="hitokoto_author"></p>'; ?></i>
                <script src="<?php echo i_static(); ?>/js/yiyan.js"></script>
            <?php } ?>
        </div>
    </div>
    </div>
<?php } ?>
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
            <p id="title-part">最新发布</p>
            <?php get_search_form(); ?>
        </div>
        <?php
            if(get_option("i_blog_to_column") == 1) {
                get_template_part('inc/home-blog');
            } else{
                if(get_option("i_blog_auto_column") == 1) {
                    get_template_part('inc/home-card');
                    get_template_part('inc/home-blog');
                ?> 
                <style>
                    .home-2{
                        display: none;
                    }
                    @media screen and (max-width: 640px) {
                        .home-2 {
                            display: block;
                        }
                        .main-part {
                            display: none;
                        }
                    }
                </style>
                <?php 
                } else {
                    get_template_part('inc/home-card');
                }  
            } 
        ?>
    </div>
</div>

<script src="<?php echo i_static(); ?>/swiper/swiper-bundle.min.js"></script>
<?php 
    if(get_option("i_swiper_effect")) {
        $swiper_effect = get_option("i_swiper_effect");
    } else {
        $swiper_effect = 'slide';
    }
?>
<script type="text/javascript">  
    // 轮播图
    var mySwiper = new Swiper ('.swiper', {
        loop: true,
        parallax : true,
        effect: '<?php echo $swiper_effect; ?>',
        spaceBetween: 10,
        speed: 600,
        autoplay: { 
            delay: 3000,
            disableOnInteraction: false,
            pauseOnMouseEnter: true,
        },
        pagination: {
            el: '.swiper-pagination',
            clickable : true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    })
</script>