<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/static/swiper/swiper-bundle.min.css">

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
    <script src="<?php echo get_template_directory_uri(); ?>/js/yiyan.js"></script>
<?php }?>

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
            if(get_option("i_blog_or_card") == 1) {
                get_template_part('inc/home-blog');
            } else{
                get_template_part('inc/home-card');
            } 
        ?>
    </div>
</div>

<script src="<?php echo get_template_directory_uri(); ?>/static/swiper/swiper-bundle.min.js"></script>
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