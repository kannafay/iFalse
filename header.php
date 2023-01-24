<div class="container-full nav-bar header <?php if(get_option("i_header_hidden") == 1) {echo 'header-hidden';} ?>">
    <div class="left">
        <?php if(get_option("i_logo_hidden") == 1) {} else { ?>
            <a href="<?php bloginfo('url') ?>" rel="home" class="logo">
                <img class="logo-light" src="<?php if(get_option("i_logo_url_light")){echo get_option("i_logo_url_light");}else{site_icon_url();}; ?>" alt="">
                <img class="logo-night" style="display:none" src="<?php if(get_option("i_logo_url_night")){echo get_option("i_logo_url_night");}else{site_icon_url();}; ?>" alt="">
                <script>
                    const logo_light = document.querySelector('.nav-bar .logo .logo-light');
                    const logo_night = document.querySelector('.nav-bar .logo .logo-night');

                    function getCookie(name){
                    	var nameEQ = name + "=";
                    	var ca = document.cookie.split(';');
                    	for(var i=0;i < ca.length;i++) {
                    		var c = ca[i].trim();
                    		if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
                    	}
                    	return null;
                    }
                    if (getCookie("night") == "1") {
                        logo_light.style.display = "none";
                        logo_night.style.display = "block";            
                    } else {
                        logo_light.style.display = "block";
                        logo_night.style.display = "none";
                    }
                </script>
            </a>
        <?php } ?>
        <?php 
            wp_nav_menu(array( 
                'theme_location'  => 'menu',
                'container_id'    => 'nav',
                'container_class' => 'nav',
                'menu_id'         => 'nav-menu',
                'menu_class'      => 'nav-menu',
                'fallback_cb'     => 'nav_fallback'
            ) );
        ?>
    </div>
    <?php if(get_option("i_login_hidden") != 1 || is_user_logged_in()){ ?>
        <div class="right">
            <?php if (is_user_logged_in()) { ?>
                <div class="admin">
                    <?php echo get_user_avatar(); ?>
                </div>
                <div class="user-menu">
                    <?php if(current_user_can('level_7')) { ?>
                        <a href="<?php bloginfo('url') ?>/wp-admin"><span class="iconfont icon-shezhi"></span> 后台管理</a>
                    <?php } ?>
                    <?php if(current_user_can('level_1')) { ?>
                        <a href="<?php bloginfo('url') ?>/wp-admin/post-new.php"><span class="iconfont icon-weibiaoti--"></span> 发布文章</a>
                        <a href="<?php bloginfo('url') ?>/wp-admin/post-new.php?post_type=shuoshuo"><span class="iconfont icon-xiaoxi2"></span> 发表说说</a>
                    <?php } ?>
                    <a href="<?php bloginfo('url') ?>/wp-admin/profile.php"><span class="iconfont icon-user"></span> 个人资料</a>
                    <a class="logout" href="<?php echo wp_logout_url(); ?>"><span class="iconfont icon-tuichu1"></span> 退出登录</a>
                </div>
            <?php ;} else { ?>
                <a href="<?php echo wp_login_url(); ?>" class="login"><span class="iconfont icon-User"></span></a>
            <?php ;} ?>
        </div>
    <?php } ?>
</div>
<?php i_header_mb(); ?>

<div class="change-night change-night-pc" onclick="switchNightMode();nightBtn();"><span class="iconfont"></span></div>

<div class="progress-wrap"><svg><path></svg></div>

<script src="<?php echo i_static(); ?>/js/headroom.min.js"></script>
