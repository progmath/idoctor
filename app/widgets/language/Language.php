<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 16.09.2018
 * Time: 10:03
 */

namespace app\widgets\language;


use PM_Engine\App;

class Language
{
    protected $tpl;        // template language block || <select><option></option></select>
    protected $languages; // all languages
    protected $language;   // active language


    public function __construct()
    {
        $this->tpl = __DIR__ . '/language_tpl/language.php';
        $this->run();
    }


    protected function run(){
        $this->languages = App::$app->getProperty('languages'); //
        $this->language   = App::$app->getProperty('language');   //
        echo $this->getHtml();
    }

    public static function getLanguages(){
        return \R::getAssoc("SELECT code, title, base 
                             FROM language ORDER BY base DESC" );
    }

    public static function getLanguage($languages){
        if (isset($_COOKIE['language']) && array_key_exists($_COOKIE['language'],$languages))
        {
            $key = $_COOKIE['language'];
        }
        else{
            $key = key($languages);
        }
        $language = $languages[$key];
        $language['code'] = $key;
        return $language;
    }

    ///////////////////////////////
    protected function getHtml(){
        ob_start();
        require_once $this->tpl;
        return ob_get_clean();
    }
}