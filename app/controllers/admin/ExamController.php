<?php
/**
 * Created by PhpStorm.
 * User: Saten
 * Date: 11/14/2018
 * Time: 9:00 AM
 */

namespace app\controllers\admin;



use app\models\AppModel;
use app\models\Exam;
use PM_Engine\App;


class ExamController extends AppController
{
    public function indexAction(){
        $this->setMeta('Exam List');
    }


    public function addAction(){
        if(!empty($_POST)){
            $exam = new Exam();
            $data = $_POST;
            $exam->load($data);
            $exam->getImg();
            if(!$exam->validate($data)){
                $exam->getErrors();
                redirect();
            }
            if($id = $exam->save('exam')){
                $alias = AppModel::createAlias('exam','alias',$data['title'],$id);
                $exam = \R::load('exam',$id);
                $exam->alias = $alias;
                \R::store($exam);
                $_SESSION['success'] = "Exam Added";

            }
            redirect(ADMIN . '/exam');
        }
        $this->setMeta('New Exam');
    }
    public function editAction(){
        if(!empty($_POST)){
            $id = $this->getRequestID(false);
            $exam = new Exam();
            $data = $_POST;
            $exam->load($data);
            $exam->getImg();

            if (empty($_FILES)){
                $img = \R::getCell( 'SELECT img FROM exam WHERE id = ?',[$id] );
                $exam->attributes['img'] =$img;
            }
            if(!$exam->validate($data)){
                $exam->getErrors();
                redirect();
            }

            if($exam->update('exam', $id)){
                $alias = AppModel::createAlias('exam', 'alias', $data['arm_title'], $id);
                $exam = \R::load('exam', $id);
                $exam->alias = $alias;
                \R::store($exam);
                $_SESSION['success'] = 'Change Saved';
            }
            redirect();
        }
        $id = $this->getRequestID();
        $exam = \R::load('exam', $id);
        App::$app->setProperty('parent_id', $exam->parent_id);
        $this->setMeta("Edit Exam {$exam->en_title}");
        $this->set(compact('exam'));
    }
    public function deleteAction(){
        $id = $this->getRequestID();
        $children = \R::count('exam', 'parent_id = ?', [$id]);
        //debug($children,1);
        $errors = '';
        if($children){
            $errors .= '<li>Can not delete.In the category has sub-categories</li>';
        }
        $products = \R::count('product', 'category_id = ?', [$id]);
        if($products){
            $errors .= '<li>Can not delete.There are diagnozes in the category</li>';
        }
        if($errors){
            $_SESSION['error'] = "<ul>$errors</ul>";
            redirect();
        }
        $exam = \R::load('exam', $id);
        \R::trash($exam);
        $_SESSION['success'] = 'Exam Deleted';
        redirect();
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
            $exam = new Exam();
            $exam->uploadImg($name, $wmax, $hmax);
        }
    }
}