<?php
// 评论博主高亮
function filter_get_comment_author( $author, $comment_comment_id, $comment ) {
    error_reporting(0);
      $blogusers = get_user_by('id', 1);
      foreach ( $blogusers as $user ){
          if( $author == $user->display_name ){
              $webMaster = '<span class="master">'.$author.'</span><i>博主</i>';
              return $webMaster;
          }
      }
    return $author;
}
add_filter( 'get_comment_author', 'filter_get_comment_author', 10, 4);
?>

<?php if(comments_open()) { ?>

<div class="post-comments">
    <div class="post-comments-content">
    <?php comment_form() ?>
    <h2 class="post-comments-title"><?php if(post_password_required()){echo '已加密';}elseif(comments_open()){comments_popup_link('沙发','1','%');}else{echo '已关闭';} ?>条评论</h2>
    <?php wp_list_comments( array(
        'avatar_size' => '400',
        'type' => 'comment'
    )); 
    ?>  
    <?php
        if (get_option('page_comments')) {
            $comment_pages = paginate_comments_links('echo=0');
            if ($comment_pages) {?>
                <div id="post-comments-nav">
                    <?php echo $comment_pages; ?>
                </div>
                <?php
            }
        }
    ?>
    </div>
</div> 

<?php 
    if(get_option("i_comments_article") == 1) {
        if(get_option("i_comments_turn" ) == 1) {
            if(is_user_logged_in() == false) {?>
                <div class="is-logined">
                    <div class="is-logined-box"> 
                        发现您未登录，请先<a href="<?php echo wp_login_url(); ?>">登录</a>后再发表评论！
                    </div>
                </div>
                <script>
                    const respond_box = document.querySelector('.post-comments-content #respond');
                    const comments_content_box = document.querySelector('.post-comments-content');
                    comments_content_box.removeChild(respond_box);
                    comments_content_box.insertBefore(document.querySelector('.is-logined'),comments_content_box.childNodes[0]);
                </script>
            <?php }
            }
        }
    } 
?>

<script src="<?php echo get_template_directory_uri(); ?>/js/comments.js"></script>
<script>
    // 回复时文本域聚焦
    const replyText = document.querySelector('.post-comments .comment-respond textarea');
    $(document).ready(function() {
        if (/replytocom=\d+/.exec(window.location.href)) {
            $(replyText).focus();
        }
    })
</script>

<?php if(get_option("i_plane") != 1) { ?>
    <script>
        const respond_area = $(`.post-comments .comment-respond textarea,
            .post-comments .comment-respond .comment-form-author input, 
            .post-comments .comment-respond .comment-form-email input, 
            .post-comments .comment-respond .comment-form-url input`
        );
        respond_area.focus(function() {
            $(this).css('box-shadow','var(--input)');
        });
        respond_area.blur(function() {
            $(this).css('box-shadow','none');
        });
    </script>
<?php } ?>