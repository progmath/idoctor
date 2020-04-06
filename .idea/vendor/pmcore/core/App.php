<?php


namespace PM_Engine; //PM_Engine - pmcore


class App
{
    public static  $app; //project property || parameters container || acces to project properties
    public function __construct()
    {
        session_start();
        //echo 'Hello';
        $query = trim($_SERVER['QUERY_STRING'],'/');
        //var_dump($query);

        self::$app = Registry::instance();
        $this->getParams();
        new ErrorHandler();

        Router::dispatch($query);
    }

    protected function getParams(){
        $params = require_once CONF . '/params.php';
        if (!empty($params)){
            foreach ($params as $k => $v){
                self::$app->setProperty($k,$v);
            }
        }
    }
}