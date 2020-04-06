<?php
/**
 * Created by PhpStorm.
 * User: Saten
 * Date: 12/16/2018
 * Time: 9:00 AM
 */

namespace app\controllers;


class ExamController extends AppController
{
    public function indexAction()
    {
        //$id = $this->getRequestID();
        $alias = $this->route['alias'];
        $parent_category = \R::findOne('exam', 'alias = ?', [$alias]);
        if (!$parent_category) {
            throw new \Exception('The page is not Found', 404);
        }
        /* $exams = \R::getAssoc("SELECT exam.id as exam_id,exam.arm_title as exam,diagnose.arm_title as diagnose,diagnose.id as diagnose_id,diagnose.min_price,diagnose.max_price FROM exam
 LEFT JOIN diagnose ON diagnose.exam_id = exam.id WHERE exam.parent_id = ?",[$category->id]);*/
        $categories = \R::getAssoc('SELECT * FROM exam WHERE parent_id = ?', [$parent_category->id]);
        foreach ($categories as $id=>$category) {
                $categories[$id]['diagnoses'] = \R::getAssoc('SELECT * FROM diagnose WHERE exam_id = ?',[$id]);
            }

        // $diagnoses = \R::findAll('diagnose','parent_id = ?',[$category->id]);

        $this->setMeta($parent_category->title, $parent_category->description, $parent_category->keywords);

        $this->set(compact('categories','parent_category'));
    }
}