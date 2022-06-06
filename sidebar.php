<div class="sidebar">
    <div class="author-info-box">
        <div class="author-info">
            <div class="post-author-logo">
                <?php echo get_avatar(1, 300); ?>
            </div>
            <div class="post-author-name"><?php echo get_the_author_meta('nickname', 1); ?></div>
            <div class="post-author-description">
                <?php 
                    if(get_the_author_meta('description',$post->post_author)) {
                        echo get_the_author_meta('description',$post->post_author); 
                    } else {
                        echo '这家伙很懒，什么都没写';
                    }
                ?>    
            </div>
        </div>
    </div>
    <!-- sidebar -->
    <ul id="primary-sidebar">
        <?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
        <?php dynamic_sidebar( 'sidebar-1' ); ?>
        <?php else: ?>
        <?php endif; ?>
    </ul>
</div>