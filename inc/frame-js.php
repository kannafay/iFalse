<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.lazyload.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/static/iconfont/iconfont.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/theme.js"></script>
<script><?php if(get_option("i_custom_js_footer")){echo get_option("i_custom_js_footer");}; ?></script>
<?php if(get_option("i_custom_html_tongji")){echo get_option("i_custom_html_tongji");}; ?>

<script type="text/javascript"> 
    // 延迟加载
    jQuery(function() {        
        jQuery("img").lazyload({
            effect : "fadeIn",
            failure_limit : 50,
            threshold : 200,
        });
    });
    console.log('%c iFalse %c https://github.com/kannafay/iFalse', 'background: linear-gradient(to right, #8183ff, #58b3f5);color:#fff;border-radius:2px;', '');
    console.log('<?php echo get_num_queries(); ?> queries in <?php timer_stop(7); ?>s');
</script>