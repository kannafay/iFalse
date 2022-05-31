<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.lazyload.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/static/lightgallery/lightgallery-all.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/headroom.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/backtop.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/vue.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/config.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/theme.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/custom/iconfont/iconfont.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/custom/user.js"></script>
<script type="text/javascript">
    jQuery(function() {        
        jQuery("img").lazyload({
            effect : "fadeIn",
            failure_limit : 10,
            threshold : 200,
        });
    });
</script>