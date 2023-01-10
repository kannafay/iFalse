<?php
    $path = '../static/img/login/'; //存有图片的文件夹imgs
    $handle = opendir($path);
    while (false !== ($file = readdir($handle))) {
        list($filesname,$typeOfImg)=explode(".",$file);
        if(
            $typeOfImg=="jpg" or
            $typeOfImg=="jpeg" or
            $typeOfImg=="png" or
            $typeOfImg=="gif" or
            $typeOfImg=="JPG" or
            $typeOfImg=="JPEG" or
            $typeOfImg=="PNG" or
            $typeOfImg=="GIF"
        ) {
            if (!is_dir('./'.$file)) {
                $array[]=$file;
            }
        }
    }
    $str = array_rand($array);
    header('Location:'.$path.$array[$str]);
?>