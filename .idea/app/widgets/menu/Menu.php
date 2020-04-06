<?php


namespace app\widgets\menu;


use PM_Engine\App;
use PM_Engine\Cache;

class Menu
{
    protected $data;
    protected $tree;                    //array tree from $data
    protected $menuHtml;                //menu html code
    protected $tpl;                     //template for menu
    protected $container = 'ul';        //default value = ul in admin maybe select
    protected $class = 'menu';
    protected $table = 'category';      //table from DB,which table w`ll select for menu
    protected $cache = 3600;            //valid date for cache = 1 hour(3600 seconds)
    protected $cacheKey = 'ishop_menu'; //valid date for cache = 1 hour(3600 seconds)
    protected $attrs = [];              //array with attributes for menu
    protected $prepend = '';            //w`ll use it in admin



    public function __construct($options = [])
    {
        $this->tpl = __DIR__ . '/menu_tpl/menu.php';
        $this->getOptions($options);
        //debug($this->table);
        $this->run();
    }

    protected function getOptions($options)
    {
        foreach ($options as $k=>$v){
            if (property_exists($this, $k)){
                $this->$k = $v;
            }
        }
    }

    protected function run()  //need to add menu in cache || select from DB and add to cache
    {
        $cache = Cache::instance();
        $this->menuHtml = $cache->get($this->cacheKey);
        if (!$this->menuHtml){
            $this->data = App::$app->getProperty('cats');
            if (!$this->data){
                $this->data =  $cats = \R::getAssoc("SELECT * FROM {$this->table}");
            }
            $this->tree = $this->getTree();
            //debug($this->tree);
            //debug($this->data); // categories array

            $this->menuHtml = $this->getMenuHtml($this->tree);

            if ($this->cache){
                $cache->set($this->cacheKey,$this->menuHtml,$this->cache);
            }

        }
        $this->output();
    }

    protected function output(){
        $attrs = '';
        if (!empty($this->attrs)){
            foreach ($this->attrs as $k=>$v){
                $attrs .= " $k='$v' ";
            }
        }
        echo "<{$this->container} class = '{$this->class}' $attrs>";
            echo $this->prepend;
            echo $this->menuHtml;
        echo "</{$this->container}>";
    }

    protected function getTree(){
        $tree = [];
        $data = $this->data;
        foreach ($data as $id=>&$node){
            if (!$node['parent_id']){
                $tree[$id] = &$node;
            }
            else{
                $data[$node['parent_id']]['childs'][$id] = &$node;
            }
        }
        return $tree;
    }
    protected function getMenuHtml($tree, $tab = ''){
        $str = '';
        foreach ($tree as $id => $category){
            $str .= $this->catToTemplate($category,$tab,$id);
        }
        return $str;
    }

    protected function catToTemplate($category,$tab,$id){  //$id - $id category
        ob_start();
        require $this->tpl;
        return ob_get_clean();
    }




}//End Class