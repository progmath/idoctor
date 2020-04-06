<?php
/**
 * Created by PhpStorm.
 * User: Saten
 * Date: 11/26/2018
 * Time: 1:16 PM
 */

namespace app\controllers\admin;


use app\models\admin\Center;
use app\models\AppModel;

use kcfinder\file;
use PM_Engine\App;
use PM_Engine\libs\Pagination;

class CenterController extends AppController
{
    public function indexAction()
    {
        $hospitals = \R::findAll('center', "type = 'hospital'");

        $laboratories = \R::findAll('center', "type = 'diagnostic_center'");

        $this->setMeta('Centers List');
        $this->set(compact('hospitals', 'laboratories'));

        /* $str = "https://www.youtube.com/watch?v=GpU0xCcXZkc";
         $str = str_replace('watch?v=','embed/',$str);
         //$str = substr(stristr($str, 'v='),2);
         debug($str);
         die;
         <iframe width="789" height="444" src="https://www.youtube.com/embed/ZwnDk3LHmLs" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        */


    }

    public function addAction()
    {
        if (!empty($_POST)) {

            $center = new Center();
            $data = $_POST;
            //debug($data,'1');
            $center->load($data);
            $center->attributes['status'] = $center->attributes['status'] ? '1' : '0';
            if ($center->attributes['video'] && strpos($center->attributes['video'], '?v=')) {
                $center->attributes['video'] = substr(stristr($center->attributes['video'], 'v='), 2);
            }
            if (isset($_FILES['diagnose_prices']['name'])){
                $val = new \Valitron\Validator($_FILES['diagnose_prices']);
                //$val->rule('equals', 'error', 0);
                $val->rule('in', 'type', ['application/pdf']);
                // $val->rule('max', 'size', 50000);
                $f = $_FILES['diagnose_prices'];

                if (!$val->validate()){
                    $val->errors();
                    $center->getErrors();
                    $_SESSION['error'] = 'Upload file must be only PDF type.';
                    redirect();
                }


            }

            $center->getImg();

            if (!$center->validate($data)) {
                $center->getErrors();
                $_SESSION['form_data'] = $center->attributes;
                redirect();
            }

            if ($id = $center->save('center')) {
                $path = 'upload_prices/';
                $filename = pathinfo($f['name'],PATHINFO_FILENAME).'_'.$id;
                $ext = pathinfo($f['name'],PATHINFO_EXTENSION);
                $file = $filename . '.'.$ext;
                $location = $path . $file;
                $center->attributes['diagnose_prices'] =  $file;
                move_uploaded_file($f['tmp_name'], $location);
                $alias = AppModel::createAlias('center', 'alias', $data['arm_title'], $id);
                $cnt = \R::load('center', $id);
                $cnt->alias = $alias;


                    $cnt->diagnose_prices = $file;


                \R::store($cnt);

                $_SESSION['success'] = 'Center Added';
            }
            redirect();
        }

        $this->setMeta('New Center');
    }

    public function addImageAction(){
        if(isset($_GET['upload'])){
            if($_POST['name'] == 'single'){
                $wmax = App::$app->getProperty('img_width');
                $hmax = App::$app->getProperty('img_height');
            }else{
                $wmax = App::$app->getProperty('gallery_width');
                $hmax = App::$app->getProperty('gallery_height');
            }
            $name = $_POST['name'];
            $center = new Center();
            $center->uploadImg($name, $wmax, $hmax);
        }
    }


    public function editAction()
    {
        if (!empty($_POST)) {

            $id = $this->getRequestID(false);
            $center = new Center();
            $data = $_POST;

            $center->load($data);
            //$center->attributes['diagnose_prices'] = '';
            if (isset($_FILES['diagnose_prices']['name'])){
                $val = new \Valitron\Validator($_FILES['diagnose_prices']);
                //$val->rule('equals', 'error', 0);
                $val->rule('in', 'type', ['application/pdf']);

               // $val->rule('max', 'size', 50000);

                if (!$val->validate()){
                    $val->errors();
                    $center->getErrors();
                    $_SESSION['error'] = 'Upload file must be only PDF type.';
                    redirect();
                }
                $path = 'upload_prices/';
                $filename = pathinfo($_FILES['diagnose_prices']['name'],PATHINFO_FILENAME).'_'.$id;
                $ext = pathinfo($_FILES['diagnose_prices']['name'],PATHINFO_EXTENSION);
                $file = $filename . '.'.$ext;
                $location = $path . $file;
                $center->attributes['diagnose_prices'] =  $file;
                move_uploaded_file($_FILES['diagnose_prices']['tmp_name'], $location);

            }else{
                $uploaded_file = \R::getCell('SELECT diagnose_prices FROM center WHERE id = ?',[$id]);
                $center->attributes['diagnose_prices'] = $uploaded_file;


            }
            $center->attributes['status'] = $center->attributes['status'] ? '1' : '0';


            if ($center->attributes['video'] && strpos($center->attributes['video'], '?v=')) {
                $center->attributes['video'] = substr(stristr($center->attributes['video'], 'v='), 2);
            }
             $center->getImg();

            if (!$center->validate($data)) {
                $center->getErrors();
                redirect();
            }

            if (empty($center->attributes['img'])){
                $center->attributes['img'] = \R::getCell('SELECT img FROM center WHERE id = ?',[$id]);
            }


            if ($center->update('center', $id)) {
                $alias = AppModel::createAlias('center', 'alias', $data['arm_title'], $id);
                $center = \R::load('center', $id);
                $center->alias = $alias;
                \R::store($center);
                $_SESSION['success'] = 'Changes Saved';
            }
            redirect();
        }


        $id = $this->getRequestID();
        $center = \R::load('center', $id);
        if (!$center){
           throw new \Exception( 'Center => ||' . $id . '||: Not Found');
        }
        $user_reviews = [];
        for ($i = 5; $i >= 1; $i--) {
            $user_reviews[$i] = \R::getAssoc("SELECT `user_review`.`user_id` FROM user_review 
WHERE `user_review`.`center_id` = {$id} AND  `user_review`.`review` = {$i}");

        }
        $user_count = \R::count('user_review', 'center_id = ?', [$id]);
        $review = \R::getAll("SELECT AVG(review) as avg_review FROM user_review WHERE center_id = ?", [$id]);
        $avg_rate = number_format((double)$review[0]['avg_review'], 1);
        if ($this->isAjax()) {
            $this->loadView("user_reviews");
        }

        //$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        //$perpage = 2;
        $count = \R::count('user_comment', "center_id = ?", [$id]);
        //$pagination = new Pagination($page, $perpage, $count);
        //$start = $pagination->getStart();
        $user_comments = \R::getAll("SELECT user_comment.id AS comment_id,user_comment.comment, user.id as user_id,user.firstname,user.lastname,user.img FROM user_comment
 JOIN user ON user.id = user_comment.user_id
 WHERE center_id = ?", [$id]);

        $this->setMeta("Edit Exam {$center->en_title}");
        $this->set(compact('center', 'user_reviews', 'user_count', 'avg_rate', 'user_comments', 'count'));
    }

    public function reviewAction()
    {
        $center_id = !empty($_POST['c_id']) ? (int)$_POST['c_id'] : null;
        $star = !empty($_POST['review']) ? (int)$_POST['review'] : null;

        $star_reviews = \R::getAll("SELECT * FROM user
JOIN `user_review` ON `user_review`.`user_id` = `user`.`id`
WHERE `user_review`.`review` = {$star} AND user_review.center_id = {$center_id}");
        $_SESSION['star_reviews'] = $star_reviews;

        redirect();
    }

    public function deleteAction()
    {
        $id = $this->getRequestID();
        $center = \R::load('center', $id);
        $diagnose_prices = 'upload_prices/'.$center->diagnose_prices;
        \R::trash($center);
        unlink($diagnose_prices);
        $_SESSION['success'] = 'Center Deleted';
        redirect();
    }
}