<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.lazyload.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/static/lightgallery/lightgallery-all.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/headroom.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/static/highlight/highlight.min.js"></script>
<script>hljs.highlightAll();</script>
<script src="<?php echo get_template_directory_uri(); ?>/js/backtop.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/theme.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/comments.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/user/iconfont/iconfont.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/user/user.js"></script>
<script type="text/javascript">
    jQuery(function() {        
        jQuery("img").lazyload({
            effect : "fadeIn",
            failure_limit : 50,
            threshold : 200,
        });
    });
</script>