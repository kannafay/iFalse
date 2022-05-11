<?php
/*Template Name: 会员注册*/
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
                <!-- 注册 -->
                <div class="register-box">
                    <h2>欢迎注册！</h2>
                    <div class="des">注册成为会员</div>
                    <?php
                        if( !empty($_POST['ludou_reg']) ) {
                            $error = '';
                            $sanitized_user_login = sanitize_user( $_POST['user_login'] );
                            $user_email = apply_filters( 'user_registration_email', $_POST['user_email'] );
                            
                            // 检查用户名
                            if ( ! validate_username( $sanitized_user_login ) ) {
                                $error .= '<p style="color:#D43030">用户名包含无效字符，请输入有效的用户名！</p>';
                                $sanitized_user_login = '';
                            } elseif ( username_exists( $sanitized_user_login ) ) {
                                $error .= '<p style="color:#D43030">该用户名已被注册！</p>';
                            }
                            // 检查邮箱
                            if ( ! is_email( $user_email ) ) {
                                $error .= '<p style="color:#D43030">电子邮件地址不正确！</p>';
                                $user_email = '';
                            } elseif ( email_exists( $user_email ) ) {
                                $error .= '<p style="color:#D43030">该电子邮件地址已经被注册！</p>';
                            }
                            // 检查密码
                            if(strlen($_POST['user_pass']) < 6)
                                $error .= '<p style="color:#D43030">密码长度至少6位！</p>';
                                elseif($_POST['user_pass'] != $_POST['user_pass2'])
                                $error .= '<p style="color:#D43030">两次输入的密码必须一致！</p>';if($error == '') {
                                $user_id = wp_create_user( $sanitized_user_login, $_POST['user_pass'], $user_email );
                            
                                if ( ! $user_id ) {
                                    $error .= sprintf( '<p style="color:#D43030">无法完成您的注册请求...请联系<a href="mailto:%s">管理员</a>！</p>', get_option( 'admin_email' ) );
                                }
                                else if (!is_user_logged_in()) {
                                    $user = get_userdatabylogin($sanitized_user_login);
                                    $user_id = $user->ID;
                                
                                    // 自动登录
                                    wp_set_current_user($user_id, $user_login);
                                    wp_set_auth_cookie($user_id);
                                    do_action('wp_login', $user_login);
                                }
                            }
                        }
                    ?>
                            
                    <?php 
                        if(!empty($error)) {
                            echo '<p class="ludou-error">'.$error.'</p>';
                        }
                        if (!is_user_logged_in()) { ?>
                            <form name="registerform" method="POST" action="<?php echo $_SERVER["REQUEST_URI"]; ?>">
                                <div class="form-item form-username">
                                    <span class="iconfont icon-atm"></span>
                                    <input type="text" name="user_login" placeholder="用户名" size="20" required="required" value="<?php if(!empty($sanitized_user_login)) echo $sanitized_user_login; ?>">
                                </div>
                                <div class="form-item form-email">
                                    <span class="iconfont icon-email"></span>
                                    <input type="email" name="user_email" placeholder="邮箱" size="20" required="required" value="<?php if(!empty($user_email)) echo $user_email; ?>">
                                </div>
                                <div class="form-item form-password">
                                    <span class="iconfont icon-password"></span>
                                    <input type="password" name="user_pass" placeholder="密码" size="20" required="required">
                                </div>
                                <div class="form-item form-password">
                                    <span class="iconfont icon-password"></span>
                                    <input type="password" name="user_pass2" placeholder="确认密码" size="20" required="required">
                                </div>
                                <div class="form-other">
                                    <span>已有账户？<a href="<?php home_url(); ?>/login">立即登录</a></span>
                                    <span><a href="<?php home_url(); ?>/forget">找回密码</a></span>
                                </div>
                                <div class="form-item">
                                    <input type="hidden" name="ludou_reg" value="ok">
                                    <button type="submit" name="wp-submit">注册</button>
                                </div>
                                <div class="form-other">
                                    <span><span class="iconfont icon-yduizhengqueshixin" style="color:#1AAD19;"> </span>注册即代表同意<a href="<?php home_url(); ?>/privacy-policy">《用户协议》</a></span>
                                </div>
                            </form>
                        <?php } else {
                            echo '<p style="color:#32CD32">您已注册成功，并已登录！<a class="register-back-home" href="/">返回首页</a></p>';
                        } 
                    ?>
                </div>
            </div>
        </div>
    </div>

    <?php i_frame_js(); ?>
    
</body>
</html>