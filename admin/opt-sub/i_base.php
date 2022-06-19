<?php
error_reporting(0);
if($_POST["i_opt"]){

    // 基本设置
    update_option("i_avatar_v",$_POST["i_avatar_v"]);
    update_option("i_login",$_POST["i_login"]);
    update_option("i_register_turn",$_POST["i_register_turn"]);
    update_option("i_forget_turn",$_POST["i_forget_turn"]);
    update_option("i_loading_pic",$_POST["i_loading_pic"]);
    
}
?>

<div class="wrap">
    <h1>基本设置</h1>
    <form method="post" action="" novalidate="novalidate">
        <table class="form-table">
            <tbody>
                <tr>
                    <th scope="row"><label for="i_avatar_v">游客头像</label></th>
                    <td>
                        <input name="i_avatar_v" type="text" value="<?php echo get_option("i_avatar_v"); ?>" class="regular-text">
                        <p class="description">显示游客的头像。填写图片链接即可。默认：主题logo</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="i_login">登录/注册/找回密码模板</label></th>
                    <td>
                        <input name="i_login" type="text" value="<?php echo get_option("i_login"); ?>" class="regular-text">
                        <p class="description">数字1为开启。使用主题模板。默认：关闭</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="i_register_turn">用户注册</label></th>
                    <td>
                        <input name="i_register_turn" type="text" value="<?php echo get_option("i_register_turn"); ?>" class="regular-text">
                        <p class="description">数字1为开启。用户注册功能。默认：关闭</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="i_forget_turn">找回密码</label></th>
                    <td>
                        <input name="i_forget_turn" type="text" value="<?php echo get_option("i_forget_turn"); ?>" class="regular-text">
                        <p class="description">数字1为开启。用户找回密码功能。默认：关闭</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="i_loading_pic">懒加载图</label></th>
                    <td>
                        <input name="i_loading_pic" type="text" value="<?php echo get_option("i_loading_pic"); ?>" class="regular-text">
                        <p class="description">图片未加载出时显示。默认：主题自带GIF加载图</p>
                    </td>
                </tr>
            </tbody>
        </table>
        <p class="submit">
            <input type="submit" name="i_opt"  class="button button-primary" value="保存更改">
        </p>
    </form>
</div>