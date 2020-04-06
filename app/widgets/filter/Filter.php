<?php
/**
 * Created by PhpStorm.
 * User: Progm
 * Date: 10/21/2018
 * Time: 11:11 PM
 */

namespace app\widgets\filter;


use PM_Engine\Cache;

class Filter
{
    public $groups;
    public $attrs;
    public $tpl;

    public function __construct(){
        $this->tpl = __DIR__ . '/filter_tpl.php';
        $this->run();
    }

    protected function run(){
        $cache = Cache::instance();
        $this->groups = $cache->get('filter_group');
        if(!$this->groups){
            $this->groups = $this->getGroups();
            $cache->set('filter_group', $this->groups, 30);
        }
        $this->attrs = $cache->get('filter_attrs');
        if(!$this->attrs){
            $this->attrs = self::getAttrs();
            $cache->set('filter_attrs', $this->attrs, 30);
        }
        $filters = $this->getHtml();
        //debug($this->groups);
        //debug($this->attrs);
        echo $filters;
    }

    protected function getHtml(){
        ob_start();
        $filter = self::getFilter();
        if(!empty($filter)){
            $filter = explode(',', $filter);
        }
        require $this->tpl;
        return ob_get_clean();
    }

    protected function getGroups(){
        return \R::getAssoc('SELECT id, title FROM attribute_group');//id-key ->title-value
    }

    protected static function getAttrs(){
        $data = \R::getAssoc('SELECT * FROM attribute_value');
        $attrs = [];
        foreach($data as $k => $v){
            $attrs[$v['attr_group_id']][$k] = $v['value'];
        }
        return $attrs;
    }

    public static function getFilter(){
        $filter = null;
        if(!empty($_GET['filter'])){
            $filter = preg_replace("#[^\d,]+#", '', $_GET['filter']);
            $filter = trim($filter, ',');
        }
        return $filter;
    }

    public static function getCountGroups($filter){
        $filters = explode(',', $filter); //convert string to array
        //debug($filters);
        $cache = Cache::instance();
        $attrs = $cache->get('filter_attrs');

        if(!$attrs){
            $attrs = self::getAttrs();
        }
        //debug($attrs);
        $data = [];
        foreach($attrs as $key => $item){
            foreach($item as $k => $v){
                if(in_array($k, $filters)){
                    $data[] = $key;
                    break;
                }
            }
        }

        //debug($data);
        return count($data);
    }
}