<?php

if($_POST['i_opt']){
    $attachment_id = media_handle_upload( 'logo', 0 ); //上传图片，返回的是 附件的ID
    $logo_url = wp_get_attachment_url($attachment_id); //获取 图片的地址
    if($logo_url){
        update_option("logo_img",$logo_url); //如果图片地址在在，就将图片的地址写入到数据库
    }
    update_option("i_avatar_v",$_POST["i_avatar_v"]);
    update_option("i_wrapper_text",$_POST["i_wrapper_text"]);
    update_option("i_wrapper_name",$_POST["i_wrapper_name"]);
    update_option("i_notice",$_POST["i_notice"]);
    update_option("i_blog_or_card",$_POST["i_blog_or_card"]);
    update_option("i_random_pic",$_POST["i_random_pic"]);
    update_option("i_loading_pic",$_POST["i_loading_pic"]);
    update_option("i_hello",$_POST["i_hello"]);
    update_option("i_copyright",$_POST["i_copyright"]);
    update_option("i_icp",$_POST["i_icp"]);
    update_option("i_statement",$_POST["i_statement"]);
    update_option("i_404_tip",$_POST["i_404_tip"]);
    update_option("i_404_bak",$_POST["i_404_bak"]);
    update_option("i_comments_article",$_POST["i_comments_article"]);
    update_option("i_comments_page",$_POST["i_comments_page"]);
    update_option("i_comments_turn",$_POST["i_comments_turn"]);
    update_option("i_login",$_POST["i_login"]);
    update_option("i_say_img",$_POST["i_say_img"]);
    update_option("i_register_turn",$_POST["i_register_turn"]);
    update_option("i_forget_turn",$_POST["i_forget_turn"]);
    update_option("i_header_hidden",$_POST["i_header_hidden"]);
}
$logo_img = get_option("logo_img");
?>

<div class="wrap">
    <h1>iFalse主题设置</h1>
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
                    <th scope="row"><label for="i_wrapper_text">首页标语</label></th>
                    <td>
                        <input name="i_wrapper_text" type="text" value="<?php echo get_option("i_wrapper_text"); ?>" class="regular-text">
                        <p class="description">默认：一言</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="i_wrapper_name">标语作者</label></th>
                    <td>
                        <input name="i_wrapper_name" type="text" value="<?php echo get_option("i_wrapper_name"); ?>" class="regular-text">
                        <p class="description">默认：一言作者</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="i_notice">首页公告</label></th>
                    <td>
                        <input name="i_notice" type="text" value="<?php echo get_option("i_notice"); ?>" class="regular-text">
                        <p class="description">用于首页发布公告，留空则不显示</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="i_blog_or_card">博客模式</label></th>
                    <td>
                        <input name="i_blog_or_card" type="text" value="<?php echo get_option("i_blog_or_card"); ?>" class="regular-text">
                        <p class="description">数字1为开启，首页切换成两栏模式。默认：卡片模式</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="i_random_pic">文章封面</label></th>
                    <td>
                        <input name="i_random_pic" type="text" value="<?php echo get_option("i_random_pic"); ?>" class="regular-text">
                        <p class="description">用于文章没有封面时代替。默认：主题海报</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="i_loading_pic">懒加载图</label></th>
                    <td>
                        <input name="i_loading_pic" type="text" value="<?php echo get_option("i_loading_pic"); ?>" class="regular-text">
                        <p class="description">图片未加载出时显示。默认：主题自带GIF加载图</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="i_hello">登录提示</label></th>
                    <td>
                        <input name="i_hello" type="text" value="<?php echo get_option("i_hello"); ?>" class="regular-text">
                        <p class="description">移动端未登录提示。默认：Hi, 请登录!</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="i_copyright">网站版权</label></th>
                    <td>
                        <input name="i_copyright" type="text" value="<?php echo get_option("i_copyright"); ?>" class="regular-text">
                        <p class="description">默认：Copyright © 2022</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="i_statement">内容版权</label></th>
                    <td>
                        <input name="i_statement" type="text" value="<?php echo get_option("i_statement"); ?>" class="regular-text">
                        <p class="description">页脚显示网站内容声明。留空则使用默认值</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="i_icp">备案号</label></th>
                    <td>
                        <input name="i_icp" type="text" value="<?php echo get_option("i_icp"); ?>" class="regular-text">
                        <p class="description">页脚备案号，没有备案号请留空</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="i_404_tip">404提示语</label></th>
                    <td>
                        <input name="i_404_tip" type="text" value="<?php echo get_option("i_404_tip"); ?>" class="regular-text">
                        <p class="description">提示用户404错误信息。留空则使用默认值</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="i_404_bak">404按钮</label></th>
                    <td>
                        <input name="i_404_bak" type="text" value="<?php echo get_option("i_404_bak"); ?>" class="regular-text">
                        <p class="description">按钮文字。默认：返回首页</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="i_comments_article">文章评论</label></th>
                    <td>
                        <input name="i_comments_article" type="text" value="<?php echo get_option("i_comments_article"); ?>" class="regular-text">
                        <p class="description">数字1为开启。文章页评论区。默认：关闭</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="i_comments_page">页面评论</label></th>
                    <td>
                        <input name="i_comments_page" type="text" value="<?php echo get_option("i_comments_page"); ?>" class="regular-text">
                        <p class="description">数字1为开启。页面评论区。默认：关闭</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="i_comments_turn">游客评论</label></th>
                    <td>
                        <input name="i_comments_turn" type="text" value="<?php echo get_option("i_comments_turn"); ?>" class="regular-text">
                        <p class="description">数字1为关闭。是否开启游客评论。默认：开启</p>
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
                    <th scope="row"><label for="i_say_img">说说背景</label></th>
                    <td>
                        <input name="i_say_img" type="text" value="<?php echo get_option("i_say_img"); ?>" class="regular-text">
                        <p class="description">说说页面顶部背景图。填写图片地址即可。默认：随机图</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="i_header_hidden">隐藏导航栏</label></th>
                    <td>
                        <input name="i_header_hidden" type="text" value="<?php echo get_option("i_header_hidden"); ?>" class="regular-text">
                        <p class="description">数字1为开启。向下滚动页面时隐藏导航栏。默认：关闭</p>
                    </td>
                </tr>
            </tbody>
        </table>
        <p class="submit">
            <input type="submit" name="i_opt"  class="button button-primary" value="保存更改">
        </p>
    </form>
</div>