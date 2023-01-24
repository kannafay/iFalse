<div class="sidebar">
    <div class="author-info-box">
        <div class="author-info">
            <div class="post-author-logo">
                <a href="<?php home_url();echo '/author/';echo get_the_author_meta('user_login',1); ?>"><?php echo get_avatar(1); ?></a>
            </div>
            <div class="post-author-name"><a href="<?php home_url();echo '/author/';echo get_the_author_meta('user_login',1); ?>"><?php echo get_user_role(1)->display_name; ?></a></div>
            <div class="post-author-description">
                <?php 
                    if(get_the_author_meta('description',1)) {
                        echo get_the_author_meta('description',1); 
                    } else {
                        echo '这家伙很懒，什么都没写';
                    }
                ?>  
            </div>
            <div class="post-author-new">
            <?php query_posts('showposts=6&author=1');
                while (have_posts()) : the_post();?>
                <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                <?php endwhile; ?>
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