<?php
error_reporting(0);
if($_POST["i_opt"]){
    
    // 底部设置
    update_option("i_copyright",$_POST["i_copyright"]);
    update_option("i_icp",$_POST["i_icp"]);
    update_option("i_upyun",$_POST["i_upyun"]);
    update_option("i_build_date",$_POST["i_build_date"]);
    
}
?>

<div class="wrap">
    <h1>底部设置</h1>
    <form method="post" action="" novalidate="novalidate">
        <table class="form-table">
            <tbody>
                <tr>
                    <th scope="row"><label for="i_copyright">网站版权</label></th>
                    <td>
                        <input name="i_copyright" type="text" value="<?php echo get_option("i_copyright"); ?>" class="regular-text">
                        <p class="description">默认：Copyright © 2022</p>
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
                    <th scope="row"><label for="i_upyun">又拍云联盟</label></th>
                    <td>
                        <input name="i_upyun" type="text" value="<?php echo get_option("i_upyun"); ?>" class="regular-text">
                        <p class="description">数字1为开启。页脚启用又拍云联盟链接。默认：关闭</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="i_build_date">运行时间</label></th>
                    <td>
                        <input name="i_build_date" type="text" value="<?php echo get_option("i_build_date"); ?>" class="regular-text">
                        <p class="description">输入建站日期，如2022/04/27 0:00:00。页脚显示运行时间。</p>
                        <p class="description">留空则不显示。默认：不显示</p>
                    </td>
                </tr>
            </tbody>
        </table>
        <p class="submit">
            <input type="submit" name="i_opt"  class="button button-primary" value="保存更改">
        </p>
    </form>
</div>