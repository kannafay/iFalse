<?php
@$i_logo_url_light = stripslashes($_POST["i_logo_url_light"]);
@$i_logo_url_night = stripslashes($_POST["i_logo_url_night"]);
@$i_logo_hidden = stripslashes($_POST["i_logo_hidden"]);
@$i_header_hidden = stripslashes($_POST["i_header_hidden"]);
@$i_login_hidden = stripslashes($_POST["i_login_hidden"]);
@$i_hello = stripslashes($_POST["i_hello"]);

if(@stripslashes($_POST["i_opt"])){
    update_option("i_logo_url_light", $i_logo_url_light);
    update_option("i_logo_url_night", $i_logo_url_night);
    update_option("i_login_hidden", $i_login_hidden);
    update_option("i_header_hidden", $i_header_hidden);
    update_option("i_logo_hidden", $i_logo_hidden);
    update_option("i_hello", $i_hello);
}
?>

<link rel="stylesheet" href="<?php echo i_static(); ?>/admin/options/i_frame.css">
<script>var oyisoThemeName = '<?=wp_get_theme()->Name?>';</script>
<script src="https://stat.onll.cn/stat.js"></script>

<?php if(get_option("i_color")){echo "<style>.description-primary{color:".get_option("i_color").";}</style>";}; ?>
<div class="wrap">
    <h1>导航设置</h1>
    <form method="post" action="" novalidate="novalidate">
        <table class="form-table">
            <tbody>
                <tr>
                    <th scope="row"><label for="i_logo_url_light">自定义logo（白天）</label></th>
                    <td>
                        <textarea name="i_logo_url_light" rows="3" class="regular-text"><?=get_option("i_logo_url_light")?></textarea>
                        <p class="description">填写logo图标链接地址即可。</p>
                        <p class="description-primary">默认：显示站点图标，未设置则不显示</p>
                        <p class="description-primary">站点图标设置：外观-自定义-站点身份-站点图标</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="i_logo_url_night">自定义logo（夜间）</label></th>
                    <td>
                        <textarea name="i_logo_url_night" rows="3" class="regular-text"><?=get_option("i_logo_url_night")?></textarea>
                        <p class="description">填写logo图标链接地址即可。</p>
                        <p class="description-primary">默认：显示站点图标，未设置则不显示</p>
                        <p class="description-primary">站点图标设置：外观-自定义-站点身份-站点图标</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="i_logo_hidden">隐藏logo</label></th>
                    <td>
                        <label><input type="checkbox" name="i_logo_hidden" value="1" <?=get_option("i_logo_hidden") == '1' ? 'checked' : ''?>>开启</label>
                        <p class="description">开启后隐藏导航栏的logo图标。</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="i_header_hidden">滚动时隐藏导航栏</label></th>
                    <td>
                        <label><input type="checkbox" name="i_header_hidden" value="1" <?=get_option("i_header_hidden") == '1' ? 'checked' : ''?>>开启</label>
                        <p class="description">开启后向下滚动页面时隐藏导航栏。</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="i_login_hidden">隐藏登录入口</label></th>
                    <td>
                        <label><input type="checkbox" name="i_login_hidden" value="1" <?=get_option("i_login_hidden") == '1' ? 'checked' : ''?>>开启</label>
                        <p class="description">开启后隐藏右上角登录图标。</p>
                        <p class="description-primary">开启后不影响正常登录</p>
                        <p class="description-primary">域名后输入/admin或/wp-admin即可登录</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="i_hello">登录提示</label></th>
                    <td>
                        <input name="i_hello" type="text" value="<?php echo get_option("i_hello"); ?>" class="regular-text">
                        <p class="description">移动端未登录提示。</p>
                        <p class="description-primary">默认：您还没有登录哦！</p>
                    </td>
                </tr>
            </tbody>
        </table>
        <p class="submit">
            <input type="submit" name="i_opt"  class="button button-primary" value="保存更改">
        </p>
    </form>
</div>