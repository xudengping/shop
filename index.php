<?php
   header("content-type:text/html;charset=utf-8");
 // 将生产模式变为开发模式
   define("APP_DEBUG", true);
   
   // 定义一些静态文件路径
    define("SITE_URL", "http://www.shop.test/");
    define("CSS_URL",SITE_URL."shop/public/Home/css/");
    define("IMG_URL",SITE_URL."shop/public/Home/img/");
    define("JS_URL",SITE_URL."shop/public/Home/js/");
    
    function show_bug($msg){
        echo "<pre style='color:red'>";
        var_dump($msg);
        echo "</pre>";
    }
   
   include "../ThinkPHP/ThinkPHP.php";

?>