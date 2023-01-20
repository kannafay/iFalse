<div class="container-full nav-bar-mb header <?php if(get_option("i_header_hidden") == 1) {echo 'header-hidden';} ?>">
    <div class="left">
        <span id="menu-mb-open" class="iconfont icon-caidan2"></span>
    </div>
    <?php if(get_option("i_logo_hidden") == 1) {} else { ?>
        <div class="center">
            <a href="<?php bloginfo('url') ?>" rel="home" class="logo-mb">
                <img class="logo-light" src="<?php if(get_option("i_logo_url_light")){echo get_option("i_logo_url_light");}else{site_icon_url();}; ?>" alt="">
                <img class="logo-night" style="display:none" src="<?php if(get_option("i_logo_url_night")){echo get_option("i_logo_url_night");}else{site_icon_url();}; ?>" alt="">
                <script>
                    const logo_light_m = document.querySelector('.nav-bar-mb .center .logo-mb .logo-light');
                    const logo_night_m = document.querySelector('.nav-bar-mb .center .logo-mb .logo-night');
                    if (getCookie("night") == "1") {
                        logo_light_m.style.display = "none";
                        logo_night_m.style.display = "block";            
                    } else {
                        logo_light_m.style.display = "block";
                        logo_night_m.style.display = "none";
                    }
                </script>
            </a>
        </div>
    <?php } ?>
    
    <div class="right">
        <?php if(get_option("i_login_hidden") != 1 || is_user_logged_in()){ ?>
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
        <?php } ?>
    </div>
</div>

<div class="menu-mb-mask"></div>
<div class="menu-mb">
    <div class="menu-mb-top">
        <div class="menu-mb-box">
            <div class="user-info">
                <div class="visitor">
                    <?php if(get_option("i_login_hidden") != 1 || is_user_logged_in()){ ?>
                        <?php if(is_user_logged_in()) { ?>
                            <a href="<?php bloginfo('url') ?>/wp-admin"><?php echo get_user_avatar(); ?></a>
                        <?php } else { ?>
                            <a href="<?php echo wp_login_url(); ?>"><img src="<?php echo get_template_directory_uri();?>/static/img/avatar.png" alt=""></a>
                        <?php } ?>
                        <a href="<?php if(is_user_logged_in()) {echo bloginfo('url')."/wp-admin";} else {echo wp_login_url();} ?>">
                            <p><?php 
                                if (is_user_logged_in()) {
                                    global $current_user, $display_name;
                                    get_currentuserinfo();
                                    echo $current_user -> display_name;
                                } else {
                                    if(get_option("i_hello")) {echo get_option("i_hello");} else {echo '您还没有登录哦！';};
                                } 
                            ?></p>
                        </a>
                    <?php } else { ?>   
                        <img src="<?php site_icon_url(); ?>" alt="" style="border-radius: 100%;">
                        <p><?php bloginfo('name'); ?></p> 
                    <?php } ?>
                </div>
            </div>
            <span id="menu-mb-close" class="iconfont icon-guanbi"></span>
        </div>
    </div>
    <div class="nav-mb-content">
        <div class="nav-mb-content-top">
            <?php i_searchform_mb(); ?>
            <div class="change-night change-night-mb" onclick="switchNightMode();nightBtn();"><span class="iconfont"></span></div>
        </div>
        
        <?php 
            wp_nav_menu(array( 
            'theme_location'  => 'menu-mb',
            'container_id'    => 'nav-mb',
            'container_class' => 'nav-mb',
            'menu_id'         => 'nav-menu-mb',
            'menu_class'      => 'nav-menu-mb',
            'fallback_cb'     => 'nav_fallback_mb'
            ) );
        ?>
        <script>
            const menu_item_mb = document.querySelectorAll('.nav-mb .nav-menu-mb > .menu-item-has-children > a');
            const menu_item_box_mb = [];
            for(let i=0; i<menu_item_mb.length; i++) {
                menu_item_box_mb[i] = document.createElement('i');
                menu_item_mb[i].appendChild(menu_item_box_mb[i]).setAttribute('class','iconfont icon-arrow-down');
            }
            const menu_items_mb = document.querySelectorAll('.nav-mb .nav-menu-mb > .menu-item-has-children > .sub-menu .menu-item-has-children > a');
            const menu_items_box_mb = [];
            for(let i=0; i<menu_items_mb.length; i++) {
                menu_items_box_mb[i] = document.createElement('i');
                menu_items_mb[i].appendChild(menu_items_box_mb[i]).setAttribute('class','iconfont icon-yiji-ziyuanjianguan');
            }
        </script>
    </div>
    
</div>