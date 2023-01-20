<?php
@$i_post_copyright = stripslashes($_POST["i_post_copyright"]);
@$i_post_copyright_text = stripslashes($_POST["i_post_copyright_text"]);
@$i_next_post = stripslashes($_POST["i_next_post"]);
@$i_comments_article = stripslashes($_POST["i_comments_article"]);
@$i_comments_page = stripslashes($_POST["i_comments_page"]);
@$i_comments_turn = stripslashes($_POST["i_comments_turn"]);
@$i_random_pic = stripslashes($_POST["i_random_pic"]);

if(@stripslashes($_POST["i_opt"])){
    update_option("i_post_copyright",$i_post_copyright);
    update_option("i_post_copyright_text",$i_post_copyright_text);
    update_option("i_next_post",$i_next_post);
    update_option("i_comments_article",$i_comments_article);
    update_option("i_comments_page",$i_comments_page);
    update_option("i_comments_turn",$i_comments_turn);
    update_option("i_random_pic",$i_random_pic);
}
?>

<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/admin/style/i_frame.css">
<?php if(get_option("i_color")){echo "<style>.description-primary{color:".get_option("i_color").";}</style>";}; ?>
<div class="wrap">
    <h1>文章设置</h1>
    <form method="post" action="" novalidate="novalidate">
        <table class="form-table">
            <tbody>
                <tr>
                    <th scope="row"><label for="i_random_pic">文章封面</label></th>
                    <td>
                        <input name="i_random_pic" type="text" value="<?php echo get_option("i_random_pic"); ?>" class="regular-text">
                        <p class="description">用于文章没有封面时顶替。</p>
                        <p class="description-primary">默认：主题海报</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="i_post_copyright">文章版权</label></th>
                    <td>
                        <input name="i_post_copyright" type="text" value="<?php echo get_option("i_post_copyright"); ?>" class="regular-text">
                        <p class="description">数字1为开启。提示用户文章版权信息。</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="i_post_copyright_text">文章版权内容</label></th>
                    <td>
                        <input name="i_post_copyright_text" type="text" value="<?php echo get_option("i_post_copyright_text"); ?>" class="regular-text">
                        <p class="description">文章版权文字信息。</p>
                        <p class="description-primary">默认：分享是一种美德，转载请保留原链接</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="i_next_post">文章上下篇</label></th>
                    <td>
                        <input name="i_next_post" type="text" value="<?php echo get_option("i_next_post"); ?>" class="regular-text">
                        <p class="description">数字1为开启。开启后文章页显示上一篇下一篇。</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="i_comments_article">文章评论</label></th>
                    <td>
                        <input name="i_comments_article" type="text" value="<?php echo get_option("i_comments_article"); ?>" class="regular-text">
                        <p class="description">数字1为开启。开启后文章页显示评论区。</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="i_comments_page">页面评论</label></th>
                    <td>
                        <input name="i_comments_page" type="text" value="<?php echo get_option("i_comments_page"); ?>" class="regular-text">
                        <p class="description">数字1为开启。开启后页面显示评论区。</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="i_comments_turn">登录后评论</label></th>
                    <td>
                        <input name="i_comments_turn" type="text" value="<?php echo get_option("i_comments_turn"); ?>" class="regular-text">
                        <p class="description">数字1为开启。开启后仅已登录用户可发表评论。</p>
                    </td>
                </tr>
            </tbody>
        </table>
        <p class="submit">
            <input type="submit" name="i_opt"  class="button button-primary" value="保存更改">
        </p>
    </form>
</div>