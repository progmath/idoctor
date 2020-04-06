<?php


namespace app\controllers\admin;


class MainController extends AppController
{
    public function indexAction(){
        $category_count = \R::count('exam',"parent_id = '0'");
        //debug($countNewOrders);
        $center_count = \R::count('center');
        $diagnose_count = \R::count('diagnose');
        $user_count = \R::count('user','role = "user"');


        $this->set(compact('category_count','center_count','diagnose_count','user_count'));

        $this->setMeta('DashBoard_PM');
    }
}