<div class="container-full nav-bar header">
    <div class="left">
        <a href="<?php bloginfo('url') ?>" rel="home" class="logo"><img src="<?php site_icon_url(); ?>" alt=""></a>
        <?php 
            wp_nav_menu( array( 
                'container_id' => 'nav',
                'container_class' => 'nav',
                'menu_id' => 'nav-menu',
                'menu_class' => 'nav-menu'
            ) );
        ?>
    </div>
    <div class="right">
        <?php if (is_user_logged_in()) { ?>
            <a href="<?php bloginfo('url') ?>/wp-admin" class="admin">
                <?php echo get_user_avatar(); ?>
                <p>
                    <?php 
                        global $current_user, $display_name, $user_email;
                        get_currentuserinfo();
                        echo $current_user -> display_name;
                    ?>
                </p>
            </a>
            <a href="<?php echo wp_logout_url(); ?>" class="login"><span class="iconfont icon-tuichu"></span></a> 
        <?php ;} else { ?>
            <a href="<?php echo wp_login_url(); ?>" class="login"><span class="iconfont icon-User"></span></a>
        <?php ;} ?>
    </div>
</div>
<?php i_header_mb(); ?>

