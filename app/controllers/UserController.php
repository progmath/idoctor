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
            //debug($user);
            if (!$user->validate($data) || !$user->checkUnique()){
                //echo 'NO';
                $user->getErrors();

                $_SESSION['form_data'] = $data;//save valid information in form fields
                //debug($user->errors);
                //redirect();
            }
            else{
                //echo 'OK';
                $user->attributes['password'] = password_hash($user->attributes['password'],PASSWORD_DEFAULT);
               if($user->save('user')) {
                   $_SESSION['success'] = 'User Registered';
                   //redirect();
               }
               else{
                   $_SESSION['error'] = 'Error';
               }

            }
            redirect();
            //die;//comment this row
        }
        $this->setMeta('Sign Up');
    }
    public function loginAction(){
        if(!empty($_POST)){
            $user = new User();
            if($user->login()){
                $_SESSION['success'] = 'You are Welcome';
            }else{
                $_SESSION['error'] = 'Wrong Login or Password';
            }
            redirect();
            //header('Location: http://'.$_SERVER['HTTP_HOST'].'/');
        }
        $this->setMeta('Login');
    }

    public function logoutAction(){
        if(isset($_SESSION['user'])) unset($_SESSION['user']);
        redirect(ADMIN .'/admin');
    }



}