<?php  
    if(get_option("i_icp_gov")) {
        $patterns = "/\d+/";
        $strs = get_option("i_icp_gov");
        preg_match_all($patterns,$strs,$arr);
        $icp_url = implode($arr[0]);
    }
?>

<div class="container-full footer">
    <div class="container footer-box">
        <div class="copyright">
            <?php if(get_option("i_copyright")) {echo get_option("i_copyright");} else{echo "Copyright © " . date("Y");} ?>
            <a href="<?php bloginfo('url') ?>"><?php bloginfo('name') ?></a>
        </div>
        <div class="icp">
            <a href="https://beian.miit.gov.cn/"><?php if(get_option("i_icp")) {echo get_option("i_icp");} ?></a>
        </div>
        <div class="icp_gov">
            <?php if(get_option("i_icp_gov")) { ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/static/img/beian.png" alt="">
                    <a href="https://www.beian.gov.cn/portal/registerSystemInfo?recordcode=<?php echo $icp_url; ?>"><?php echo get_option("i_icp_gov"); ?></a>
            <?php } ?>
        </div>
        <?php if(get_option("i_upyun") == 1) { ?>
            <div class="upyun">
                本网站由<a href="https://www.upyun.com/?utm_source=lianmeng&utm_medium=referral"><img src="<?php echo get_template_directory_uri(); ?>/static/img/upyun.png"></a>提供CDN加速/云存储服务
            </div>
        <?php } ?>
        <?php if(get_option("i_build_date")) { ?>
            <span id="runtime_span"></span>
            <?php $runtime = json_encode(get_option("i_build_date")); 
            echo <<< EOF
                <script type="text/javascript">
                    function show_runtime(){window.setTimeout("show_runtime()",1000);
                    X=new Date($runtime);
                    Y=new Date();T=(Y.getTime()-X.getTime());M=24*60*60*1000;
                    a=T/M;A=Math.floor(a);b=(a-A)*24;B=Math.floor(b);c=(b-B)*60;C=Math.floor((b-B)*60);D=Math.floor((c-C)*60);
                    runtime_span.innerHTML="本站已运行: "+A+"天"+B+"小时"+C+"分"+D+"秒"}show_runtime();
                </script>
            EOF;
            ?>
        <?php } ?>
        <div class="custom">
            <?php require('user/user.php'); ?>
        </div>
        <div class="author">
            <span class="iconfont icon-zhiwen"></span>
            <div>Powered by <a href="https://wordpress.org/">WordPress</a> Theme by <a href="https://ifalse.onll.cn">iFalse</a></div>
        </div>
    </div>
</div>
