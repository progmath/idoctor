<?php
/**
 * Created by PhpStorm.
 * User: Progm
 * Date: 11/7/2018
 * Time: 2:42 PM
 */

namespace app\controllers\admin;


use PM_Engine\Cache;

class CacheController extends AppController
{
    public function indexAction(){
        $this->setMeta('Delete Cache');
    }

    public function deleteAction(){
        $key = isset($_GET['key']) ? $_GET['key'] : null;
        $cache = Cache::instance();
        switch($key){
            case 'category':
                $cache->delete('exams'); //from AppController
                $cache->delete('idoctor_menu'); //Menu.php
                $cache->delete('idoctor_mobile'); //public/menu/mobile.php //for mobile menu cache in home page
                $cache->delete('cat_mobile');//mobile menu cache in other pages except home page


                break;
            /*case 'filter':
                $cache->delete('filter_group'); //Filter.php
                $cache->delete('filter_attrs'); //Filter.php
                break;*/
        }
        $_SESSION['success'] = 'Selected cache deleted';
        redirect();
    }
}