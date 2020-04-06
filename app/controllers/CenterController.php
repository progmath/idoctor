<?php
/**
 * Created by PhpStorm.
 * User: Saten
 * Date: 12/21/2018
 * Time: 9:45 AM
 */

namespace app\controllers;


use app\models\Center;
use app\models\Comment;
use PM_Engine\App;
use PM_Engine\libs\Pagination;

class CenterController extends AppController
{
    public function viewAction()
    {

        /* if (isset($_GET['code'])) {
             if (!$_GET['code']) {
                 exit("error code");
             }
 //echo file_get_contents('https://graph.facebook.com/v3.2/oauth/access_token?client_id='. ID .'&redirect_uri='. URL .'&client_secret='. SECRET .'&code=' . $_GET['code']);
             $token = json_decode(file_get_contents('https://graph.facebook.com/v3.2/oauth/access_token?client_id=' . App::$app->getProperty('id') . '&redirect_uri=' . App::$app->getProperty('url') . '&client_secret=' . App::$app->getProperty('secret') . '&code=' . $_GET['code']), true);
             if (!$token) {
                 exit("error token");
             }
             $data = json_decode(file_get_contents('https://graph.facebook.com/v3.2/me?client_id=' . App::$app->getProperty('id') . '&redirect_uri=' . App::$app->getProperty('url') . '&client_secret=' . App::$app->getProperty('secret') . '&code=' . $_GET['code'] . '&access_token=' . $token['access_token'] . '&fields=link,id,first_name,last_name,email'), true);
             $data['avatar'] = 'https://graph.facebook.com/v3.2/' . $data["id"] . '/picture?width=200&height=200';
             $data['link'] = 'https://graph.facebook.com/v3.2/' . $data["id"] . '/link';
             $_SESSION['link'] = $data['link'];
            // debug($_COOKIE['c_user']);
             if (!$data) {
                 exit("Error data");
             } else {
                 $_SESSION['isset_data'] = true;
             }

             debug($token);
             debug($data);
             if (!empty($_POST)) {
                 $center = new Center();
                 $data = $_POST;
                 $center->load($data);
                 debug($_POST);
                 debug($data);
                 // redirect(PATH);
             }
         } else {*/
        $alias = $this->route['alias'];
        $center = \R::findOne('center', "alias= ? AND status = '1' ", [$alias]);

        if (!$center) {
            throw new \Exception("Alias not Found", 404);
        }
       // $comments = \R::findAll('user_comment', 'center_id = ?', [$center->id]);
        $comments = \R::getAll("SELECT user_comment.*,user.id,user.firstname,user.lastname,user.img,user.c_user FROM user_comment JOIN
user ON user.id = user_comment.user_id WHERE center_id = ? and user.role = 'user'",[$center->id]);

        $rate = [];
        $user_count = 0;
        for ($i = 5; $i >= 1; $i--) {
            $rate[$i] = \R::count('user_review', 'center_id = ? AND review = ?', [$center->id, $i]);
            $user_count += $rate[$i];
        }
        $review = \R::getAll("SELECT AVG(review) as avg_review FROM user_review WHERE center_id = ?", [$center->id]);
        $avg_rate = number_format((double)$review[0]['avg_review'], 1);
        $_SESSION['rate']['stars'] = $rate;
        $_SESSION['rate']['user_count'] = $user_count;
        $_SESSION['rate']['avg_rate'] = $avg_rate;

        if ($this->isAjax()) {
            $this->loadView("rating");
        }


        $_SESSION['center_alias'] = $center->alias;


        $this->setMeta($center->title, $center->description, $center->keywords);
        $this->set(compact('center', 'comments'));
    }

    public function rateAction()
    {


    }

    public function indexAction()
    {
        $alias = $this->route['alias'];

        //debug($alias);

        if (strpos($alias, 'hivand') !== false) {
            $type = 'hospital';
        } else {
            $type = 'diagnostic_center';
        }
//debug($type);
        //  die;
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perpage = 2;
        $count = \R::count('center', "type = ? AND status = '1' ", [$type]);
        $pagination = new Pagination($page, $perpage, $count);
        //echo $pagination;
        $start = $pagination->getStart();
        $category = \R::findOne('exam', "parent_id = '0' and alias = ?", [$alias]);
        //$centers = \R::findAll('center', "type = ? AND status = '1' LIMIT $start, $perpage", [$type]);
        $centers = \R::getAssoc("SELECT * FROM center WHERE type = ? AND status = '1' LIMIT $start,$perpage", [$type]);
        foreach ($centers as $id => $center) {
            $centers[$id]['avg_review'] = \R::getAll("SELECT AVG(review) as avg_review FROM user_review WHERE center_id = ?", [$id]);
            $centers[$id]['avg_review'] = number_format((double)$centers[$id]['avg_review'][0]['avg_review'], 1);
        }
        // debug($centers);
        // die;
        // $review = \R::getAll("SELECT AVG(review) as avg_review FROM user_review WHERE center_id = ?", [$center->id]);

        $this->setMeta($category->title, $category->description, $category->keywords);
        $this->set(compact('centers', 'category', 'count', 'pagination'));
    }
    public function fbAction(){
        if (isset($_GET['code'])) {
            if (!$_GET['code']) {
                exit("error code");
            }
            //echo file_get_contents('https://graph.facebook.com/v3.2/oauth/access_token?client_id='. ID .'&redirect_uri='. URL .'&client_secret='. SECRET .'&code=' . $_GET['code']);
            $token = json_decode(file_get_contents('https://graph.facebook.com/v3.2/oauth/access_token?client_id=' . App::$app->getProperty('id') . '&redirect_uri=' . App::$app->getProperty('url') . '&client_secret=' . App::$app->getProperty('secret') . '&code=' . $_GET['code']), true);
            if (!$token) {
                exit("error token");
            }
            $data = json_decode(file_get_contents('https://graph.facebook.com/v3.2/me?client_id=' . App::$app->getProperty('id') . '&redirect_uri=' . App::$app->getProperty('url') . '&client_secret=' . App::$app->getProperty('secret') . '&code=' . $_GET['code'] . '&access_token=' . $token['access_token'] . '&fields=link,id,first_name,last_name,email'), true);
            $data['avatar'] = 'https://graph.facebook.com/v3.2/' . $data["id"] . '/picture?width=200&height=200';
            $data['link'] = 'https://graph.facebook.com/v3.2/' . $data["id"] . '/link';
            $_SESSION['link'] = $data['link'];
            // debug($_COOKIE['c_user']);
            if (!$data) {
                exit("Error data");
            } else {
                $_SESSION['isset_data'] = true;
            }

            //debug($token);
            //debug($data);
           /* if (!empty($_POST)) {
                $center = new Center();
                $data = $_POST;
                $center->load($data);
                debug($_POST);
                debug($data);
                // redirect(PATH);
            }*/
           $c =  $_SESSION['center_alias'] ;

            redirect("/center/view/{$c}");
           //redirect(PATH .'/center/view/'. $c );
        }


       // $alias = $_SESSION['center_alias'];
        /*$center = \R::findOne('center', "alias= ? AND status = '1' ", [$alias]);

        if (!$center) {
            throw new \Exception("Alias not Found", 404);
        }
        $comments = \R::findAll('user_comment', 'center_id = ?', [$center->id]);

        $rate = [];
        $user_count = 0;
        for ($i = 5; $i >= 1; $i--) {
            $rate[$i] = \R::count('user_review', 'center_id = ? AND review = ?', [$center->id, $i]);
            $user_count += $rate[$i];
        }
        $review = \R::getAll("SELECT AVG(review) as avg_review FROM user_review WHERE center_id = ?", [$center->id]);
        $avg_rate = number_format((double)$review[0]['avg_review'], 1);
        $_SESSION['rate']['stars'] = $rate;
        $_SESSION['rate']['user_count'] = $user_count;
        $_SESSION['rate']['avg_rate'] = $avg_rate;

        if ($this->isAjax()) {
            $this->loadView("rating");
        }*/
        //redirect("/center/view/{$alias}");
       // $this->setMeta($center->title, $center->description, $center->keywords);
        $this->set(compact('center', 'comments'));
    }
    public function commentAction(){
        if (!empty($_POST)){
            $fb = new Comment();
            $data = $_POST;
            $fb->load($data);
            //////////ADD This FOR FB
            /*$user= \R::findOne('user','c_user = ?',[$c_user]);
            $user_id = $user->id;
            $fb->attributes['user_id'] = $user_id;*/
            $date = date("Y-m-d H:i:s");
            $alias = $this->route['alias'];

            $center = \R::findOne('center',"status = '1' AND alias = ?",[$alias]);
            $fb->attributes['center_id'] = $center->id;
            $fb->attributes['time_comment'] = $date;

            \R::ext('xdispense', function($type){
                return \R::getRedBean()->dispense( $type);
            });

            if($id = $fb->save('user_comment',false)){
                $_SESSION['comment_success'] = "Շնորհակալություն Ձեր մեկնաբանության համար";
                redirect(PATH.'/center/view/' .$alias);
                die;
            }
        }

        redirect(ADMIN . '/exam');
    }
}