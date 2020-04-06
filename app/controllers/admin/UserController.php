<?php


namespace app\controllers\admin;


use app\models\User;
use PM_Engine\libs\Pagination;

class UserController extends AppController
{
    public function indexAction(){
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perpage = 2;
        $count = \R::count('user',"role = 'user'");
        $pagination = new Pagination($page, $perpage, $count);
        $start = $pagination->getStart();
        $users = \R::findAll('user', "role = 'user' LIMIT $start, $perpage");
        $this->setMeta( 'Users List');
        $this->set(compact('users', 'pagination', 'count'));
    }


    public function addAction(){
        $this->setMeta('New User');
    }

    public function editAction(){

        if(!empty($_POST)){
            $id = $this->getRequestID(false);
            $user = new \app\models\admin\User();
            $data = $_POST;
            $user->load($data);
            if(!$user->attributes['password']){
                unset($user->attributes['password']);
            }else{
                $user->attributes['password'] = password_hash($user->attributes['password'], PASSWORD_DEFAULT);
            }
            if(!$user->validate($data) || !$user->checkUnique()){
                $user->getErrors();
                redirect();
            }
            if($user->update('user', $id)){
                $_SESSION['success'] = 'Change Saved';
            }
            redirect();
        }

        $user_id = $this->getRequestID();

        $user = \R::load('user', $user_id);

        $user_reviews = \R::getAll("SELECT `center`.*, `user_review`.`review`,`user_review`.`time_review`/*,COUNT(review) as `count`*/ FROM `user_review`
  JOIN `center` ON `center`.`id` = `user_review`.`center_id`
  WHERE user_id = {$user_id} /* GROUP BY `center`.`id`*/ ");


        $user_comments = \R::getAll("SELECT `center`.*, `user_comment`.`id`,`user_comment`.`comment`,`user_comment`.`time_comment`/*, COUNT(comment) as `count`*/ FROM `user_comment`
  JOIN `center` ON `center`.`id` = `user_comment`.`center_id`
  WHERE user_id = {$user_id}  /*GROUP BY `user_comment`.`id`*/ ORDER BY `center`.`arm_title`, `center`.`ru_title`,`center`.`en_title`");
       // debug($user_comments);
      // die;
        $this->setMeta('Edit User`s Profile');
        $this->set(compact('user','user_reviews','user_comments'));
    }


    public function deleteAction(){
        $comment_id = $this->getRequestID();
        $comment = \R::load('user_comment', $comment_id);
        \R::trash($comment);
        
        $_SESSION['success'] = 'Comment Deleted';
        redirect();
    }

    public function loginAdminAction(){

        if (!empty($_POST)){
            $user = new User(); //need to inheritance from admin/User class
            if (!$user->login(true)){

                $_SESSION['error'] = 'Wrong Login/Password';
            }
            if(User::isAdmin()){
                redirect(ADMIN);
            }
            else{
                redirect();
            }
        }
        $this->layout = 'login';
    }
}