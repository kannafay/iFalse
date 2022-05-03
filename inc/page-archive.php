<div class="banner"></div>
<div class="wrapper">
    <div class="content-wrapper">
        <div class="text-wrapper">
            <h2 class="h2-title"><?php single_cat_title(); ?></h2>
        </div>
    </div>
</div>
<div class="container main-content main">
    <div class="content">
        <div class="notice">
            <span class="iconfont icon-xiaoxi"></span>
            <p><?php if(get_option("i_notice")) {echo get_option("i_notice");} else{echo "{{ notice }}";} ?></p>
        </div>
        <div class="title-part">
            <p id="title-part"><?php single_cat_title(); ?> 分类下的文章</p>
            <?php get_search_form(); ?>
        </div>
        <div class="main-part">
            <ul>
                <?php if(have_posts()) : ?>
                <?php while(have_posts()) : the_post(); ?>
                    <li>
                        <div class="post-pic">
                            <a href="<?php the_permalink(); ?>">
                                <div class="mask-pic"><span class="iconfont icon-chakan"></span></div>
                                <?php if (has_post_thumbnail()) { ?>
                                <?php the_post_thumbnail(); ?>
                                <?php } else {?>
                                    <img src="<?php if(get_option("i_random_pic")) {echo get_option("i_random_pic");} else{echo i_cover_pic(); } ?>?<?php echo $randNum = mt_rand(1,999999999) ?>" />
                                <?php } ?>
                            </a>
                        </div>
                        <div class="post-detail">
                            <div class="post-cate"><?php echo the_category(' ') ?></div>
                            <div class="post-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></div>
                            <div class="post-msg">
                                <span class="post-watch">浏览 <?php echo getPostViews(get_the_ID()) ?></span> /
                                <span class="post-date">发布于 <?php the_time('Y-m-d'); ?></span>
                            </div>
                        </div>
                    </li>
                <?php endwhile; ?>
                <?php else: ?>
                <div class="page-result">
                    <div class="page-result-detail">
                        <img src="<?php echo get_template_directory_uri(); ?>/static/img/404.gif" alt="404">
                        <p>这里什么也没有！</p>
                    </div>
                </div>
                <?php endif; ?>
            </ul>
        </div>
    </div>
    <div class="page-nav-bar">
        <div class="page-nav">
            <?php wp_pagenavi(); ?>
        </div>
    </div>
</div>

<div class="progress-wrap">
	<svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
		<path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"/>
	</svg>
</div>