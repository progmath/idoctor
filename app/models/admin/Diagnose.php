<?php
/**
 * Created by PhpStorm.
 * User: Saten
 * Date: 12/9/2018
 * Time: 1:55 AM
 */

namespace app\models\admin;


use app\models\AppModel;

class Diagnose extends AppModel
{
    public $attributes = [
        'arm_title' => '',
        'ru_title' => '',
        'en_title' => '',
        'arm_content' => '',
        'ru_content' => '',
        'en_content' => '',
        'min_price' => '',
        'max_price' => '',
        'exam_id'=>'',
        'status' => '',
        'hit' => '',
        'time_hit' => '',
        'img' => '',
        'video' => '',
        'keywords' => '',
        'title' => '',
        'description' => '',
        'alias' => '',
        'screening' => '',

        /*'min_age' => '',
        'max_age' => '',
        'male' => '',
        'female' => '',
        'pregnant' => '',
        'not_pregnant' => '',
        'smoking' => '',
        'not_smoking' => '',*/

    ];
    public $rules = [
        'required' => [
            ['arm_title'],
            ['exam_id'],
        ],
        'numeric' => [
            ['min_price'],
            ['max_price'],
            ['min_age'],
            ['max_age'],
        ],


    ];

}