<?php
/**
 * Created by PhpStorm.
 * User: Progm
 * Date: 7/13/2018
 * Time: 11:30 PM
 */

namespace PM_Engine;


trait TSingleton
{
    private static $instance;

    public static  function instance(){

        if (self::$instance === null){
            self::$instance = new self;
        }
        return self::$instance;
    }
}