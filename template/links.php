<?php
/*Template Name: 友情链接*/
?>

<?php i_frame(); ?>
 
<?php get_header(); ?>
<section>
    <div class="container single-main page-main page-link">
        <div class="left">
            <div class="post-content">
                <?php the_content(); ?>
                <?php wp_list_bookmarks('orderby=id&show_description=1&show_name=1'); ?>
            </div>
            <?php 
                if(get_option("i_comments_page") == 1) { ?>
                    <?php comments_template('/comments.php');?>
                <?php
                }
            ?>
        </div>
    </div>
    <?php get_footer(); ?>
</section>
<?php i_frame_js(); ?>