<?php
/**
 * Created by PhpStorm.
 * User: Saten
 * Date: 12/2/2018
 * Time: 1:20 AM
 */

namespace app\models\admin;


use app\models\AppModel;

class Center extends AppModel
{
    public $attributes = [
        'arm_title' => '',
        'ru_title' => '',
        'en_title' => '',
        'arm_content' => '',
        'ru_content' => '',
        'en_content' => '',
        'arm_address' => '',
        'ru_address' => '',
        'en_address' => '',
        'email' => '',
        'phone' => '',
        'status' => '',
        'type' => '',
        'img' => '',
        'site_link' => '',
        'video' => '',
        'keywords' => '',
        'title' => '',
        'description' => '',
        'alias' => '',
        'diagnose_prices' => '',

    ];
    public $rules = [
        'required' => [
            ['arm_title'],
            ['arm_address'],
            ['type'],
        ],
        'email' => [
            ['email'],
        ],

    ];


}