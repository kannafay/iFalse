<?php i_note(); ?>
<!DOCTYPE html>
<html lang="zh">
<head>
    <?php i_frame(); ?>
    <title>404 Not Found</title>
</head> 
<body>
    <?php get_header(); ?>
    <div class="page-404">
        <div class="page-404-detail">
            <img src="<?php echo get_template_directory_uri(); ?>/static/img/404.gif" alt="404">
            <p><?php if(get_option("i_404_tip")) {echo get_option("i_404_tip");} else{echo "{{ text_404 }}";} ?></p>
            <a href="<?php bloginfo('url') ?>"><?php if(get_option("i_404_bak")) {echo get_option("i_404_bak");} else{echo "{{ backhome_404 }}";} ?></a>
        </div>
    </div>
    <div class="progress-wrap">
	    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
	    	<path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"/>
	    </svg>
    </div>
    <?php get_footer(); ?>
    <?php i_frame_js() ?>
</body>
</html>