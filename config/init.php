<?php
    define("DEBUG",0);//0 - status production || 1 - Status Debug
    define("ROOT",dirname(__DIR__));
    define("WWW",ROOT . '/public');
    define("APP",ROOT . '/app');
    define("CORE",ROOT . '/vendor/pmcore/core');
    define("LIBS",ROOT . '/vendor/pmcore/core/libs');
    define("CACHE", ROOT . '/temp/cache');
    define("CONF",ROOT . '/config');
    define("LAYOUT", 'default');
    define("PATH",$app_path);

    //http://progmath.am/public/index.php
    $app_path = "http://{$_SERVER['HTTP_HOST']}{$_SERVER['PHP_SELF']}";
    //http://progmath.am/public/
    $app_path = preg_replace("#[^/]+$#",'',$app_path);
    //http://progmath.am
    $app_path = str_replace('/public/','',$app_path);

    define("ADMIN",PATH . '/admin');

    require_once ROOT . '/vendor/autoload.php';
?>