<?php
/**
 * Created by PhpStorm.
 * User: Saten
 * Date: 11/21/2018
 * Time: 11:17 AM
 */

namespace app\controllers\admin;


use app\models\User;
use PM_Engine\libs\Pagination;

class AdminController extends AppController
{
    public function indexAction()
    {
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perpage = 5;
        $count = \R::count('user', 'role = "admin"');
        $pagination = new Pagination($page, $perpage, $count);
        $start = $pagination->getStart();
        $admins = \R::findAll('user', "role = 'admin' LIMIT $start, $perpage");
        $this->setMeta('Admins List');
        $this->set(compact('admins', 'pagination', 'count'));
    }


    public function editAction()
    {

        if (!empty($_POST)) {
            $id = $this->getRequestID(false);
            $admin = new \app\models\admin\User();
            $data = $_POST;

            $admin->load($data);

            if (!$admin->attributes['password']) {
                unset($admin->attributes['password']);
            } else {
                $admin->attributes['password'] = password_hash($admin->attributes['password'], PASSWORD_DEFAULT);
            }

            if (!$admin->validate($data)) {
                $admin->getErrors();
                redirect();
            }


            if ($admin->update('user', $id)) {
                $_SESSION['success'] = 'Change Saved';
            }
            redirect(ADMIN . '/admin');
        }
        $admin_id = $this->getRequestID();
        $admin = \R::load('user', $admin_id);


        $this->setMeta('Edit Admin`s Profile');
        $this->set(compact('admin'));
    }



    public function loginAdminAction()
    {

        if (!empty($_POST)) {
            $user = new User(); //need to inheritance from admin/User class
            if (!$user->login(true)) {

                $_SESSION['error'] = 'Wrong Login/Password';
            }
            if (User::isAdmin()) {
                redirect(ADMIN);
            } else {
                redirect();
            }
        }
        $this->layout = 'login';
    }
}