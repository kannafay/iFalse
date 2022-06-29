<div class="home-2">
    <div class="home-2-mian">
        <ul>
            <?php $i=0; ?>
            <?php if(have_posts()) : ?>
            <?php while(have_posts()) : the_post(); ?>
                <li>
                    <div class="home-2-pic">
                        <?php if (is_sticky()) {echo '<span class="post-top">置顶</span>';} ?>
                        <a href="<?php the_permalink(); ?>">
                        <div class="mask-pic"><span class="iconfont icon-chakan"></span></div>
                            <?php if (has_post_thumbnail()) { ?>
                            <?php the_post_thumbnail('large'); ?>
                            <?php } else {?>
                                <img src="<?php if(get_option("i_loading_pic")) {echo get_option("i_loading_pic");} else{echo i_loading_pic(); } ?>"
                                data-original="<?php if(get_option("i_random_pic")) {echo get_option("i_random_pic");} else{echo i_cover_pic(); } ?>?<?php $i++; echo $i; ?>" />
                            <?php } ?>
                        </a>
                   </div>
                   <div class="home-2-detail">
                        <div class="home-2-detail-top-title"><h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2></div>
                        <div class="home-2-detail-top-abstract"><?php the_excerpt(); ?></div>
                        <div class="home-2-detail-bottom">
                            <div class="home-2-detail-bottom-cate"></span><?php echo the_category(' ') ?></div>
                            <div class="home-2-detail-bottom-msg">
                                <a href="<?php home_url();echo '/author/';echo get_the_author_meta('user_login'); ?>"><?php echo get_avatar( get_the_author_ID() );?></a>
                                <div class="home-2-detail-time"><?php echo get_the_date(); ?></div>
                                <div class="home-2-detail-views"><?php echo getPostViews(get_the_ID()) ?></div>
                                <div class="home-2-detail-comments"><?php if(post_password_required()){echo '已加密';}elseif(comments_open()){comments_popup_link('沙发','1','%');}else{echo '已关闭';} ?></div>
                            </div>
                        </div>
                   </div>
                </li>
            <?php endwhile; ?>
            <?php endif; ?>
        </ul>
        <?php if(get_next_posts_link()) { ?>
            <div class="page-nav-bar">
                <div class="page-nav">
                    <?php wp_pagenavi(); ?>
                </div>
            </div>
        <?php } else { ?>
            <p class="haveNoMore"><span class="iconfont icon-tishi1"> 没有更多内容了</span></p>
            <?php if(get_previous_posts_link()) { ?>
                <div class="page-nav-bar">
                    <div class="page-nav">
                        <?php wp_pagenavi(); ?>
                    </div>
                </div>
            <?php } ?>
        <?php } ?>
    </div> 
    <div class="home-2-sidebar">
        <?php get_sidebar(); ?>
    </div>
</div>
