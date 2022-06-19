<?php if(comments_open()) { ?>
<div class="post-comments">
    <div class="post-comments-content">
    <?php comment_form() ?>
    <h2 class="post-comments-title">评论 (<?php if(post_password_required()){echo '已加密';}elseif(comments_open()){comments_popup_link('沙发','1','%');}else{echo '已关闭';} ?>)</h2>
    <?php wp_list_comments( array(
        'avatar_size' => '400',
        'type' => 'comment')); 
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