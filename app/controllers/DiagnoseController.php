<?php
/**
 * Created by PhpStorm.
 * User: Saten
 * Date: 19.01.2019
 * Time: 2:53 PM
 */

namespace app\controllers;


use app\models\Breadcrumbs;

class DiagnoseController extends AppController
{
    public function indexAction(){


        $alias = $this->route['alias'];
        $diagnose = \R::findOne('diagnose','alias = ?',[$alias]);
        if (!$diagnose){
            throw new \Exception("Page not Found",404);
        }

        //1.Breadcrumbs
        $breadcrumbs = Breadcrumbs::getBreadcrumbs($diagnose->exam_id, $diagnose->arm_title);
        $this->setMeta($diagnose->title, $diagnose->description, $diagnose->keywords);
        $this->set(compact('diagnose','breadcrumbs'));

    }
}