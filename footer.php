<div class="container-full footer">
    <div class="container footer-box">

        <?php //版权 ?>
        <div class="copyright">
            <?php 
                if(get_option("i_copyright")) {
                    if(get_option("i_copyright") < date("Y")){
                        echo "Copyright © ".get_option("i_copyright")."-".date("Y");
                    } else { 
                        echo "Copyright © ".date("Y");
                    } 
                } else {
                    echo "Copyright © ".date("Y");
                }
            ?>
            <a href="<?php bloginfo('url') ?>"><?php bloginfo('name') ?></a>
        </div>

        <?php //icp备案 ?>
        <?php if(get_option("i_icp")){?>
            <div class="icp">
                <a href="https://beian.miit.gov.cn/"><?php echo get_option("i_icp"); ?></a>
            </div>
        <?php } ?>

        <?php //公网安备 ?>
        <?php if(get_option("i_icp_gov")) { 
            $patterns = "/\d+/";
            $strs = get_option("i_icp_gov");
            preg_match_all($patterns,$strs,$arr);
            $icp_url = implode($arr[0]);
        ?>
            <div class="icp_gov">
                <img src="<?php echo get_template_directory_uri(); ?>/static/img/beian.png" alt="">
                <a href="https://www.beian.gov.cn/portal/registerSystemInfo?recordcode=<?php echo $icp_url; ?>"><?php echo get_option("i_icp_gov"); ?></a>
            </div>
        <?php } ?>
        
        <?php //又拍云联盟 ?>
        <?php if(get_option("i_upyun") == 1) { ?>
            <div class="upyun">
                本网站由<a href="https://www.upyun.com/?utm_source=lianmeng&utm_medium=referral"><img src="<?php echo get_template_directory_uri(); ?>/static/img/upyun.png"></a>提供CDN加速/云存储服务
            </div>
        <?php } ?>

        <?php //网站运行时间 ?>
        <?php if(get_option("i_build_date")) { ?>
        <?php $runtime = json_encode(get_option("i_build_date")); ?>
        <div id="runtime_box"></div>
        <script type="text/javascript">
            function show_runtime(){window.setTimeout("show_runtime()",1000);
            X=new Date(<?php echo $runtime; ?>);
            Y=new Date();T=(Y.getTime()-X.getTime());M=24*60*60*1000;
            a=T/M;A=Math.floor(a);b=(a-A)*24;B=Math.floor(b);c=(b-B)*60;C=Math.floor((b-B)*60);D=Math.floor((c-C)*60);
            runtime_box.innerHTML="本站已运行: "+A+"天"+B+"小时"+C+"分"+D+"秒"}show_runtime();
        </script>
        <?php } ?>
        
        <?php //自定义 ?>
        <div class="custom">
            <?php //require('user/user.php'); ?>
            <?php if(get_option("i_custom_html_footer")){echo get_option("i_custom_html_footer");}; ?>
        </div>

        <?php //开发者 ?>
        <div class="author">
            <span class="iconfont icon-zhiwen"></span>
            <div>Powered by <a href="https://wordpress.org/">WordPress</a> Theme by <a href="https://github.com/kannafay/iFalse">iFalse</a></div>
        </div>
    </div>
</div>
