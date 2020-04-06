<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 12.11.2018
 * Time: 10:03
 */

namespace app\models\admin;


class User extends \app\models\User
{
    public $attributes = [
        'id' => '',
        'password' => '',
        'firstname' => '',
        'lastname' => '',
        'email' => '',
        'role'=>'admin',
    ];

    public $rules = [
        'required' => [
            ['firstname'],
            ['lastname'],
            ['email'],
        ],
        'email' => [
            ['email'],
        ],
    ];

    public function checkUnique(){
        $user = \R::findOne('user', 'email = ? AND id <> ?', [$this->attributes['email'], $this->attributes['id']]);
        if($user){
           /* if($user->login == $this->attributes['login']){
                $this->errors['unique'][] = 'This login is already exist';
            }*/
            if($user->email == $this->attributes['email']){
                $this->errors['unique'][] = 'This email already exists';
            }
            return false;
        }
        return true;
    }

}