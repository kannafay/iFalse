<div class="sidebar">
    <div class="author-info-box">
        <div class="author-info">
            <div class="post-author-logo">
                <a href="<?php the_post();home_url();echo '/author/';echo get_the_author_meta('user_login');rewind_posts(); ?>"><?php the_post();echo get_avatar(get_the_author_ID());rewind_posts(); ?></a>
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
        <?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
        <?php dynamic_sidebar( 'sidebar-2' ); ?>
        <?php else: ?>
        <?php endif; ?>
    </ul>
</div>
<script></script>