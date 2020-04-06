<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 25.10.2018
 * Time: 11:19
 */

namespace app\controllers\admin;


use app\models\AppModel;
use app\models\User;
use PM_Engine\base\Controller;

class AppController extends Controller
{
    public $layout = 'admin';

    public function __construct($route)
    {
        parent::__construct($route);
        if (!User::isAdmin() && $route['action'] != 'login-admin'){
            //infinite redirect error
            redirect(ADMIN . '/user/login-admin');//UserController //loginAdminAction
        }
        new AppModel();//show sql queries in dev mode
    }

    public function getRequestID($get = true, $id = 'id'){
        if($get){
            $data = $_GET;
        }else{
            $data = $_POST;
        }
        $id = !empty($data[$id]) ? (int)$data[$id] : null;
        if(!$id){
            throw new \Exception('Page Not Found', 404);
        }
        return $id;
    }
}