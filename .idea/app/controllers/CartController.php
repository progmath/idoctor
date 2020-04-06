<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 20.09.2018
 * Time: 17:10
 */

namespace app\controllers;
use app\models\Cart;

class CartController extends AppController
{
    public function addAction(){
        //debug($_GET);
        $id = !empty($_GET['id']) ? (int)$_GET['id'] : null;
        $qty = !empty($_GET['qty']) ? (int)$_GET['qty'] : null;
        $mod_id = !empty($_GET['mod']) ? (int)$_GET['mod'] : null;
        $mod = null;

        if ($id){
            $product=\R::findOne('product', 'id=?',[$id]/*1000*/);

            if (!$product){
                return false;
            }

            //debug($product);
            if ($mod_id){
                $mod = \R::findOne('modification', 'id = ? AND product_id = ?', [$mod_id,$id]);
            }
            //debug($mod);
        }
        //die;
        $cart = new Cart();
        $cart->addToCart($product, $qty, $mod);


        //w`ll save cart information in session
        if($this->isAjax()){
            $this->loadView('cart_modal');
        }//w`ll show cart in modal window

        redirect();

        //check how to get query ajax or http
        //if ajax then showcart  || see in main js - function showCart();

    }

    public function showAction(){

            $this->loadView('cart_modal');


    }

    public function deleteAction(){
        $id = !empty($_GET['id']) ? $_GET['id'] : null;
        if (isset($_SESSION['cart'][$id])){
            $cart = new Cart();
            $cart->deleteItem($id);
        }
        if($this->isAjax()){
            $this->loadView('cart_modal');
        }//w`ll show cart in modal window

        redirect();
    }

    public function clearAction(){
        unset($_SESSION['cart']);
        unset($_SESSION['cart.qty']);
        unset($_SESSION['cart.sum']);
        unset($_SESSION['cart.currency']);

        $this->loadView('cart_modal');



    }
    public function drawAction(){
        $cart_products = $_SESSION['cart'];
        
        $this->set(compact('cart_products'));
    }

    public function changeAction(){
        //debug($_GET);
        $id= !empty($_GET['p_id']) ? (int)$_GET['p_id'] : null;
        $q = !empty($_GET['q']) ? (int)$_GET['q'] : null;

        $cart = new Cart();
        $cart->changeQty($id,$q);

        if($this->isAjax()){
            $this->loadView('cart_modal');
        }
        redirect();

    }

}//end Class