<?php
/*echo '<pre>';
print_r($_SERVER['QUERY_STRING']);
echo '<pre>';*/
require_once  dirname(__DIR__).'/config/init.php';
require_once LIBS . '/functions.php';
require_once CONF . '/routes.php';

//without composer
require_once dirname(__DIR__) . '/rb.php';
//\R::setup();

///////////////////// ORM with Composer //////////////////||
//with composer -> we have errors.                        ||
//include ORM RedbeanPHP                                  ||
//require_once dirname(__DIR__).'\vendor\autoload.php';   ||
//\RedBeanPHP\R::setup(); //test connected or not         ||
//use \RedBeanPHP\R as R;                                 ||
//class_alias('\RedBeanPHP\R','\R');
//////////////////////////////////////////////////////////||


//DEBUG(\PM_Engine\Router::getRoutes());
new \PM_Engine\App();


?>