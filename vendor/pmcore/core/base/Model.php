<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 23.08.2018
 * Time: 14:18
 */

namespace PM_Engine\base;


use PM_Engine\Db;
use Valitron\Validator;

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


    //save form information in DB_table(user)
    public function save($table,$valid = true){
     
        if($valid){
            $tbl = \R::dispense($table);
        }else{
            $tbl = \R::xdispense($table);

        }
        foreach ($this->attributes as $name=>$value){
            $tbl->$name = $value;
        }
        return \R::store($tbl); //return 0 or ID inserted records
    }

    public function update($table, $id){
        $bean = \R::load($table, $id);
        foreach($this->attributes as $name => $value){
            $bean->$name = $value;
        }
        return \R::store($bean); //return 0 or ID updated records
    }

    public function validate($data){

        Validator::langDir(WWW . '/validator/lang');
        Validator::lang('ru');

        $v = new Validator($data);

        $v->rules($this->rules);
        if ($v->validate()){
            return true;
        }

        $this->errors = $v->errors();
        return false;
    }

    public function getErrors(){
        $errors = '<ul>';
           foreach ($this->errors as $error){
               foreach ($error as $item){
                   $errors .= "<li>$item</li>";
               }
           }
        $errors .= '</ul>';
        $_SESSION['error'] = $errors;
    }
}