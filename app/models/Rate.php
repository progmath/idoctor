<?php
/**
 * Created by PhpStorm.
 * User: Saten
 * Date: 10/28/2018
 * Time: 10:49 AM
 */

namespace app\models;


class Rate extends AppModel
{
    public static function changeRate($rate){
        $_SESSION['rate']['stars'][$rate] = 5;
    }
}