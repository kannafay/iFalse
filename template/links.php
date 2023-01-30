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
            <script>
            const web_master_links = [];
            for(let i=0; i<comment_vcard.length; i++) {
                web_master_links[i] = comment_vcard[i].querySelector('i').innerText + comment_vcard[i].querySelector('.fn > i').innerText;
                if(web_master_links[i] == "博主作者") {
                    comment_vcard[i].querySelector('.fn > i').style.display = 'none';
                };
            };
            </script>
        </div>
    </div>
    <?php get_footer(); ?>
</section>
<?php i_frame_js(); ?>