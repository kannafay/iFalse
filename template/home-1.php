<div class="main-part">
    <ul>
        <?php if(have_posts()) : ?>
        <?php while(have_posts()) : the_post(); ?>
            <li>
                <div class="home-pic">
                    <a href="<?php the_permalink(); ?>">
                        <div class="mask-pic"><span class="iconfont icon-chakan"></span></div>
                        <?php if (has_post_thumbnail()) { ?>
                        <?php the_post_thumbnail(); ?>
                        <?php } else {?>
                            <img src="<?php if(get_option("i_loading_pic")) {echo get_option("i_loading_pic");} else{echo i_loading_pic(); } ?>"
                            data-src="<?php if(get_option("i_random_pic")) {echo get_option("i_random_pic");} else{echo i_cover_pic(); } ?>?<?php echo $randNum = mt_rand(1,9999) ?>" />
                        <?php } ?>
                    </a>
                </div>
                <div class="home-detail">
                    <div class="home-cate"><?php echo the_category(' ') ?></div>
                    <div class="home-title"><?php if ( is_sticky() ) {echo '<span class="iconfont icon-zhiding3"></span>';} ?><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></div>
                    <div class="home-msg">
                        <?php echo get_avatar( get_the_author_email(), '100' );?>
                        <div class="home-watch">浏览 <?php echo getPostViews(get_the_ID()) ?></div><span>/</span>
                        <div class="home-date"><?php the_time('Y-m-d'); ?></div><span>/</span>
                        <div class="home-comments">评论 <?php comments_popup_link('沙发！','1','%') ?></div>
                    </div>
                </div>
            </li>
        <?php endwhile; ?>
        <?php endif; ?>
    </ul>
    <div class="page-nav-bar">
        <div class="page-nav">
            <?php wp_pagenavi(); ?>
        </div>
    </div>
</div>