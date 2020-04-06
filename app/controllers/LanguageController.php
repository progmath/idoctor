<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 16.09.2018
 * Time: 10:18
 */

namespace app\controllers;


class LanguageController extends AppController
{
    public function changeAction(){

        $language = !empty($_GET['lang']) ? $_GET['lang'] : null;
        if ($language){
            //$curr = \R::findOne('currency','code=?', [$currency]);
            $lang = \R::findOne('language','code=?',[$language]);
            if (!empty($lang)){
                setcookie('language', $language, time() + 3600*24*7,'/');
            }
        }
        redirect();
        exit();
    }
}