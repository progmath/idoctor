<?php


namespace app\models;


use PM_Engine\Db;

class User extends AppModel
{
    public $attributes = [
        'email'   => '',
        'password' => '',
        'firstname'    => '',
        'lastname'    => '',
        'role'    => 'admin',
    ];
    public $rules = [
        'required' => [
            ['email'],
            ['firstname'],
            ['lastname'],
        ],
        'email'=>[
            ['email'],
        ],
        'lengthMin'=>[
            ['password', 6],
        ]

    ];

    public function checkUnique(){

        $user = \R::findOne('user', 'email = ? ',[$this->attributes['email']]);
        if ($user){
            if($user->email == $this->attributes['email']){
                $this->errors['unique'][] = 'Admin already exists with this EMAIL';
            }
            /*if($user->email == $this->attributes['email']){
                $this->errors['unique'][] = 'user already exist with this EMAIL';
            }*/
            return false;
        }
        return true;
    }

    public function login($isAdmin = false){
        $login = !empty(trim($_POST['login'])) ? trim($_POST['login']) : null;
        $password = !empty(trim($_POST['password'])) ? trim($_POST['password']) : null;
        if($login && $password){
            if($isAdmin){
                $user = \R::findOne('user', "email = ? AND role = 'admin'", [$login]);
            }else{
                $user = \R::findOne('user', "email = ?", [$login]);
            }
            if($user){
                if(password_verify($password, $user->password)){
                    foreach($user as $k => $v){
                        if($k != 'password') $_SESSION['user'][$k] = $v;
                    }
                    return true;
                }
            }
        }
        return false;
    }


    public static function checkAuth(){
        return isset($_SESSION['user']);
    }

    public static function isAdmin(){
        return (isset($_SESSION['user']) && $_SESSION['user']['role'] == 'admin');
    }

}