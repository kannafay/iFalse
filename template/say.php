<?php
/*Template Name: 说说*/
?>

<?php i_frame(); ?>

<body class="say-body">
    <?php get_header(); ?>
     
    <div class="say container-small">
        <div class="say-banner">
            <img src="<?php if(get_option("i_loading_pic")) {echo get_option("i_loading_pic");} else {echo i_loading_pic(); } ?>" 
                data-original="<?php if(get_option("i_say_img")) {echo get_option("i_say_img");} else {echo i_cover_pic(); } ?>" alt="">
        </div>
        <div class="say-author">
            <div class="say-author-box">
                <div class="say-author-logo">
                    <?php echo get_avatar(1, 400); ?>
                </div>
                <div class="say-author-name"><?php echo get_the_author_meta('nickname', 1); ?></div>
                <div class="say-author-des">
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
                                        <?php echo get_avatar( get_the_author_email(), '400' );?>
                                    </div>
                                    <div class="say-post-msg">
                                        <div class="say-author-name"><?php echo get_the_author_meta('nickname',$post->post_author); ?></div>
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
            <div class="say-page-nav">
                <div class="say-page-nav-bar">
                    <?php wp_pagenavi(); ?>
                </div>
            </div>
        </div>
    </div>
    <?php get_footer(); ?>

    <script>

    </script>
    <?php i_frame_js(); ?>
</body>
</html>