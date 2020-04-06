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
       // $brands = \R::find('brand','LIMIT 3');
        //debug($brands);

       // $hits = \R::find('product',"hit = '1' AND status = '1' LIMIT 8 ");

        $categories = \R::findAll('exam','parent_id = 0');
        $center_count = \R::count('center');
        $exam_count = \R::count('diagnose',"status='1'");
        $screening_count = \R::count('screening');
        $hits = \R::findAll('diagnose',"status = '1' AND hit = '1' ORDER BY time_hit DESC");
        $this->setMeta(App::$app->getProperty('shop_name'), 'Some description...', 'Some Keys....');


        $this->set(compact('categories','hits','screening_count','center_count','exam_count'));
    }

}//end class







