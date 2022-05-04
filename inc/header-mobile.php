<div class="container-full nav-bar-mb header">
    <div class="left">
        <div class="menu-mb-mask"></div>
        <span id="menu-mb-open" class="iconfont icon-caidan"></span>
        <div class="menu-mb">
            <div class="menu-mb-top">
                <div class="menu-mb-box">
                    <div class="user-info">
                        <a href="<?php bloginfo('url'); ?>/wp-admin">
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
                                        if(get_option("i_hello")) {echo get_option("i_hello");} else {echo '{{ hello }}';};
                                    } 
                                ?>
                            </p>
                        </a>
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
    </div>
    <div class="center">
        <a href="<?php bloginfo('url') ?>" rel="home" class="logo-mb"><img src="<?php site_icon_url(); ?>" alt=""></a>
    </div>
    <div class="right">
        <?php if (is_user_logged_in()) { ?>
            <a href="<?php echo wp_logout_url(); ?>" class="login"><span class="iconfont icon-tuichu"></span></a> 
        <?php ;} else { ?>
            <a href="<?php echo wp_login_url(); ?>" class="login"><span class="iconfont icon-User"></span></a>
        <?php ;} ?>    
    </div>
</div>