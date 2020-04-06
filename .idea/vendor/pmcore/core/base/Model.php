<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 23.08.2018
 * Time: 14:18
 */

namespace PM_Engine\base;


use PM_Engine\Db;

abstract class Model
{
    public $attributes = [];
    public $errors     = [];
    public $rules      = []; //For validate the dates

    public function __construct(){
        Db::instance();
    }

    public function load($data){
        foreach ($this->attributes as $name=>$value){
            if (isset($data[$name])){
                $this->attributes[$name] = $data[$name];
            }
        }
    }
}