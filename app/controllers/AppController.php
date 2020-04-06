<?php


namespace app\controllers;


use app\models\AppModel;
use app\widgets\currency\Currency;
use app\widgets\language\Language;
use PM_Engine\App;
use PM_Engine\base\Controller;
use PM_Engine\Cache;

class AppController extends Controller
{
    public  function  __construct($route)
    {
        parent::__construct($route);
        new AppModel();

        //setcookie('currency', 'EUR', time() + 3600*24*7, '/'); //
        //$curr = Currency::getCurrencies();
        //debug($curr);
        App::$app->setProperty('currencies',Currency::getCurrencies());
        //debug(App::$app->getProperties());

        App::$app->setProperty('currency', Currency::getCurrency(App::$app->getProperty('currencies')));

        //debug(App::$app->getProperties());
        App::$app->setProperty('languages',Language::getLanguages());


        App::$app->setProperty('language', Language::getLanguage(App::$app->getProperty('languages')));

        App::$app->setProperty('exams',self::cachCategory());
        //debug(App::$app->getProperties());
    }


    public static function cachCategory(){
        $cache = Cache::instance();
        $exams = $cache->get('exams');

        if (!$exams){
            $exams = \R::getAssoc("SELECT * FROM exam");
            $cache->set('exams', $exams); //cats - cahce key, $cats - cache data
        }
        return $exams;
    }
    public function getRequestID($get = true, $id = 'id'){
        if($get){
            $data = $_GET;
        }else{
            $data = $_POST;
        }
        $id = !empty($data[$id]) ? (int)$data[$id] : null;
        if(!$id){
            throw new \Exception('Page Not Found', 404);
        }
        return $id;
    }
}