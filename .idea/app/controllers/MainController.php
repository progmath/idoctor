<?php


namespace app\controllers;

//use PM_Engine\base\Controller;

use PM_Engine\App;
use PM_Engine\Cache;

class MainController extends AppController  //class MainController extends Controller
{

    public function indexAction(){
        //$this->layout = 'Test'; ///similar

        //$brands = \R::findAll('brand'); //(SELECT * FROM brand)
        $brands = \R::find('brand','LIMIT 3');
        //debug($brands);

        $hits = \R::find('product',"hit = '1' AND status = '1' LIMIT 8 ");


        $this->setMeta(App::$app->getProperty('shop_name'), 'Some description...', 'Some Keys....');

        //$this->set(compact('brands'));
        $this->set(compact('brands', 'hits'));
    }

}//end class







