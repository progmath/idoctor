<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 20.07.2018
 * Time: 12:59
 */

namespace PM_Engine\base;



abstract class Controller
{
    public $route; //array - parsed current URI || controller/[previx]?/action
    public $controller;
    public $model;
    public $view;
    public $prefix;
    public $layout;
    public $data = [];  //data - that pased from controller(get data from DB) to view
    public $meta = ['title'=>'','desc'=>'','keywords'=>''];  //title,description,keywords


    public function __construct($route)
    {
        $this->route        = $route;

        $this->controller   = $route['controller'];
        $this->model        = $route['controller'];
        $this->view         = $route['action'];
        $this->prefix       = $route['prefix'];
    }


    public function getView(){
        $viewObject = new View($this->route, $this->layout, $this->view, $this->meta);
        $viewObject->render($this->data);
    }

    public function set($data){
        $this->data = $data;
    }

    public function setMeta($title = '',$desc = '', $keywords = ''){
        $this->meta['title'] = $title;
        $this->meta['desc'] = $desc;
        $this->meta['keywords'] = $keywords;
    }


    //Additional functionality in core
    public function isAjax() {
        return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest';
    }//return true or false || request is ajax or not?

    public function loadView($view, $vars = []){
        extract($vars);
        require APP . "/views/{$this->prefix}{$this->controller}/{$view}.php";
        die;
    }//return html answer to ajax request
}