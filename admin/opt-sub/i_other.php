<?php
error_reporting(0);
if($_POST["i_opt"]){
    
    // 其他设置
    update_option("i_keywords",$_POST["i_keywords"]);
    update_option("i_night",$_POST["i_night"]);
    update_option("i_say_img",$_POST["i_say_img"]);
    update_option("i_404_tip",$_POST["i_404_tip"]);
    update_option("i_404_bak",$_POST["i_404_bak"]);
    update_option("i_mourn",$_POST["i_mourn"]);
    
}
?>

<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/admin/style/i_frame.css">
<div class="wrap">
    <h1>其他设置</h1>
    <form method="post" action="" novalidate="novalidate">
        <table class="form-table">
            <tbody>
                <tr>
                    <th scope="row"><label for="i_keywords">首页关键词</label></th>
                    <td>
                        <input name="i_keywords" type="text" value="<?php echo get_option("i_keywords"); ?>" class="regular-text">
                        <p class="description">利于网站SEO，以英文逗号隔开。</p>
                        <p class="description-primary">默认：iFalse, iFalse主题, WordPress开源主题</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="i_night">夜间模式</label></th>
                    <td>
                        <input name="i_night" type="text" value="<?php echo get_option("i_night"); ?>" class="regular-text">
                        <p class="description">数字1为开启。开启后全局夜间模式。</p>
                        <p class="description">数字2为自动夜间模式。时间为20:00~07:00。</p>
                        
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="i_say_img">说说背景</label></th>
                    <td>
                        <input name="i_say_img" type="text" value="<?php echo get_option("i_say_img"); ?>" class="regular-text">
                        <p class="description">说说页面顶部背景图。填写图片地址即可。</p>
                        <p class="description-primary">默认：主题海报</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="i_404_tip">404提示</label></th>
                    <td>
                        <input name="i_404_tip" type="text" value="<?php echo get_option("i_404_tip"); ?>" class="regular-text">
                        <p class="description">404错误信息。</p>
                        <p class="description-primary">默认：抱歉, 您请求的页面找不到了!</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="i_404_bak">404按钮</label></th>
                    <td>
                        <input name="i_404_bak" type="text" value="<?php echo get_option("i_404_bak"); ?>" class="regular-text">
                        <p class="description">按钮文字。</p>
                        <p class="description-primary">默认：返回首页</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="i_mourn">悼念模式</label></th>
                    <td>
                        <input name="i_mourn" type="text" value="<?php echo get_option("i_mourn"); ?>" class="regular-text">
                        <p class="description">数字1为开启。开启后首页变成灰色。</p>
                    </td>
                </tr>
            </tbody>
        </table>
        <p class="submit">
            <input type="submit" name="i_opt"  class="button button-primary" value="保存更改">
        </p>
    </form>
</div>