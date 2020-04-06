<?php
/**
 * Created by PhpStorm.
 * User: Progm
 * Date: 7/16/2018
 * Time: 12:23 AM
 */

namespace PM_Engine;


class ErrorHandler
{
    public function __construct()
    {
        if (DEBUG){  // DEBUG is constant -> DEBUG = 1 - dev status || 0 - production status
            error_reporting(-1); // show all error messages
        }
        else{
            error_reporting(0);
        }
        set_exception_handler([$this, 'exceptionHandler']);

    }

    public function exceptionHandler($e){
        $this->logErrors($e->getMessage(),$e->getFile(),$e->getLine());
        $this->displayError('Exception',$e->getMessage(),$e->getFile(),$e->getLine(),$e->getCode());
    }

    protected function logErrors($message = '', $file = '', $line = ''){
        error_log(
            "[" . date('Y-m-d:i:s') . "] 
            Error Message: {$message} | 
            File: {$file} | 
            On Line: {$line}\n===================================================\n",
            3,
            ROOT . '/temp/errors.log'
        );
    }

    protected function displayError($errno, $errstr, $errfile, $errline, $responce = 404){
        http_response_code($responce);
        if ($responce == 404 && !DEBUG ){
            require WWW . '/errors/404.php';
            die;
        }
        if (DEBUG){
            require WWW . '/errors/dev.php';

        }
        else{
            require WWW . '/errors/prod.php';

        }
        die;
    }

}