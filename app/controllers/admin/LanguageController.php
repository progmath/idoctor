<?php
/**
 * Created by PhpStorm.
 * User: Saten
 * Date: 11/17/2018
 * Time: 9:59 AM
 */

namespace app\controllers\admin;


class LanguageController extends AppController
{
     public function indexAction(){
         if ($this->isAjax()){
             $language = $_GET['admin_language'];
             debug($language);
             $_SESSION['lang'] = $language;
             redirect();
         }

     }
}