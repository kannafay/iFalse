<div class="container-full nav-bar-mb header <?php if(get_option("i_header_hidden") == 1) {echo 'header-hidden';} ?>">
    <div class="left">
        <span id="menu-mb-open" class="iconfont icon-caidan2"></span>
    </div>
    <?php if(get_option("i_logo_hidden") == 1) {} else { ?>
        <div class="center">
            <a href="<?php bloginfo('url') ?>" rel="home" class="logo-mb"><img src="<?php site_icon_url(); ?>" alt=""></a>
        </div>
    <?php } ?>
    <div class="right">
        <?php if (is_user_logged_in()) { ?>
            <div class="admin">
                <?php echo get_user_avatar(); ?>
            </div>
            <div class="user-set">
                <?php if(current_user_can('level_7')) { ?>
                    <a href="<?php bloginfo('url') ?>/wp-admin"><span class="iconfont icon-shezhi"></span> 后台管理</a>
                <?php } ?>
                <?php if(current_user_can('level_1')) { ?>
                    <a href="<?php bloginfo('url') ?>/wp-admin/post-new.php"><span class="iconfont icon-tianxieziliao"></span> 发布文章</a>
                    <a href="<?php bloginfo('url') ?>/wp-admin/post-new.php?post_type=shuoshuo"><span class="iconfont icon-xiaoxi1"></span> 发布说说</a>
                <?php } ?>
                <a href="<?php bloginfo('url') ?>/wp-admin/profile.php"><span class="iconfont icon-gerenziliao"></span> 个人资料</a>
                <a href="<?php echo wp_logout_url(); ?>"><span class="iconfont icon-tuichu"></span> 退出登录</a>
            </div>
        <?php ;} else { ?>
            <a href="<?php echo wp_login_url(); ?>" class="login"><span class="iconfont icon-User"></span></a>
        <?php ;} ?>    
    </div>
</div>

<div class="menu-mb-mask"></div>
<div class="menu-mb">
    <div class="menu-mb-top">
        <div class="menu-mb-box">
            <div class="user-info">
                <div class="visitor">
                    <?php  
                        if(is_user_logged_in()) {
                            echo get_user_avatar();
                        } else {
                            $i_avatar_v = get_template_directory_uri() . '/static/img/avatar.png';
                            if(get_option("i_avatar_v")) {echo '<img src="' . get_option("i_avatar_v") . '" />';} else {echo '<img src="' . $i_avatar_v . '" />';}
                        }
                    ?>
                    <p>
                        <?php 
                            if ( is_user_logged_in() ) {
                                global $current_user, $display_name, $user_email;
                                get_currentuserinfo();
                                echo $current_user -> display_name;
                            } else {
                                if(get_option("i_hello")) {echo get_option("i_hello");} else {echo 'Hi, 请登录!';};
                            } 
                        ?>
                    </p>
                </div>
            </div>
            <span id="menu-mb-close" class="iconfont icon-guanbi"></span>
        </div>
    </div>
    <div class="nav-mb-content">
        <?php i_searchform_mb(); ?>
        <?php 
            wp_nav_menu( array( 
            'container_id' => 'nav-mb',
            'container_class' => 'nav-mb',
            'menu_id' => 'nav-menu-mb',
            'menu_class' => 'nav-menu-mb'
            ) );
        ?>
    </div>
    
</div>