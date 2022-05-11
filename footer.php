<div class="container-full footer">
    <div class="container">
        <div class="footer-top">
            <div class="footer-power">
                <span><?php if(get_option("i_copyright")) {echo get_option("i_copyright");} else{echo "{{ copyright }}";} ?>
                    <a href="<?php bloginfo('url') ?>"><?php bloginfo('name') ?></a>
                    <a href="https://beian.miit.gov.cn/"><?php if(get_option("i_icp")) {echo get_option("i_icp");} ?></a>
                </span>
            </div>
            <div class="author">
                <span class="iconfont icon-zhiwen"></span>
                <span >{{ power }} <a :href="url">{{ author }}</a></span>
            </div>
        </div>
        <div class="custom">
            <?php require('custom/user.html'); ?>
        </div>
        <div class="footer-bottom">
            <img src="<?php site_icon_url(); ?>" alt="">
            <p><?php if(get_option("i_statement")) {echo get_option("i_statement");} else{echo "{{ statement }}";} ?></p>
            <p class="fl">友情链接:</p>
            <?php
                $bookmarks = get_bookmarks( array(
                    'orderby' => 'name',
                    'order' => 'ASC',
                ));
                foreach ( $bookmarks as $bookmark ) { 
                    printf( '<li><a class="relatedlink" href="%s">%s</a></li>', $bookmark->link_url, $bookmark->link_name );
                }
            ?>
            <script>
                const friend_link_box = document.querySelector('.footer-bottom');
                const friend_link = document.querySelector('.footer-bottom .fl');
                const friend_link_a = friend_link_box.getElementsByTagName('li');
                if(friend_link_a.length < 1) {
                    friend_link.setAttribute('style','display:none;');
                }
            </script>
        </div>
    </div>
</div>
