<?php i_frame(); ?> 
<body>
    <?php get_header(); ?>
    <div class="page-404">
        <div class="page-404-detail">
            <img src="<?php echo get_template_directory_uri(); ?>/static/img/404.png" alt="404">
            <p><?php if(get_option("i_404_tip")) {echo get_option("i_404_tip");} else{echo "抱歉, 您请求的页面找不到了!";} ?></p>
            <a href="<?php bloginfo('url') ?>"><?php if(get_option("i_404_bak")) {echo get_option("i_404_bak");} else{echo "返回首页";} ?></a>
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