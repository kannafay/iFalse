<?php
@$i_copyright = stripslashes($_POST["i_copyright"]);
@$i_icp = stripslashes($_POST["i_icp"]);
@$i_icp_gov = stripslashes($_POST["i_icp_gov"]);
@$i_upyun = stripslashes($_POST["i_upyun"]);
@$i_build_date = stripslashes($_POST["i_build_date"]);

if(@stripslashes($_POST["i_opt"])){
    update_option("i_copyright", $i_copyright);
    update_option("i_icp", $i_icp);
    update_option("i_icp_gov", $i_icp_gov);
    update_option("i_upyun", $i_upyun);
    update_option("i_build_date", $i_build_date);
}
?>

<link rel="stylesheet" href="<?php echo i_static(); ?>/admin/options/i_frame.css">
<script src="<?php echo i_static(); ?>/admin/options/i_stat.js"></script>
<?php if(get_option("i_color")){echo "<style>.description-primary{color:".get_option("i_color").";}</style>";}; ?>
<div class="wrap">
    <h1>底部设置</h1>
    <form method="post" action="" novalidate="novalidate">
        <table class="form-table">
            <tbody>
                <tr>
                    <th scope="row"><label for="i_copyright">网站版权</label></th>
                    <td>
                        <input name="i_copyright" type="number" value="<?php echo get_option("i_copyright"); ?>" class="regular-text">
                        <p class="description">填写年份（数字）即可。</p>
                        <p class="description-primary">默认：Copyright © <?php echo date("Y"); ?> <?php bloginfo('name'); ?></p>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="i_icp">ICP备案号</label></th>
                    <td>
                        <input name="i_icp" type="text" value="<?php echo get_option("i_icp"); ?>" class="regular-text">
                        <p class="description">页脚显示ICP备案号，没有ICP备案号请留空。</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="i_icp_gov">公网安备号</label></th>
                    <td>
                        <input name="i_icp_gov" type="text" value="<?php echo get_option("i_icp_gov"); ?>" class="regular-text">
                        <p class="description">页脚显示公网安备号，没有公网安备号请留空。</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="i_upyun">又拍云联盟</label></th>
                    <td>
                        <label><input type="checkbox" name="i_upyun" value="1" <?=get_option("i_upyun") == '1' ? 'checked' : ''?>>开启</label>
                        <p class="description">开启后页脚显示又拍云联盟链接。</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="i_build_date">运行时间</label></th>
                    <td>
                        <input name="i_build_date" type="text" value="<?php echo get_option("i_build_date"); ?>" class="regular-text">
                        <p class="description">输入建站日期，如2022/04/27 17:30:00。开启后页脚显示运行时间。</p>
                    </td>
                </tr>
            </tbody>
        </table>
        <p class="submit">
            <input type="submit" name="i_opt"  class="button button-primary" value="保存更改">
        </p>
    </form>
</div>