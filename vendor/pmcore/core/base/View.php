<?php


namespace PM_Engine\base;


class View
{
    public $route;
    public $controller;
    public $model;
    public $view;
    public $prefix;
    public $layout;
    public $data = [];
    public $meta = [];

    public function __construct($route, $layout = '', $view = '', $meta)
    {
        $this->route        = $route;

        $this->controller   = $route['controller'];
        $this->model        = $route['controller'];
        $this->view         = $view;//$route['action'];
        $this->prefix       = $route['prefix'];
        $this->meta         = $meta;

        if ($layout === false){
            $this->layout = false;
        }
        else{
            $this->layout = $layout ?: LAYOUT;
        }
    }

    public function render($data){
        //debug($data);
        if (is_array($data)){
            extract($data);
        }
        echo $viewFile = APP . "/views/{$this->prefix}{$this->controller}/{$this->view}.php";
        if(is_file($viewFile)){
            ob_start();
            require_once $viewFile;
            $content = ob_get_clean();
        }else{
            throw new \Exception("not found View {$viewFile}", 500);
        }
        if(false !== $this->layout){
          /*echo*/  $layoutFile = APP ."/views/layouts/{$this->layout}.php";

            if(is_file($layoutFile)){
                require_once $layoutFile;
            }else{
                throw new \Exception("not found Template {$this->layout}", 500);
            }
        }
    }

    public function getMeta(){
        $output = '<title>' .$this->meta['title'] . '</title>' . PHP_EOL;
        $output.= '<meta name="description" content=" ' . $this->meta['desc']. ' ">' . PHP_EOL;
        $output.= '<meta name="keywords" content=" ' . $this->meta['keywords']. ' ">' . PHP_EOL;

        return $output;

    }
}