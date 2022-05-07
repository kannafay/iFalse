<div class="sidebar">
    <div class="author-info-box">
        <div class="author-info">
            <div class="post-author-logo">
                <?php if (have_posts()) : the_post(); update_post_caches($posts); ?>
                    <?php echo get_avatar( get_the_author_email(), '300' );?>
                <?php endif; ?>
            </div>
            <div class="post-author-name"><?php echo get_the_author_meta('nickname',$post->post_author); ?></div>
            <div class="post-author-description"><?php echo get_the_author_meta('description',$post->post_author); ?></div>
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