<?php
/**
 * Created by PhpStorm.
 * User: Saten
 * Date: 12/8/2018
 * Time: 12:10 PM
 */

namespace app\controllers\admin;


use app\models\admin\Diagnose;
use app\models\AppModel;
use PM_Engine\App;
use PM_Engine\libs\Pagination;

class DiagnoseController extends AppController
{
    public function indexAction(){

        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perpage = 10;
        $count = \R::count('diagnose');
        $pagination = new Pagination($page, $perpage, $count);
        $start = $pagination->getStart();
        $diagnoses = \R::findAll('diagnose',"LIMIT {$start},{$perpage}");

        $this->setMeta( 'Diagnoses List');
        $this->set(compact('diagnoses','count','pagination'));
    }
    public function addAction(){
        if(!empty($_POST)){
            $diagnose = new Diagnose();
            $data = $_POST;

            $diagnose->load($data);
            $diagnose->attributes['status'] =$diagnose->attributes['status'] ? '1' : '0';
            $diagnose->attributes['hit'] = $diagnose->attributes['hit'] ? '1' : '0';
            $diagnose->attributes['screening'] = $diagnose->attributes['screening'] ? '1' : '0';
            $data['screening'] = isset($data['screening']) ? '1' : '0';
            $data['male'] = isset($data['male']) ? '1' : '0';
            $data['female'] = isset($data['female']) ? '1' : '0';
            $data['smoking'] = isset($data['smoking']) ? '1' : '0';
            $data['not_smoking'] = isset($data['not_smoking']) ? '1' : '0';
            $data['pregnant'] = isset($data['pregnant']) ? '1' : '0';
            $data['not_pregnant'] = isset($data['not_pregnant']) ? '1' : '0';
            $data['regular'] = isset($data['regular']) ? '1' : '0';
            $data['not_regular'] = isset($data['not_regular']) ? '1' : '0';
            //debug($data);
            //die;
            if ($diagnose->attributes['video'] && strpos($diagnose->attributes['video'],'?v=')){
                $diagnose->attributes['video'] =  substr(stristr($diagnose->attributes['video'], 'v='),2);
            }
            $diagnose->getImg();
            if(!$diagnose->validate($data)){
                $diagnose->getErrors();
                $_SESSION['form_data'] =  $diagnose->attributes;
                redirect();
            }
            if ($diagnose->attributes['hit'] == '1'){
                $diagnose->attributes['time_hit'] = date("Y-m-d H:i:s");
            }
            if($id = $diagnose->save('diagnose')){
               // $diagnose->save('screening');

                if($data['screening']){
                        if ($data['female'] == '0'){
                            $data['pregnant'] = '0';
                            $data['not_pregnant'] = '0';
                        }
                        $sql_part = "NULL,{$id},{$data['min_age']},{$data['max_age']},'{$data['male']}','{$data['female']}','{$data['smoking']}','{$data['not_smoking']}','{$data['pregnant']}','{$data['not_pregnant']}','{$data['regular']}','{$data['not_regular']}'";
                        \R::exec("INSERT INTO screening VALUES ({$sql_part})");
                    }
                $alias = AppModel::createAlias('diagnose', 'alias', $data['arm_title'], $id);
                $dg = \R::load('diagnose', $id);
                $dg->alias = $alias;
                \R::store($dg);
                $_SESSION['success'] = 'Diagnose Added';
            }
            redirect();
        }

        $this->setMeta('New diagnose');
    }
    public function addImageAction(){
        if(isset($_GET['upload'])){
            if($_POST['name'] == 'single'){
                $wmax = App::$app->getProperty('img_width');
                $hmax = App::$app->getProperty('img_height');
            }else{
                $wmax = App::$app->getProperty('gallery_width');
                $hmax = App::$app->getProperty('gallery_height');
            }
            $name = $_POST['name'];
            $diagnose = new Diagnose();
            $diagnose->uploadImg($name, $wmax, $hmax);
        }
    }

    public function deleteAction(){
        $id = $this->getRequestID();
        $diagnose = \R::load('diagnose', $id);
        \R::trash($diagnose);

        $_SESSION['success'] = 'Diagnose Deleted';
        redirect();
    }

    public function editAction(){
        if(!empty($_POST)){
            $id = $this->getRequestID(false);

            $diagnose = new Diagnose();
            $data = $_POST;

            $diagnose->load($data);
            $diagnose->attributes['status'] =$diagnose->attributes['status'] ? '1' : '0';
            $diagnose->attributes['hit'] = $diagnose->attributes['hit'] ? '1' : '0';
            $diagnose->attributes['screening'] = $diagnose->attributes['screening'] ? '1' : '0';


            $data['screening'] = isset($data['screening']) ? '1' : '0';
            $data['male'] = isset($data['male']) ? '1' : '0';
            $data['female'] = isset($data['female']) ? '1' : '0';
            $data['smoking'] = isset($data['smoking']) ? '1' : '0';
            $data['not_smoking'] = isset($data['not_smoking']) ? '1' : '0';
            $data['pregnant'] = isset($data['pregnant']) ? '1' : '0';
            $data['not_pregnant'] = isset($data['not_pregnant']) ? '1' : '0';
            $data['regular'] = isset($data['regular']) ? '1' : '0';
            $data['not_regular'] = isset($data['not_regular']) ? '1' : '0';

            if ($diagnose->attributes['video'] && strpos($diagnose->attributes['video'],'?v=')){
                $diagnose->attributes['video'] =  substr(stristr($diagnose->attributes['video'], 'v='),2);
            }

            $diagnose->getImg();
            if (empty($_FILES)){
                $img = \R::getCell( 'SELECT img FROM diagnose WHERE id = ?',[$id] );
                $diagnose->attributes['img'] =$img;
            }
            if(!$diagnose->validate($data)){
                $diagnose->getErrors();
                $_SESSION['form_data'] =  $diagnose->attributes;
                redirect();
            }
            if ($diagnose->attributes['hit'] == '1'){
                $diagnose->attributes['time_hit'] = date("Y-m-d H:i:s");
            }
            if($id = $diagnose->update('diagnose',$id)){

                $count = \R::count('screening','diagnose_id = ?',[$data['id']]);
                if($data['screening'] && $count){
                    if ($data['female'] == '0'){
                        $data['pregnant'] = '0';
                        $data['not_pregnant'] = '0';
                    }
                    $sql_part = "diagnose_id = {$id},min_age = {$data['min_age']},max_age = {$data['max_age']},male = '{$data['male']}',
                    female = '{$data['female']}',smoking = '{$data['smoking']}',not_smoking = '{$data['not_smoking']}',
                    pregnant = '{$data['pregnant']}',not_pregnant = '{$data['not_pregnant']}', regular = '{$data['regular']}',not_regular = '{$data['not_regular']}'";
                    \R::exec("UPDATE screening SET {$sql_part} WHERE diagnose_id = {$data['id']}");

                }
                else if (($data['screening'] && !$count)){
                    $sql_part = "NULL,{$id},{$data['min_age']},{$data['max_age']},'{$data['male']}','{$data['female']}','{$data['smoking']}','{$data['not_smoking']}','{$data['pregnant']}','{$data['not_pregnant']}','{$data['regular']}','{$data['not_regular']}'";
                   \R::exec("INSERT INTO screening VALUES ({$sql_part})");

                }
                else{
                    \R::exec("DELETE FROM screening WHERE diagnose_id = ?",[$data['id'] ]);

                }
                $alias = AppModel::createAlias('diagnose', 'alias', $data['arm_title'], $id);
                $dg = \R::load('diagnose', $id);
                $dg->alias = $alias;
                \R::store($dg);
                $_SESSION['success'] = 'Diagnose Updated';
                redirect();
            }
            redirect();
        }

        $id = $this->getRequestID();

        $diagnose = \R::getAssoc("SELECT diagnose.*,screening.* FROM diagnose
LEFT JOIN screening ON screening.diagnose_id = diagnose.id
WHERE diagnose.id = ?",[$id]);
        if (!$diagnose){
            throw new \Exception( 'Center => ||' . $id . '||: Not Found');
        }
        $diagnose[key($diagnose)]['id'] = $id;

        $diagnose = $diagnose[key($diagnose)];
        App::$app->setProperty('parent_id', $diagnose['exam_id']);
        $this->setMeta('New diagnose');
        $this->set(compact('diagnose'));
    }

}