<div class="home-2">
    <div class="home-2-mian">
        <ul>
            <?php $i=0; ?>
            <?php if(have_posts()) : ?>
            <?php while(have_posts()) : the_post(); ?>
                <li>
                    <div class="home-2-pic">
                        <?php if ( is_sticky() ) {echo '<span class="post-top">置顶</span>';} ?>
                        <a href="<?php the_permalink(); ?>">
                        <div class="mask-pic"><span class="iconfont icon-chakan"></span></div>
                            <?php if (has_post_thumbnail()) { ?>
                            <?php the_post_thumbnail(); ?>
                            <?php } else {?>
                                <img src="<?php if(get_option("i_loading_pic")) {echo get_option("i_loading_pic");} else{echo i_loading_pic(); } ?>"
                                data-src="<?php if(get_option("i_random_pic")) {echo get_option("i_random_pic");} else{echo i_cover_pic(); } ?>?<?php $i++; echo $i; ?>" />
                            <?php } ?>
                        </a>
                   </div>
                   <div class="home-2-detail">
                        <div class="home-2-detail-top-title"><h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2></div>
                        <div class="home-2-detail-top-abstract"><?php the_excerpt(); ?></div>
                        <div class="home-2-detail-bottom-cate"></span><?php echo the_category(' ') ?></div>
                        <div class="home-2-detail-bottom">
                            <div class="home-2-detail-bottom-msg">
                                <?php echo get_avatar( get_the_author_email(), '100' );?>
                                <div class="home-2-detail-time"><?php the_time('Y-m-d'); ?></div><span>/</span>
                                <div class="home-2-detail-views">浏览 <?php echo getPostViews(get_the_ID()) ?></div><span>/</span>
                                <div class="home-2-detail-comments">评论 <?php comments_popup_link('沙发','1','%') ?></div>
                            </div>
                        </div>
                   </div>
                </li>
            <?php endwhile; ?>
            <?php else: ?>
            <div class="page-result">
                <div class="page-result-detail">
                    <img src="<?php echo get_template_directory_uri(); ?>/static/img/404.png" alt="">
                    <p>这里什么也没有！</p>
                </div>
            </div>
            <?php endif; ?>
        </ul>
        <div class="page-nav-bar">
            <div class="page-nav">
                <?php wp_pagenavi(); ?>
            </div>
        </div>
    </div> 
    <div class="home-2-sidebar">
        <?php get_sidebar(); ?>
    </div>
    
</div>
