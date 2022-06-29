<div class="sidebar">
    <div class="author-info-box">
        <div class="author-info">
            <div class="post-author-logo">
                <a href="<?php home_url();echo '/author/';echo get_the_author_meta('user_login',1); ?>"><?php echo get_avatar(1); ?></a>
            </div>
            <div class="post-author-name"><?php the_author_posts_link(); ?></div>
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