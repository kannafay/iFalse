<?php

if($_POST['i_opt']){
    $attachment_id = media_handle_upload( 'logo', 0 ); //上传图片，返回的是 附件的ID
    $logo_url = wp_get_attachment_url($attachment_id); //获取 图片的地址
    if($logo_url){
        update_option("logo_img",$logo_url); //如果图片地址在在，就将图片的地址写入到数据库
    }
    update_option("i_avatar_v",$_POST["i_avatar_v"]);
    update_option("i_wrapper_text",$_POST["i_wrapper_text"]);
    update_option("i_wrapper_name",$_POST["i_wrapper_name"]);
    update_option("i_notice",$_POST["i_notice"]);
    update_option("i_random_pic",$_POST["i_random_pic"]);
    update_option("i_loading_pic",$_POST["i_loading_pic"]);
    update_option("i_hello",$_POST["i_hello"]);
    update_option("i_post_cover",$_POST["i_post_cover"]);
    update_option("i_copyright",$_POST["i_copyright"]);
    update_option("i_icp",$_POST["i_icp"]);
    update_option("i_statement",$_POST["i_statement"]);
    update_option("i_404_tip",$_POST["i_404_tip"]);
    update_option("i_404_bak",$_POST["i_404_bak"]);
    update_option("i_comments_article",$_POST["i_comments_article"]);
    update_option("i_comments_page",$_POST["i_comments_page"]);
    update_option("i_comments_turn",$_POST["i_comments_turn"]);
}
$logo_img = get_option("logo_img");
?>

<?php require('i_frame.php'); ?>

