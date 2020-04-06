<?php


namespace app\controllers;


use app\models\User;

class UserController extends AppController
{
    public function signupAction(){
        if (!empty($_POST)){
            $user = new User();
            $data = $_POST;
            $user->load($data);
            debug($user);
            die;
        }
        $this->setMeta('Sign Up');
    }
    public function loginAction(){

    }

    public function logoutAction(){

    }

}