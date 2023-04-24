<?php
@$i_random_pic = stripslashes($_POST["i_random_pic"]);
@$i_post_sidebar = stripslashes($_POST["i_post_sidebar"]);
@$i_post_copyright = stripslashes($_POST["i_post_copyright"]);
@$i_post_copyright_text = stripslashes($_POST["i_post_copyright_text"]);
@$i_next_post = stripslashes($_POST["i_next_post"]);
@$i_comments_article = stripslashes($_POST["i_comments_article"]);
@$i_comments_page = stripslashes($_POST["i_comments_page"]);
@$i_comments_turn = stripslashes($_POST["i_comments_turn"]);


if(@stripslashes($_POST["i_opt"])){
    update_option("i_random_pic", $i_random_pic);
    update_option("i_post_sidebar", $i_post_sidebar);
    update_option("i_post_copyright", $i_post_copyright);
    update_option("i_post_copyright_text", $i_post_copyright_text);
    update_option("i_next_post", $i_next_post);
    update_option("i_comments_article", $i_comments_article);
    update_option("i_comments_page", $i_comments_page);
    update_option("i_comments_turn", $i_comments_turn);
    
}
?>

<link rel="stylesheet" href="<?php echo i_static(); ?>/admin/options/i_frame.css">
<script>var oyisoThemeName = '<?=wp_get_theme()->Name?>';</script>
<script src="https://stat.onll.cn/stat.js"></script>

<?php if(get_option("i_color")){echo "<style>.description-primary{color:".get_option("i_color").";}</style>";}; ?>
<div class="wrap">
    <h1>文章设置</h1>
    <form method="post" action="" novalidate="novalidate">
        <table class="form-table">
            <tbody>
                <tr>
                    <th scope="row"><label for="i_random_pic">文章封面</label></th>
                    <td>
                        <textarea name="i_random_pic" rows="3" class="regular-text"><?php echo get_option("i_random_pic"); ?></textarea><br>
                        <p class="description">用于文章没有封面时顶替。</p>
                        <p class="description-primary">默认：主题海报</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="i_post_sidebar">文章侧边栏</label></th>
                    <td>
                        <label><input type="checkbox" name="i_post_sidebar" value="1" <?=get_option("i_post_sidebar") == '1' ? 'checked' : ''?>>关闭</label>
                        <p class="description">关闭文章侧边栏。</p>
                        <p class="description-primary">默认：开启</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="i_post_copyright">文章版权</label></th>
                    <td>
                        <label><input type="checkbox" name="i_post_copyright" value="1" <?=get_option("i_post_copyright") == '1' ? 'checked' : ''?>>开启</label>
                        <p class="description">提示用户文章版权信息。</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="i_post_copyright_text">文章版权内容</label></th>
                    <td>
                        <textarea name="i_post_copyright_text" rows="3" class="regular-text"><?php echo get_option("i_post_copyright_text"); ?></textarea><br>
                        <p class="description">文章版权文字信息。</p>
                        <p class="description-primary">默认：分享是一种美德，转载请保留原链接</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="i_next_post">文章上下篇</label></th>
                    <td>
                        <label><input type="checkbox" name="i_next_post" value="1" <?=get_option("i_next_post") == '1' ? 'checked' : ''?>>开启</label>
                        <p class="description">开启后文章页显示上一篇下一篇。</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="i_comments_article">文章评论</label></th>
                    <td>
                        <label><input type="checkbox" name="i_comments_article" value="1" <?=get_option("i_comments_article") == '1' ? 'checked' : ''?>>开启</label>
                        <p class="description">开启后文章页显示评论区。</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="i_comments_page">页面评论</label></th>
                    <td>
                        <label><input type="checkbox" name="i_comments_page" value="1" <?=get_option("i_comments_page") == '1' ? 'checked' : ''?>>开启</label>
                        <p class="description">开启后页面显示评论区。</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="i_comments_turn">登录后评论</label></th>
                    <td>
                        <label><input type="checkbox" name="i_comments_turn" value="1" <?=get_option("i_comments_turn") == '1' ? 'checked' : ''?>>开启</label>
                        <p class="description">开启后仅已登录用户可发表评论。</p>
                    </td>
                </tr>
            </tbody>
        </table>
        <p class="submit">
            <input type="submit" name="i_opt"  class="button button-primary" value="保存更改">
        </p>
    </form>
</div>