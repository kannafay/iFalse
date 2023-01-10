<?php
    $path = '../static/img/login/'; //存有图片的文件夹imgs
    $handle = opendir($path);
    while (false !== ($file = readdir($handle))) {
        list($filesname,$typeOfPic)=explode(".",$file);
        if($typeOfPic=="png") {
            if (!is_dir('./'.$file)) {
                $array[]=$file;
            }
        }
    }
    $str = array_rand($array);
    header('Location:'.$path.$array[$str]);
?>