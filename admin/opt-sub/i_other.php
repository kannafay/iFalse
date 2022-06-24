<?php
error_reporting(0);
if($_POST["i_opt"]){
    
    // 其他设置
    update_option("i_night",$_POST["i_night"]);
    update_option("i_say_img",$_POST["i_say_img"]);
    update_option("i_404_tip",$_POST["i_404_tip"]);
    update_option("i_404_bak",$_POST["i_404_bak"]);
    update_option("i_mourn",$_POST["i_mourn"]);
    
}
?>

<div class="wrap">
    <h1>其他设置</h1>
    <form method="post" action="" novalidate="novalidate">
        <table class="form-table">
            <tbody>
                <tr>
                    <th scope="row"><label for="i_night">自动夜间模式</label></th>
                    <td>
                        <input name="i_night" type="text" value="<?php echo get_option("i_night"); ?>" class="regular-text">
                        <p class="description">数字1为开启。21:00~06:00自动开启夜间模式。默认：关闭</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="i_say_img">说说背景</label></th>
                    <td>
                        <input name="i_say_img" type="text" value="<?php echo get_option("i_say_img"); ?>" class="regular-text">
                        <p class="description">说说页面顶部背景图。填写图片地址即可。默认：主题海报</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="i_404_tip">404提示</label></th>
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
                    <th scope="row"><label for="i_mourn">悼念模式</label></th>
                    <td>
                        <input name="i_mourn" type="text" value="<?php echo get_option("i_mourn"); ?>" class="regular-text">
                        <p class="description">数字1为开启。全站变灰，缅怀先烈。默认：关闭</p>
                    </td>
                </tr>
            </tbody>
        </table>
        <p class="submit">
            <input type="submit" name="i_opt"  class="button button-primary" value="保存更改">
        </p>
    </form>
</div>