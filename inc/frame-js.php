<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/headroom.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.lazyload.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/static/swiper/swiper-bundle.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/static/fancybox/fancybox.umd.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/static/highlight/highlight.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/backtop.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/theme.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/comments.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/user/iconfont/iconfont.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/user/user.js"></script>
<?php 
if(get_option("i_swiper_effect")) {
    $swiper_effect = get_option("i_swiper_effect");
} else {
    $swiper_effect = 'slide';
}
echo <<< EOF
<script type="text/javascript">  
    // 轮播图
    var mySwiper = new Swiper ('.swiper', {
        loop: true,
        parallax : true,
        effect: '$swiper_effect',
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
EOF;
?>
<script type="text/javascript"> 
    // 延迟加载
    jQuery(function() {        
        jQuery("img").lazyload({
            effect : "fadeIn",
            failure_limit : 50,
            threshold : 200,
        });
    });
</script>