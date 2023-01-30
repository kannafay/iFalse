<?php i_frame(); ?> 
<body>
    <?php get_header(); ?>
    <section>
        <div class="page-404">
            <div class="page-404-detail">
                <img src="<?php echo i_static(); ?>/images/404.png" alt="404">
                <p><?php if(get_option("i_404_tip")) {echo get_option("i_404_tip");} else{echo "抱歉, 您请求的页面找不到了!";} ?></p>
                <a class="back-home" onclick="window.history.go(-1)" style="cursor:pointer">返回上一页</a>
                <a class="back-history" href="<?php bloginfo('url'); ?>">返回首页</a>
            </div>
        </div>
        <?php get_footer(); ?>
    </section>
    <?php i_frame_js() ?>
</body>
</html>