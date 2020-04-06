<?php
/**
 * Created by PhpStorm.
 * User: Progm
 * Date: 7/13/2018
 * Time: 11:26 PM
 */

namespace PM_Engine;


class Registry  //Createing SingleTon Pattern and Pattern Registry
{
    use TSingleton;

    protected static $properties = [];

    public  function setProperty($name,$value){
        self::$properties[$name] = $value;
    }

    public function getProperty($name){
        if (isset(self::$properties[$name])){
            return self::$properties[$name];
        }
        return null;
    }

    public function getProperties(){
        return self::$properties;
    }
}