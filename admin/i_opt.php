<?php
error_reporting(0);
if($_POST["i_opt"]){
    $attachment_id = media_handle_upload( 'logo', 0 ); //上传图片，返回的是 附件的ID
    $logo_url = wp_get_attachment_url($attachment_id); //获取 图片的地址
    if($logo_url){
        update_option("logo_img",$logo_url); //如果图片地址在在，就将图片的地址写入到数据库
    }
}
$logo_img = get_option("logo_img");
?>

<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/admin/style/i_frame.css">

<div class="ifalse">
    <!-- logo -->
    <div class="ifalse-logo">
        <div class="box">
            <div class="title">
                <span class="block"></span>
                <h1>iFalse主题<span></span></h1>
            </div>
            <div class="role">
                <div class="block"></div>
                <p>by 神秘布偶猫</p>
            </div>
        </div>
    </div>

    <!-- content -->
    <div class="ifalse-text">
        <div class="start"><a href="/wp-admin/admin.php?page=i_base">开始设置</a></div>
        <div>
            使用文档：<a href="https://bilicat.coding.net/share/km/c99056dd-1782-4a22-a462-fe9a3240bccb/K-2" target="_blank">传送门</a><br>
            主题官网：<a href="https://www.ifalse.cn" target="_blank">iFalse主题</a><br>
            项目地址：<a href="https://gitee.com/kannafay/ifalse" target="_blank">Gitee</a><span>/</span><a href="https://github.com/kannafay/ifalse" target="_blank">GitHub</a>
        </div>
    </div>
    
</div>


<script src="<?php echo get_template_directory_uri(); ?>/admin/style/i_frame.js"></script>