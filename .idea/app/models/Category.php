<?php
/**
 * Created by PhpStorm.
 * User: Progm
 * Date: 10/1/2018
 * Time: 12:24 AM
 */

namespace app\models;


use PM_Engine\App;

class Category extends AppModel
{
    //Get sub categories id
    public function getIds($id){   //$id - is a current category`s id
        $cats = App::$app->getProperty('cats');
        //debug($cats);

        $ids = null;
        foreach ($cats as $k=>$v){
            if ($v['parent_id'] == $id){
                $ids .= $k . ',';
                $ids .= $this->getIds($k);
            }
        }

        return $ids;

    }
}