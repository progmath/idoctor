<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 31.10.2018
 * Time: 10:53
 */

namespace app\controllers\admin;


use app\models\AppModel;
use app\models\Category;
use PM_Engine\App;

class CategoryController extends AppController
{
    public function indexAction(){
        $this->setMeta('Category List');
    }

   public function deleteAction(){
        $id = $this->getRequestID();
        $children = \R::count('category', 'parent_id = ?', [$id]);
        //debug($children,1);
        $errors = '';
        if($children){
            $errors .= '<li>Can not delete.In the category has sub-categories</li>';
        }
        $products = \R::count('product', 'category_id = ?', [$id]);
        if($products){
            $errors .= '<li>Can not delete.There are products in the category</li>';
        }
        if($errors){
            $_SESSION['error'] = "<ul>$errors</ul>";
            redirect();
        }
        $category = \R::load('category', $id);
        \R::trash($category);
        $_SESSION['success'] = 'Category Deleted';
        redirect();
    }
    public function addAction(){
        if(!empty($_POST)){
            $category = new Category();
            $data = $_POST;
            $category->load($data);
            if(!$category->validate($data)){
                $category->getErrors();
                redirect();
            }
            if($id = $category->save('category')){
                $alias = AppModel::createAlias('category','alias',$data['arm_title'],$id);
                $cat = \R::load('category',$id);
                $cat->alias = $alias;
                \R::store($cat);
                $_SESSION['success'] = "Category Added";

            }
            redirect();
        }
        $this->setMeta('New Category');
    }


    public function editAction(){
        if(!empty($_POST)){
            $id = $this->getRequestID(false);
            $category = new Category();
            $data = $_POST;
            $category->load($data);
            if(!$category->validate($data)){
                $category->getErrors();
                redirect();
            }

            if($category->update('category', $id)){
                $alias = AppModel::createAlias('category', 'alias', $data['arm_title'], $id);
                $category = \R::load('category', $id);
                $category->alias = $alias;
                \R::store($category);
                $_SESSION['success'] = 'Change Saved';
            }
            redirect();
        }
        $id = $this->getRequestID();
        $category = \R::load('category', $id);
        App::$app->setProperty('parent_id', $category->parent_id);
        $this->setMeta("Edit Category {$category->en_title}");
        $this->set(compact('category'));
    }
}