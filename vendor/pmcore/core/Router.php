<?php
/**
 * Created by PhpStorm.
 * User: Progm
 * Date: 7/18/2018
 * Time: 2:11 AM
 */

namespace PM_Engine;

//Instruction - how to created a route
class Router
{
    protected  static $routes = []; //list of routes in site
    protected  static  $route = []; //current route


    //Rules - how to created the route list
    public static function add($regexp, $route = []){
        self::$routes[$regexp] = $route;
    }

    //Method for Test - get route list
    public static function getRoutes(){
        return self::$routes;
    }

    //Method for Test - get current route
    public static function getRoute(){
        return self::$route;
    }

    public static function dispatch($url){
        $url = self::removeQueryString($url);
        //debug($url);
        if(self::matchRoute($url)){
            //echo 'OK';
          //echo  $controller = 'app\controllers\\' . self::$route['prefix'] . self::$route['controller']. 'Controller';
          $controller = 'app\controllers\\' . self::$route['prefix'] . self::$route['controller']. 'Controller';
          if (class_exists($controller)){
              $controllerObject = new $controller(self::$route);
              $action = self::$route['action'];
              $action = self::lowerCamelCase(self::$route['action']).'Action';
              //echo $action;
              if (method_exists($controllerObject,$action)){
                  $controllerObject->$action();

                  $controllerObject->getView();///From->Controller: defined in View
              }else{
                  throw new \Exception("Method $controller::$action not Found",404);
              }
          }else{
              throw new \Exception("Controller $controller not Found",404);
          }
        }else{
            //echo 'NO';
            throw new \Exception("Page not Found",404);
        }
    }

    public static function matchRoute($url){
        //return false;
        foreach (self::$routes as $pattern => $route){
            if (preg_match("#{$pattern}#i", $url, $matches)){
                //debug($matches);
               foreach ($matches as $k=>$v){
                    if (is_string($k)){
                        $route[$k] = $v;
                    }
                }
                if (empty($route['action'])){  //action-e partadir parameter che,ajn karox e linel datark,ajd depqum action-i poxaren kgrenq index.Orinak "progmath.am/page" depqum controller = page , action = index
                   $route['action'] = 'index';
                }
                if (!isset($route['prefix'])){
                   $route['prefix']='';
                }else{
                   $route['prefix'].='\\';
                }
                $route['controller'] = self::upperCamelCase($route['controller']);///
                self::$route = $route;
                //debug(self::$route);
                //debug($route);
                return true;
            }
        }
        return false;
    }

    //CamelCase  //for controllers
    protected static function upperCamelCase($name){
        $name = str_replace(' ','', ucwords(str_replace('-',' ',$name)));
        return $name;
        //debug($name); // /page/view/?id=1   || see public/.htaccess
    }

    //camelCase  //for actions
    protected static function lowerCamelCase($name){
        return lcfirst(self::upperCamelCase($name));
    }

    protected  static  function removeQueryString($url){
        //debug($url);
        if($url){
            $params = explode('&', $url, 2); //dividet two part '&'
            //debug($params);
            if (false === strpos($params[0],'=')){
                return ( rtrim($params[0],'/') );
            }else{
                return '';
            }
        }
    }

}