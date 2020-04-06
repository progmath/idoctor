<?php
/**
 * Created by PhpStorm.
 * User: Saten
 * Date: 19.01.2019
 * Time: 11:26 PM
 */

namespace app\controllers;


class ScreeningController extends AppController
{
    public function viewAction(){

        $alias = $this->route['alias'];
        $parent_category = \R::findOne('exam',"parent_id = '0' AND alias = ?",[$alias]);
        $screenings = \R::findAll('diagnose',"screening = '1' AND status = '1'");

        $this->set(compact('screenings','parent_category'));
    }
    public function testAction(){
        if (!empty($_POST)){
            //debug($_POST);
            //die;
            $age = $_POST['age'];
            $not_pregnant = '';
            $not_regular = '';
            $not_smoking = '';
          if ($_POST['smoke']){
              $smoking = '1';
          }
          else{
              $not_smoking = '1';
          }
          $_POST['gender'] ? $female = '1' : $male = '1';
          $_POST['status'] ? $pregnant = '1' : $not_pregnant = '1';
          $_POST['activity'] ? $regular = '1' : $not_regular = '1';

          if (isset($male)){
              $pregnant = '0';
              $not_pregnant = '0';
          }
            $sql_part = isset($female) ? "female = '$female'" . " AND " : "male = '$male'"  . " AND ";
          if (isset($female) && $female){
              $sql_part .= isset($pregnant) ? "pregnant = '$pregnant'" . " AND " : "not_pregnant = '$not_pregnant'"  . " AND ";
          }

          $sql_part .= isset($smoking) ? "smoking = '$smoking'"  . " AND ": "not_smoking = '$not_smoking'"  . " AND ";
          $sql_part .= isset($regular) ? "regular = '$regular'" : "not_regular = '$not_regular'";
            //echo $sql_part;
           // die;

          $results = \R::getAssoc("SELECT * FROM diagnose JOIN screening ON diagnose.id = screening.diagnose_id
WHERE $age >= min_age AND $age <= max_age AND $sql_part");
         // debug($results);
          $this->set(compact('results'));
        }
    }
}