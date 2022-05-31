<div class="container-full nav-bar header <?php if(get_option("i_header_hidden") == 1) {echo 'header-hidden';} ?>">
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
            <div class="admin">
                <?php echo get_user_avatar(); ?>
            </div>
            <div class="user-set">
                <a href="<?php bloginfo('url') ?>/wp-admin"><span class="iconfont icon-shezhi"></span> 后台管理</a>
                <a href="<?php bloginfo('url') ?>/wp-admin/post-new.php"><span class="iconfont icon-tianxieziliao"></span> 撰写文章</a>
                <a href="<?php bloginfo('url') ?>/wp-admin/profile.php"><span class="iconfont icon-gerenziliao"></span> 个人资料</a>
                <a href="<?php echo wp_logout_url(); ?>"><span class="iconfont icon-tuichu"></span> 退出登录</a>
            </div>
        <?php ;} else { ?>
            <a href="<?php echo wp_login_url(); ?>" class="login"><span class="iconfont icon-User"></span></a>
        <?php ;} ?>
    </div>
</div>
<?php i_header_mb(); ?>

<div class="progress-wrap">
	<svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
		<path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"/>
	</svg>
</div>

<span style="display:none" id="queries_num"><?php echo get_num_queries(); ?> queries in <?php timer_stop(7); ?>s</span>
