<?php
/**
 * Created by PhpStorm.
 * User: progmath
 * Date: 17.09.2018
 * Time: 20:26
 */

namespace app\controllers;


use app\models\Product;

class RecentlyController extends AppController
{
    public function indexAction(){
        $p_model = new Product();

        $recently_all = $p_model->getAllRecentlyViewed();
        $recently_all = explode('.',$recently_all);
        //debug($recently_all);
        //$recentlyViewed = \R::find('product','id IN (' . \R::genSlots($recently_all) . ') , $recently_all);
        $recentlyViewed = \R::find('product','id IN (' . \R::genSlots($recently_all)
            . ') ', $recently_all);
        //debug($recentlyViewed);
        $this->set(compact('recentlyViewed'));
    }
}