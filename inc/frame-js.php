<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.lazyload.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/backtop.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/theme.js"></script>
<script><?php if(get_option("i_custom_js_footer")){echo get_option("i_custom_js_footer");}; ?></script>
<script><?php if(get_option("i_custom_html_tongji")){echo get_option("i_custom_html_tongji");}; ?></script>

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