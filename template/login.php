<?php
/*Template Name: 会员登录*/
?>

<!DOCTYPE html>
<html lang="zh">
<head>
    <?php i_frame(); ?>
    <title><?php the_title(); ?> - <?php bloginfo('name') ?></title>
    <style>
        body {
            overflow: hidden;
        }
        .progress-wrap,
        .active-progress {
            display: none !important;
        }
    </style>
</head> 
<body>
    <?php get_header(); ?>
    <?php
    if(is_user_logged_in()) {        
        if(current_user_can('level_10')) {
            wp_redirect(home_url() . '/wp-admin', 302);
        } else {
            wp_redirect(home_url(), 302);
        }
    } else ?>
    <div class="login-page">
        <div class="login-main">
            <img class="login-img" src="<?php echo get_template_directory_uri(); ?>/static/img/login.svg" alt="login">
            <div class="login-msg">
                <div class="login-box">
                    <h2>欢迎回来！</h2>
                    <div class="des">会员请登录</div>
                    <p style="color:#D43030">
                        <?php
                            $login = (isset($_GET['login']) ) ? $_GET['login'] : 0;
                            if ( $login === "failed" ) { 
                                echo '用户名或密码错误！'; 
                            }
                        ?>
                    </p>
                    <form name="loginform" method="POST" action="<?php home_url(); ?>/wp-login.php">
                        <div class="form-item form-username">
                            <span class="iconfont icon-atm"></span>
                            <input type="text" name="log" placeholder="用户名/邮箱" size="20" required="required">
                        </div>
                        <div class="form-item form-password">
                            <span class="iconfont icon-password"></span>
                            <input type="password" name="pwd" placeholder="密码" size="20" required="required">
                        </div>
                        <div class="form-other">
                            <span>还没有账户？<a href="<?php home_url(); ?>/register">立即注册</a></span>
                            <span><a href="<?php home_url(); ?>/forget">找回密码</a></span>
                        </div>
                        <div class="form-item">
                            <button type="submit" name="wp-submit">登录</button>
                        </div>
                    </form>
                        
                    <!-- <div class="login-third">
                        <hr><p>or</p><hr>
                    </div> -->
                </div>
            </div>
        </div>
    </div>

    <?php i_frame_js(); ?>
    
</body>
</html>