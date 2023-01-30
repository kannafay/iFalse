<?php
@$i_keywords = stripslashes($_POST["i_keywords"]);
@$i_night = stripslashes($_POST["i_night"]);
@$i_say_img = stripslashes($_POST["i_say_img"]);
@$i_cdn = stripslashes($_POST["i_cdn"]);
@$i_cdn_custom = stripslashes($_POST["i_cdn_custom"]);
@$i_404_tip = stripslashes($_POST["i_404_tip"]);
@$i_mourn = stripslashes($_POST["i_mourn"]);
@$i_plan = stripslashes($_POST["i_plan"]);

if(@stripslashes($_POST["i_opt"])){
    update_option("i_keywords",$_POST["i_keywords"]);
    update_option("i_night",$_POST["i_night"]);
    update_option("i_say_img",$_POST["i_say_img"]);
    update_option("i_cdn",$_POST["i_cdn"]);
    update_option("i_cdn_custom",$_POST["i_cdn_custom"]);
    update_option("i_404_tip",$_POST["i_404_tip"]);
    update_option("i_mourn",$_POST["i_mourn"]);
    update_option("i_plan",$_POST["i_plan"]);
}
?>

<link rel="stylesheet" href="<?php echo i_static(); ?>/admin/options/i_frame.css">
<script src="<?php echo i_static(); ?>/admin/options/i_stat.js"></script>
<?php if(get_option("i_color")){echo "<style>.description-primary{color:".get_option("i_color").";}</style>";}; ?>
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
                        <p class="description">数字2为自动夜间模式。</p>
                        <p class="description-primary">春夏季(3~8)：20:00~06:00，秋冬季(9~2)：19:00~07:00</p>
                        
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
                    <th scope="row"><label for="i_cdn">静态资源CDN加速</label></th>
                    <td>
                        <input name="i_cdn" type="text" value="<?php echo get_option("i_cdn"); ?>" class="regular-text">
                        <p class="description">填入对应的数字即可开启，效果不佳请更换或停用。</p>
                        <p class="description">数字1：百度云加速（Sola提供）</p>
                        <p class="description">数字2：jsDelivr</p>
                        <p class="description">数字3：Netlify</p>
                        <p class="description-primary">默认：不使用</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="i_cdn_custom">静态资源CDN加速-自定义</label></th>
                    <td>
                        <input name="i_cdn_custom" type="text" value="<?php echo get_option("i_cdn_custom"); ?>" class="regular-text">
                        <p class="description">请填写http/https链接。</p>
                        <p class="description">如，https://cdn.xxx.net/@x.x.x (不需要以/结尾)</p>
                        <p class="description">主题静态资源文件下载：<a href="https://github.com/kannafay/iFalse-Static" class="description-primary" target="_blank">传送门</a></p>
                        <p class="description-primary">默认：无</p>
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
                    <th scope="row"><label for="i_mourn">悼念模式</label></th>
                    <td>
                        <input name="i_mourn" type="text" value="<?php echo get_option("i_mourn"); ?>" class="regular-text">
                        <p class="description">数字1为开启。开启后首页变成灰色。</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="i_plan">体验计划</label></th>
                    <td>
                        <input name="i_plan" type="text" value="<?php echo get_option("i_plan"); ?>" class="regular-text">
                        <p class="description">数字1为开启。开启后将帮助开发者获得更多的BUG反馈。</p>
                    </td>
                </tr>
            </tbody>
        </table>
        <p class="submit">
            <input type="submit" name="i_opt"  class="button button-primary" value="保存更改">
        </p>
    </form>
</div>