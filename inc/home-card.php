<div class="main-part">
    <ul>
        <?php $i=0; ?>
        <?php if(have_posts()) : ?>
        <?php while(have_posts()) : the_post(); ?>
            <li>
                <div class="home-pic">
                    <?php if ( is_sticky() ) {echo '<span class="post-top">置顶</span>';} ?>
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
                <div class="home-detail">
                    <div class="home-cate"><?php echo the_category(' ') ?></div>
                    <div class="home-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></div>
                    <div class="home-msg">
                        <?php echo get_avatar( get_the_author_email(), '100' );?>
                        <div class="home-date"><?php echo get_the_date(); ?></div>
                        <div class="home-watch"><?php echo getPostViews(get_the_ID()) ?></div>
                        <div class="home-comments"><?php if(comments_open()){comments_popup_link('沙发','1','%');}else{echo '已关闭';} ?></div>
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