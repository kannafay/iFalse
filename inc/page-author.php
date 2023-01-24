<div class="wrapper">
    <div class="banner"></div>
    <div class="content-wrapper">
        <div class="text-wrapper">
            <h2 class="h2-title"><?php the_author_nickname(); ?></h2>
            <?php 
                if(get_the_author_description()) {
                   echo '<i>'.get_the_author_description().'</i>';
                } else {
                    echo '<i>这家伙很懒，什么都没写</i>';
                }
            ?>
        </div>
    </div>
</div>
<div class="container main-content main">
    <div class="content">
        <?php
            if(get_option("i_notice")) {?>
                <div class="notice">
                    <div class="notice-box">
                        <span></span>
                        <p><?php echo get_option("i_notice"); ?></p>
                    </div>
                </div>
            <?php }
        ?>
        <div class="title-part">
            <p class="name"><span><?php the_author_nickname(); ?></span>发布的内容</p>
            <?php get_search_form(); ?>
        </div>
        <?php 
            if(get_option("i_blog_to_column") == 1) {
                get_template_part('inc/home-blog');
            } else{
                if(get_option("i_blog_auto_column") == 1) {
                    get_template_part('inc/home-card');
                    get_template_part('inc/home-blog');
                ?> 
                <style>
                    .home-2{
                        display: none;
                    }
                    @media screen and (max-width: 640px) {
                        .home-2 {
                            display: block;
                        }
                        .main-part {
                            display: none;
                        }
                    }
                </style>
                <?php 
                } else {
                    get_template_part('inc/home-card');
                }  
            } 
        ?>
    </div>
</div>
