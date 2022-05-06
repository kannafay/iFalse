<div class="banner"></div>
<div class="wrapper">
    <div class="content-wrapper">
        <div class="text-wrapper">
            <h2><?php if(get_option("i_wrapper_text")) {echo get_option("i_wrapper_text");} else{echo "{{ text }}";} ?></h2>
            <i>— <?php if(get_option("i_wrapper_name")) {echo get_option("i_wrapper_name");} else{echo "{{ name }}";} ?> —</i>
        </div>
    </div>
</div>
<div class="container main-content main">
    <div class="content">
        <?php
            if(get_option("i_notice")) {?>
                <div class="notice">
                    <span class="iconfont icon-xiaoxi"></span>
                    <p><?php echo get_option("i_notice"); ?></p>
                </div>
            <?php }
        ?>
        <div class="title-part">
            <p id="title-part">最新发布</p>
            <?php get_search_form(); ?>
        </div>
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
                                <span class="home-watch">浏览 <?php echo getPostViews(get_the_ID()) ?></span> / 
                                <span class="home-date">发布于 <?php the_time('Y-m-d'); ?></span> / 
                                <span class="home-comments">评论 <?php comments_popup_link('沙发！','1','%') ?></span>
                            </div>
                        </div>
                    </li>
                <?php endwhile; ?>
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



