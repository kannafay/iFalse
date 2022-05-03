<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/admin/i_frame.css">

<div class="i_opt">
    <h2>iFalse主题设置</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <ul>
            <!-- <li>
                <label for="">个人头像</label>
                <input type="file" name="logo">
                <img src="<?php echo $logo_img; ?>">
            </li> -->
            <li>
                <label for="">个人头像</label>
                <input type="text" name="i_avatar" value="<?php echo get_option("i_avatar"); ?>">
                <span>填写图片链接即可</span>
            </li>
            <li>
                <label for="">首页寄语</label>
                <input type="text" name="i_wrapper_text" value="<?php echo get_option("i_wrapper_text"); ?>">
                <span>默认：不管你是什么派，坚持你的坚持，热爱你的热爱</span>
            </li>
            <li>
                <label for="">寄语作者</label>
                <input type="text" name="i_wrapper_name" value="<?php echo get_option("i_wrapper_name"); ?>">
                <span>默认：神秘布偶猫</span>
            </li>
            <li>
                <label for="">公告栏</label>
                <input type="text" name="i_notice" value="<?php echo get_option("i_notice"); ?>">
                <span>用于首页发布公告</span>
            </li>
            <li>
                <label for="">随机图</label>
                <input type="text" name="i_random_pic" value="<?php echo get_option("i_random_pic"); ?>">
                <span>用于文章没有封面时代替。默认：主题封面图</span>
            </li>
            <li>
                <label for="">登录提示</label>
                <input type="text" name="i_hello" value="<?php echo get_option("i_hello"); ?>">
                <span>未登录提示。默认：Hi, 请登录!</span>
            </li>
            <li>
                <label for="">封面提示</label>
                <input type="text" name="i_post_cover_pic_tip" value="<?php echo get_option("i_post_cover_pic_tip"); ?>">
                <span>文章封面图提示，不想要请留空</span>
            </li>
            <li>
                <label for="">网站版权</label>
                <input type="text" name="i_copyright" value="<?php echo get_option("i_copyright"); ?>">
                <span>默认：Copyright © 2022</span>
            </li>
            <li>
                <label for="">内容版权</label>
                <input type="text" name="i_statement" value="<?php echo get_option("i_statement"); ?>">
                <span>页脚显示网站内容声明</span>
            </li>
            <li>
                <label for="">备案号</label>
                <input type="text" name="i_icp" value="<?php echo get_option("i_icp"); ?>">
                <span>页脚备案号，没有请留空</span>
            </li>
            <li>
                <label for="">404标语</label>
                <input type="text" name="i_404_tip" value="<?php echo get_option("i_404_tip"); ?>">
                <span>提示用户404错误信息，留空则使用默认</span>
            </li>
            <li>
                <label for="">404按钮</label>
                <input type="text" name="i_404_bak" value="<?php echo get_option("i_404_bak"); ?>">
                <span>按钮文字。默认：返回首页</span>
            </li>
        </ul>
        <div class="submit">
            <input type="submit" name="i_opt" value="保存">
        </div>        
    </form>
</div>
