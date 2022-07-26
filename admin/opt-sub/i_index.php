<?php
error_reporting(0);
if($_POST["i_opt"]){
    
    // 首页设置
    update_option("i_swiper",$_POST["i_swiper"]);
    update_option("i_swiper_effect",$_POST["i_swiper_effect"]);
    update_option("i_wrapper_text",$_POST["i_wrapper_text"]);
    update_option("i_wrapper_name",$_POST["i_wrapper_name"]);
    update_option("i_notice",$_POST["i_notice"]);
    update_option("i_random_pic",$_POST["i_random_pic"]);
    
}
?>

<div class="wrap">
    <h1>首页设置</h1>
    <form method="post" action="" novalidate="novalidate">
        <table class="form-table">
            <tbody>
                <tr>
                    <th scope="row"><label for="i_swiper">轮播图</label></th>
                    <td>
                        <input name="i_swiper" type="text" value="<?php echo get_option("i_swiper"); ?>" class="regular-text">
                        <p class="description">填写文章编号，以英文逗号隔开，如1,2,3。默认：无</p>
                        <p class="description">包含置顶文章时将会提前。</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="i_swiper_effect">轮播图切换效果</label></th>
                    <td>
                        <input name="i_swiper_effect" type="text" value="<?php echo get_option("i_swiper_effect"); ?>" class="regular-text">
                        <p class="description">请填入对应的英文字符，不填即默认</p>
                        <p class="description">slide：普通位移切换（默认）</p>
                        <p class="description">fade：淡入</p>
                        <p class="description">cube：方块</p>
                        <p class="description">cards：卡片式</p>
                        <p class="description">coverflow：3D流</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="i_wrapper_text">首页标语</label></th>
                    <td>
                        <input name="i_wrapper_text" type="text" value="<?php echo get_option("i_wrapper_text"); ?>" class="regular-text">
                        <p class="description">轮播图无内容时显示。默认：一言</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="i_wrapper_name">标语作者</label></th>
                    <td>
                        <input name="i_wrapper_name" type="text" value="<?php echo get_option("i_wrapper_name"); ?>" class="regular-text">
                        <p class="description">轮播图无内容时显示。默认：一言作者</p>
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
                    <th scope="row"><label for="i_random_pic">文章封面</label></th>
                    <td>
                        <input name="i_random_pic" type="text" value="<?php echo get_option("i_random_pic"); ?>" class="regular-text">
                        <p class="description">用于文章没有封面时代替。默认：主题海报</p>
                    </td>
                </tr>
            </tbody>
        </table>
        <p class="submit">
            <input type="submit" name="i_opt"  class="button button-primary" value="保存更改">
        </p>
    </form>
</div>