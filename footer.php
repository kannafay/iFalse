<div class="container-full footer">
    <div class="container footer-box">
        <div class="copyright">
                <?php if(get_option("i_copyright")) {echo get_option("i_copyright");} else{echo "Copyright © 2022";} ?>
                <a href="<?php bloginfo('url') ?>"><?php bloginfo('name') ?></a>
                <a href="https://beian.miit.gov.cn/"><?php if(get_option("i_icp")) {echo get_option("i_icp");} ?></a>      
        </div>
        <div class="author">
            <span class="iconfont icon-zhiwen"></span>
            <div>Powered by <a href="https://wordpress.org/">WordPress</a> Theme by <a href="https://www.ifalse.cn">神秘布偶猫</a></div>
        </div>
        <?php if(get_option("i_upyun") == 1) {?>
            <div class="upyun">
                本网站由<a href="https://www.upyun.com/?utm_source=lianmeng&utm_medium=referral"><img src="<?php echo get_template_directory_uri(); ?>/static/img/upyun.png"></a>提供CDN加速/云存储服务</div>
        <?php } ?>
        <div class="custom">
            <?php require('user/user.html'); ?>
        </div>
    </div>
</div>
