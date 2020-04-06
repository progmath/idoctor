<?php
/**
 * Created by PhpStorm.
 * User: Saten
 * Date: 11/14/2018
 * Time: 9:09 AM
 */

namespace app\models;


use PM_Engine\App;

class Exam extends AppModel
{
    public $attributes = [
        'arm_title' => '',
        'ru_title' => '',
        'en_title' => '',
        'parent_id' => '',
        'keywords' => '',
        'title' => '',
        'description' => '',
        'img' => '',
        'alias' => '',
    ];
    public $rules = [
        'required' => [
            ['arm_title'],
        ],
    ];

    //Get sub categories id
    public function getIds($id)
    {   //$id - is a current category`s id
        $exams = App::$app->getProperty('exams');
        //debug($cats);

        $ids = null;
        foreach ($exams as $k => $v) {
            if ($v['parent_id'] == $id) {
                $ids .= $k . ',';
                $ids .= $this->getIds($k);
            }
        }

        return $ids;

    }

}