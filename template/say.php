<?php
/*Template Name: 动态说说*/
?>



<?php i_frame(); ?>

<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/static/fancybox/fancybox.css">

<?php get_header(); ?>
<section>
    <div class="say container-small">
        <div class="say-banner">
            <img src="<?php if(get_option("i_loading_pic")) {echo get_option("i_loading_pic");} else {echo i_loading_pic(); } ?>" 
                data-original="<?php if(get_option("i_say_img")) {echo get_option("i_say_img");} else {echo i_cover_pic(); } ?>" alt="">
        </div>
        <div class="say-author">
            <div class="say-author-box">
                <?php if(current_user_can('level_1')) { ?>
                    <div class="say-author-logo">
                        <?php echo get_user_avatar(); ?>
                    </div>
                    <div class="say-author-name">
                        <?php global $current_user, $display_name;
                            get_currentuserinfo();
                            echo $current_user -> display_name; 
                        ?>
                    </div>
                    <div class="say-author-des">
                        <?php 
                            global $current_user, $user_description;
                            get_currentuserinfo();
                            echo $current_user -> user_description;
                            if($current_user -> user_description == null) {
                                echo '这家伙很懒，什么都没写';
                            }
                        ?>
                    </div>
                <?php } else { ?>
                    <div class="say-author-logo">
                        <?php echo get_avatar(1); ?>
                    </div>
                    <div class="say-author-name"><?php echo get_the_author_meta('nickname', 1); ?></div>
                    <div class="say-author-des">
                        <?php 
                            if(get_the_author_meta('description',1)) {
                                echo get_the_author_meta('description',1); 
                            } else {
                                echo '这家伙很懒，什么都没写';
                            }
                        ?>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="say-content">
            <ul>
                <?php 
                    query_posts("post_type=shuoshuo&post_status=publish&paged=".$wp_query->query['paged']);
                    if (have_posts()) : 
                        while (have_posts()) : the_post(); 
                ?>
                    <li class="say-post-item">
                        <div class="say-post-box">
                            <div class="say-author-logo">
                                <a href="<?php home_url();echo '/author/';echo get_the_author_meta('user_login'); ?>"><?php echo get_avatar( get_the_author_ID() );?></a>
                            </div>
                            <div class="say-post-msg">
                                <div class="say-author-name"><?php the_author_posts_link(); ?><?php if( wp_get_current_user()->ID == get_the_author_ID() ){echo '<span>自己</span>';} ?></div>
                                <div class="say-post-time"><?php echo get_the_date(); ?> <?php the_time(); ?></div>
                            </div>
                        </div>
                        <div class="say-post-content-box">
                            <div class="say-post-content">
                                <?php the_content(); ?>
                            </div>
                        </div>
                    </li>
                <?php 
                        endwhile;
                    endif; 
                ?>
            </ul>
            <?php if(get_next_posts_link()) { ?>
                <div class="say-page-nav">
                    <div class="say-page-nav-bar">
                        <?php wp_pagenavi(); ?>
                    </div>
                </div>
            <?php } else { ?>
                <p class="haveNoMore-say"><span class="iconfont icon-tishi1"> 没有更多内容</span></p>
                <?php if(get_previous_posts_link()) { ?>
                    <div class="say-page-nav">
                        <div class="say-page-nav-bar">
                            <?php wp_pagenavi(); ?>
                        </div>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>
    </div>
    <?php get_footer(); ?>
</section>

<script src="<?php echo get_template_directory_uri(); ?>/static/fancybox/fancybox.umd.js"></script>

<?php i_frame_js(); ?>

