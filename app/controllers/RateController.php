<?php
/**
 * Created by PhpStorm.
 * User: Saten
 * Date: 11/10/2018
 * Time: 12:14 AM
 */

namespace app\controllers;


class RateController extends AppController
{
    public function indexAction()
    {
        $rate = !empty($_GET['rate']) ? (int)$_GET['rate'] : null;
        $center_id = !empty($_GET['p_id']) ? (int)$_GET['p_id'] : null;
        // debug($product_id);
       // if (isset($_SESSION['user'])) {
            //debug($_SESSION);
            $user_id = 2;//$_SESSION['user']['id'];
            $user_review = \R::findOne('user_review', 'user_id = ? AND center_id = ?', [$user_id, $center_id]);
            if (!$user_review) {
                $date = date('Y-m-d H:i:s');
                $sql_part = "($user_id, $center_id, $rate,'$date')";
                \R::exec("INSERT INTO user_review (user_id, center_id, review,time_review) VALUES $sql_part");
            }
            else{
                $_SESSION['warning_message'] = "Դուք արդեն գնահատել եք այս կենտրոնը";
            }
            redirect();
       // }

    }
}