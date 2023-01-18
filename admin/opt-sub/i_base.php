<?php
@$i_plane = stripslashes($_POST["i_plane"]);
@$i_blog_or_card = stripslashes($_POST["i_blog_or_card"]);
@$i_loading_pic = stripslashes($_POST["i_loading_pic"]);
@$i_login = stripslashes($_POST["i_login"]);
@$i_register_turn = stripslashes($_POST["i_register_turn"]);
@$i_forget_turn = stripslashes($_POST["i_forget_turn"]);

if(@stripslashes($_POST["i_opt"])){
    update_option("i_plane",$i_plane);
    update_option("i_blog_or_card",$i_blog_or_card);
    update_option("i_loading_pic",$i_loading_pic);
    update_option("i_login",$i_login);
    update_option("i_register_turn",$i_register_turn);
    update_option("i_forget_turn",$i_forget_turn);
}
?>

<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/admin/style/i_frame.css">
<div class="wrap">
    <h1>基本设置</h1>
    <form method="post" action="" novalidate="novalidate">
        <table class="form-table">
            <tbody>
                <tr>
                    <th scope="row"><label for="i_plane">面性样式</label></th>
                    <td>
                        <input name="i_plane" type="text" value="<?php echo get_option("i_plane"); ?>" class="regular-text">
                        <p class="description">数字1为开启。开启后局部样式由线性转为面性。</p>
                        <p class="description-primary">默认：线性样式</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="i_blog_or_card">博客模式</label></th>
                    <td>
                        <input name="i_blog_or_card" type="text" value="<?php echo get_option("i_blog_or_card"); ?>" class="regular-text">
                        <p class="description">数字1为开启。开启后首页切换成双栏模式。</p>
                        <p class="description-primary">默认：卡片模式</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="i_loading_pic">懒加载图</label></th>
                    <td>
                        <input name="i_loading_pic" type="text" value="<?php echo get_option("i_loading_pic"); ?>" class="regular-text">
                        <p class="description">图片未加载出时显示。</p>
                        <p class="description-primary">默认：主题自带GIF加载图</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="i_login">登录/注册/找回密码模板</label></th>
                    <td>
                        <input name="i_login" type="text" value="<?php echo get_option("i_login"); ?>" class="regular-text">
                        <p class="description">数字1为开启。开启后使用主题模板。</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="i_register_turn">用户注册</label></th>
                    <td>
                        <input name="i_register_turn" type="text" value="<?php echo get_option("i_register_turn"); ?>" class="regular-text">
                        <p class="description">数字1为开启。开启后运行用户注册。</p>
                        <p class="description-primary">仅用于主题注册模板，如需完全关闭请前往WP设置。</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="i_forget_turn">找回密码</label></th>
                    <td>
                        <input name="i_forget_turn" type="text" value="<?php echo get_option("i_forget_turn"); ?>" class="regular-text">
                        <p class="description">数字1为开启。开启后用户可以使用找回密码功能。</p>
                        <p class="description-primary">仅用于主题找回密码模板</p>
                    </td>
                </tr>

            </tbody>
        </table>
        <p class="submit">
            <input type="submit" name="i_opt"  class="button button-primary" value="保存更改">
        </p>
    </form>
</div>