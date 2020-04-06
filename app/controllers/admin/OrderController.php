<?php
/**
 * Created by PhpStorm.
 * User: Progm
 * Date: 10/28/2018
 * Time: 1:06 AM
 */

namespace app\controllers\admin;


use PM_Engine\libs\Pagination;

class OrderController extends AppController
{
    public function indexAction(){
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perpage = 10;
        $count = \R::count('order');
        $pagination = new Pagination($page, $perpage, $count);
        //echo $pagination;
        $start = $pagination->getStart();

        $orders = \R::getAll("SELECT `order`.`id`, `order`.`user_id`, `order`.`status`, `order`.`date`, `order`.`update_at`, `order`.`currency`, `user`.`name`, ROUND(SUM(`order_product`.`price`), 2) AS `sum` FROM `order`
  JOIN `user` ON `order`.`user_id` = `user`.`id`
  JOIN `order_product` ON `order`.`id` = `order_product`.`order_id`
  GROUP BY `order`.`id` ORDER BY `order`.`status`, `order`.`id` LIMIT $start, $perpage");

        //debug($orders);
        if ($this->isAjax() /*|| isset($_SESSION['orders']['ajax'])*/){
            $first_month = !empty($_GET['first_month']) ? (int)$_GET['first_month'] : null;
            $first_day = !empty($_GET['first_day']) ? (int)$_GET['first_day'] : null;
            $first_year = !empty($_GET['first_year']) ? (int)$_GET['first_year'] : null;
            $start_date = $first_year . "-" . $first_month . "-" . $first_day;
            $second_month = !empty($_GET['second_month']) ? (int)$_GET['second_month'] : null;
            $second_day = !empty($_GET['second_day']) ? (int)$_GET['second_day'] : null;
            $second_year = !empty($_GET['second_year']) ? (int)$_GET['second_year'] : null;
            $end_date = $second_year . "-" . $second_month . "-" . $second_day;

           $orders = \R::getAll("SELECT `order`.`id`,`order`.`user_id`, `order`.`status`,`order`.`date`, `order`.`update_at`, `order`.`currency`, `user`.`name`,ROUND(SUM(`order_product`.`price`), 2) AS `sum` FROM `order` 
JOIN `user` ON `order`.`user_id` = `user`.`id`
  JOIN `order_product` ON `order`.`id` = `order_product`.`order_id`
  WHERE date>=? AND date<=? GROUP BY `order`.`id` ORDER BY `order`.`status`, `order`.`id`",[$start_date,$end_date]);

            $_SESSION['orders']['list'] = $orders;
            $_SESSION['orders']['pagination'] = $pagination;
            $_SESSION['orders']['count'] = $count;


            $this->loadView("order_table");

        }
        $this->setMeta('Order List');
        $this->set(compact('orders', 'pagination', 'count','first_date'));
    }


    public function viewAction(){
        $order_id = $this->getRequestID();
        //var_dump($order_id);die;
        $order = \R::getRow("SELECT `order`.*, `user`.`name`, ROUND(SUM(`order_product`.`price`), 2) AS `sum` FROM `order`
  JOIN `user` ON `order`.`user_id` = `user`.`id`
  JOIN `order_product` ON `order`.`id` = `order_product`.`order_id`
  WHERE `order`.`id` = ?
  GROUP BY `order`.`id` ORDER BY `order`.`status`, `order`.`id` LIMIT 1", [$order_id]);
        //debug($order,1);
        if(!$order){
            throw new \Exception('Страница не найдена', 404);
        }
        $order_products = \R::findAll('order_product', "order_id = ?", [$order_id]);
        $this->setMeta("Заказ №{$order_id}");
        $this->set(compact('order', 'order_products'));
    }

    public function changeAction(){
        $order_id = $this->getRequestID();
        $status = !empty($_GET['status']) ? '1' : '0';//because status type is enum
        $order = \R::load('order', $order_id);
        if(!$order){
            throw new \Exception('Страница не найдена', 404);
        }
        $order->status = $status;
        $order->update_at = date("Y-m-d H:i:s");
        \R::store($order);
        $_SESSION['success'] = 'Changed Saved';
        redirect();
    }

    public function deleteAction(){
        $order_id = $this->getRequestID();
        $order = \R::load('order', $order_id);
        \R::trash($order);
        $_SESSION['success'] = 'Order Deleted';
        redirect(ADMIN . '/order');
    }




}//end Class