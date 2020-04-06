<?php


namespace PM_Engine;


class Db
{
    use TSingleton;
    //DB::instance();  //Create a object from DB class

    protected  function __construct()
    {
        $db = require_once CONF . '/config_db.php';
        //class_alias('\RedBeanPHP\R','\R');
        \R::setup($db['dsn'],$db['user'],$db['pass']);
        if (!\R::testConnection()){
            throw new \Exception('no connection with DB ',500);
        }else{
            //echo 'connected to DataBase';
        }

        \R::freeze(true);
        if (DEBUG){
            \R::debug(true,1);
        }
    }

}