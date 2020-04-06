<?php
/**
 * Created by PhpStorm.
 * User: Saten
 * Date: 20.01.2019
 * Time: 12:15 PM
 */

namespace app\models;


class Comment extends AppModel
{
    public $attributes = [
        'user_id' => '',
        'center_id' => '',
        'comment' => '',
        'time_comment'=>'',
    ];

}