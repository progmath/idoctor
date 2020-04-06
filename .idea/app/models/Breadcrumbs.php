<?php
/**
 * Created by PhpStorm.
 * User: Progm
 * Date: 9/17/2018
 * Time: 4:35 PM
 */

namespace app\models;


use PM_Engine\App;

class Breadcrumbs
{
    public static function getBreadcrumbs($category_id,$name=''){
        $cats = App::$app->getProperty('cats');
        $breadcrumbs_array = self::getParts($cats, $category_id);
        //debug($breadcrumbs_array); //open after return $breadcrumbs

        $breadcrumbs = "<li><a href='" . PATH . "'>Home</a></li>";
        if ($breadcrumbs_array){
            foreach ($breadcrumbs_array as $alias=>$title){
                $breadcrumbs .= "<li><a href='" . PATH . "/category/{$alias}'>{$title}</a></li>";
            }
        }
        if ($name){
            $breadcrumbs .= "<li>$name</li>";
        }
        return $breadcrumbs;
    }

    public static function getParts($cats, $id){
        //debug($id);
        //debug($cats);
        if (!$id) return false;

        $breadcrumbs = [];
        foreach ($cats as $k=>$v){
            if (isset($cats[$id])){
                $breadcrumbs[$cats[$id]['alias']] = $cats[$id]['title'];
                $id = $cats[$id]['parent_id'];
            }else break;
        }
        return array_reverse($breadcrumbs, true);
        //return $breadcrumbs;
    }
}