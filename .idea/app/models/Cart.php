<?php

namespace app\models;
/*Array
(
    [1] => Array
        (
            [qty] => QTY
            [name] => NAME
            [price] => PRICE
            [img] => IMG
        )
    [10] => Array
        (
            [qty] => QTY
            [name] => NAME
            [price] => PRICE
            [img] => IMG
        )
    )
    [qty] => QTY,
    [sum] => SUM
*/
use PM_Engine\App;
class Cart extends AppModel
{

    public function addToCart($product, $qty = 1, $mod = null){
        //echo 'Cart-function <--> ';
        if(!isset($_SESSION['cart.currency'])){
            $_SESSION['cart.currency'] = App::$app->getProperty('currency');
        }
        //debug($mod);
        if($mod){
            $ID = "{$product->id}-{$mod->id}";
            $title = "{$product->title} ({$mod->title})";
            $price = $mod->price;
            $old_price = $mod->old_price;
        }else{
            $ID = $product->id;
            $title = $product->title;
            $price = $product->price;
            $old_price = $product->old_price;
        }

//        debug($_SESSION);
//        debug($ID);
//        debug($title);
//        debug($price);
//need to send these info to cart


        //if product exist in cart then add qty`s value
        if(isset($_SESSION['cart'][$ID])){
            $_SESSION['cart'][$ID]['qty'] += $qty;
        }else{
            $_SESSION['cart'][$ID] = [
                'qty' => $qty,
                'title' => $title,
                'alias' => $product->alias,
                'price' => $price * $_SESSION['cart.currency']['value'],
                'old_price' => $old_price * $_SESSION['cart.currency']['value'],
                'img' => $product->img,
            ];
        }
        $_SESSION['cart.qty'] = isset($_SESSION['cart.qty']) ? $_SESSION['cart.qty'] + $qty : $qty;
        $_SESSION['cart.sum'] = isset($_SESSION['cart.sum']) ? $_SESSION['cart.sum'] + $qty * ($price * $_SESSION['cart.currency']['value']) : $qty * ($price * $_SESSION['cart.currency']['value']);
    }


    public function deleteItem($id){
        $qtyMinus = $_SESSION['cart'][$id]['qty'];
        $sumMinus = $_SESSION['cart'][$id]['qty'] * $_SESSION['cart'][$id]['price'];

        $_SESSION['cart.qty'] -= $qtyMinus;
        $_SESSION['cart.sum'] -= $sumMinus;
        unset($_SESSION['cart'][$id]);
    }

    public static function recalc($curr){
        //debug($curr);
        //debug($_SESSION);
        //die;

        //convert base currency to other currency
        if (isset($_SESSION['cart.currency'])){
            if ($_SESSION['cart.currency']['base']){
                $_SESSION['cart.sum'] *= $curr->value;
            }
            //convert other currency to other currency //sum of cart
            else{
                $_SESSION['cart.sum'] =  $_SESSION['cart.sum'] /  $_SESSION['cart.currency']['value'] * $curr->value;
            }
            //convert all product currency type
            foreach ($_SESSION['cart'] as $k=>$v) {
                if ($_SESSION['cart.currency']['base']){
                    $_SESSION['cart'][$k]['price'] *= $curr->value;
                }else{
                    $_SESSION['cart'][$k]['price'] = $_SESSION['cart'][$k]['price'] / $_SESSION['cart.currency']['value'] * $curr->value;
                    //koeficent = $_SESSION['cart.currency']['value'] * $curr->value;
                }

            }//endforeach
            foreach ($curr as $k=>$v){
                $_SESSION['cart.currency'][$k] = $v;
            }
        }



    }//end recalc();

    public function changeQty($id,$q){
        $_SESSION['cart'][$id]['qty'] = $q;
        $_SESSION['cart.sum'] = 0;
        $_SESSION['cart.qty'] = 0;
        foreach ($_SESSION['cart'] as $id=>$product){
            $_SESSION['cart.qty'] += $product['qty'];
            $_SESSION['cart.sum'] += $product['price'] * $product['qty'];

        }



    }





}//end Class











