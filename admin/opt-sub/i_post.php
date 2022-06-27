<?php
error_reporting(0);
if($_POST["i_opt"]){
    
    // 文章设置
    update_option("i_post_copyright",$_POST["i_post_copyright"]);
    update_option("i_post_copyright_text",$_POST["i_post_copyright_text"]);
    update_option("i_next_post",$_POST["i_next_post"]);
    update_option("i_comments_article",$_POST["i_comments_article"]);
    update_option("i_comments_page",$_POST["i_comments_page"]);
    update_option("i_comments_turn",$_POST["i_comments_turn"]);
    
}
?>

<div class="wrap">
    <h1>文章设置</h1>
    <form method="post" action="" novalidate="novalidate">
        <table class="form-table">
            <tbody>
                <tr>
                    <th scope="row"><label for="i_post_copyright">文章版权</label></th>
                    <td>
                        <input name="i_post_copyright" type="text" value="<?php echo get_option("i_post_copyright"); ?>" class="regular-text">
                        <p class="description">数字1为开启。提示用户文章版权信息。默认：关闭</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="i_post_copyright_text">文章版权内容</label></th>
                    <td>
                        <input name="i_post_copyright_text" type="text" value="<?php echo get_option("i_post_copyright_text"); ?>" class="regular-text">
                        <p class="description">文章版权文字信息</p>
                        <p class="description">默认：分享是一种美德，转载请保留原链接</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="i_next_post">文章上下篇</label></th>
                    <td>
                        <input name="i_next_post" type="text" value="<?php echo get_option("i_next_post"); ?>" class="regular-text">
                        <p class="description">数字1为开启。文章页开启上一篇下一篇。默认：关闭</p>
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
            </tbody>
        </table>
        <p class="submit">
            <input type="submit" name="i_opt"  class="button button-primary" value="保存更改">
        </p>
    </form>
</div>