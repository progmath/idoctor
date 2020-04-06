<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 24.08.2018
 * Time: 14:52
 */

namespace app\models;
use  PM_Engine\base\Model;


class AppModel extends Model{

    public static function createAlias($table, $field, $str, $id)
    {
        $str = self::str2url($str);
        $res = \R::findOne($table, "$field = ?", [$str]);
        if($res){
            $str = "{$str}-{$id}";
            $res = \R::count($table, "$field = ?", [$str]);
            if($res){
                $str = self::createAlias($table, $field, $str, $id);
            }
        }
        return $str;
    }

    public static function str2url($str)
    {
        // переводим в транслит
        $str = self::rus2translit($str);
        // в нижний регистр
        $str = strtolower($str);
        // заменям все ненужное нам на "-"
        $str = preg_replace('~[^-a-z0-9_]+~u', '-', $str);
        // удаляем начальные и конечные '-'
        $str = trim($str, "-");
        return $str;
    }

    public static function rus2translit($string) {

        $converter = array(

            'а' => 'a',   'б' => 'b',   'в' => 'v',

            'г' => 'g',   'д' => 'd',   'е' => 'e',

            'ё' => 'e',   'ж' => 'zh',  'з' => 'z',

            'и' => 'i',   'й' => 'y',   'к' => 'k',

            'л' => 'l',   'м' => 'm',   'н' => 'n',

            'о' => 'o',   'п' => 'p',   'р' => 'r',

            'с' => 's',   'т' => 't',   'у' => 'u',

            'ф' => 'f',   'х' => 'h',   'ц' => 'c',

            'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',

            'ь' => '\'',  'ы' => 'y',   'ъ' => '\'',

            'э' => 'e',   'ю' => 'yu',  'я' => 'ya',



            'А' => 'A',   'Б' => 'B',   'В' => 'V',

            'Г' => 'G',   'Д' => 'D',   'Е' => 'E',

            'Ё' => 'E',   'Ж' => 'Zh',  'З' => 'Z',

            'И' => 'I',   'Й' => 'Y',   'К' => 'K',

            'Л' => 'L',   'М' => 'M',   'Н' => 'N',

            'О' => 'O',   'П' => 'P',   'Р' => 'R',

            'С' => 'S',   'Т' => 'T',   'У' => 'U',

            'Ф' => 'F',   'Х' => 'H',   'Ц' => 'C',

            'Ч' => 'Ch',  'Ш' => 'Sh',  'Щ' => 'Sch',

            'Ь' => '\'',  'Ы' => 'Y',   'Ъ' => '\'',

            'Э' => 'E',   'Ю' => 'Yu',  'Я' => 'Ya',





            'ա' => 'a',   'բ' => 'b',   'գ' => 'g',

            'դ' => 'd',   'ե' => 'e',   'զ' => 'z',

            'է' => 'e',   'ը' => 'y',  'թ' => 't',

            'ժ' => 'j',   'ի' => 'i',   'լ' => 'l',

            'խ' => 'kh',   'ծ' => 'ts',   'կ' => 'k',

            'հ' => 'h',   'ձ' => 'dz',   'ղ' => 'gh',

            'ճ' => 'tsh',   'մ' => 'm',   'յ' => 'y',

            'ն' => 'n',   'շ' => 'sh',   'ո' => 'o',

            'չ' => 'ch',  'պ' => 'p',  'ջ' => 'j',

            'ռ' => 'r',  'ս'=> 's',   'վ' => 'v',

            'տ' => 't',   'ր' => 'r',  'ց' => 'ts',

            'ու' => 'u',   'փ' => 'p',  'ք' => 'q',

            'և' => 'ev',   'օ' => 'o',  'ֆ' => 'f',



            'Ա' => 'A',   'Բ' => 'B',   'Գ' => 'G',

            'Դ' => 'D',   'Ե' => 'E',   'Զ' => 'Z',

            'Է' => 'E',   'Ը' => 'Y',  'Թ' => 'T',

            'Ժ' => 'J',   'Ի' => 'I',   'Լ' => 'L',

            'Խ' => 'KH',   'Ծ' => 'TS',   'Կ' => 'K',

            'Հ' => 'H',   'Ձ' => 'DZ',   'Ղ' => 'GH',

            'Ճ' => 'TSH',   'Մ' => 'M',   'Յ' => 'Y',

            'Ն' => 'N',   'Շ' => 'SH',   'Ո' => 'O',

            'Չ' => 'CH',  'Պ' => 'P',  'Ջ' => 'J',

            'Ռ' => 'R',  'Ս'=> 'S',   'Վ' => 'V',

            'Տ' => 'T',   'Ր' => 'R',  'Ց' => 'TS',

            'ՈՒ' => 'U',   'Փ' => 'P',  'Ք' => 'Q',

            'ԵՎ' => 'EV',   'Օ' => 'O',  'Ֆ' => 'F',

        );

        return strtr($string, $converter);

    }
    public function getImg(){
        if(!empty($_SESSION['single'])){
            $this->attributes['img'] = $_SESSION['single'];
            unset($_SESSION['single']);
        }

    }
    public function uploadImg($name, $wmax, $hmax){
        $uploaddir = WWW . '/images/';
        $ext = strtolower(preg_replace("#.+\.([a-z]+)$#i", "$1", $_FILES[$name]['name'])); // расширение картинки
        $types = array("image/gif", "image/png", "image/jpeg", "image/pjpeg", "image/x-png"); // массив допустимых расширений
        if($_FILES[$name]['size'] > 1048576){
            $res = array("error" => "Error! Max Size of File - 1 MB!");
            exit(json_encode($res));
        }
        if($_FILES[$name]['error']){
            $res = array("error" => "Error! The file may be too large.");
            exit(json_encode($res));
        }
        if(!in_array($_FILES[$name]['type'], $types)){
            $res = array("error" => "Allowed extensions - .gif, .jpg, .png");
            exit(json_encode($res));
        }
        $new_name = md5(time()).".$ext";
        $uploadfile = $uploaddir.$new_name;
        if(@move_uploaded_file($_FILES[$name]['tmp_name'], $uploadfile)){
            if($name == 'single'){
                $_SESSION['single'] = $new_name;
            }else{
                $_SESSION['multi'][] = $new_name;
            }
            self::resize($uploadfile, $uploadfile, $wmax, $hmax, $ext);
            $res = array("file" => $new_name);
            exit(json_encode($res));
        }
    }
    public static function resize($target, $dest, $wmax, $hmax, $ext){
        list($w_orig, $h_orig) = getimagesize($target);
        $ratio = $w_orig / $h_orig; // =1 - квадрат, <1 - альбомная, >1 - книжная

        if(($wmax / $hmax) > $ratio){
            $wmax = $hmax * $ratio;
        }else{
            $hmax = $wmax / $ratio;
        }

        $img = "";
        // imagecreatefromjpeg | imagecreatefromgif | imagecreatefrompng
        switch($ext){
            case("gif"):
                $img = imagecreatefromgif($target);
                break;
            case("png"):
                $img = imagecreatefrompng($target);
                break;
            default:
                $img = imagecreatefromjpeg($target);
        }
        $newImg = imagecreatetruecolor($wmax, $hmax); // создаем оболочку для новой картинки

        if($ext == "png"){
            imagesavealpha($newImg, true); // сохранение альфа канала
            $transPng = imagecolorallocatealpha($newImg,0,0,0,127); // добавляем прозрачность
            imagefill($newImg, 0, 0, $transPng); // заливка
        }

        imagecopyresampled($newImg, $img, 0, 0, 0, 0, $wmax, $hmax, $w_orig, $h_orig); // копируем и ресайзим изображение
        switch($ext){
            case("gif"):
                imagegif($newImg, $dest);
                break;
            case("png"):
                imagepng($newImg, $dest);
                break;
            default:
                imagejpeg($newImg, $dest);
        }
        imagedestroy($newImg);
    }
}