<?php
/**
 * Created by PhpStorm.
 * User: stanislaw
 * Date: 12/1/18
 * Time: 17:17
 */

require_once 'LoggerI.php';

class Logger implements LoggerI {

    private $turn = ['error' => false, 'warning' => false];

    public function track($turn = ['error' => false, 'warning' => false])
    {
        $this->turn = $turn;
    }

    function createError($undefind)
    {
        if ($this->turn['error'] && mb_strlen($undefind, 'utf-8') > 0) {
            trigger_error($undefind, E_USER_ERROR);
        }
    }

    function createWarning($undefind)
    {
        if ($this->turn['warning'] && mb_strlen($undefind, 'utf-8') > 0) {
            echo "Warning:".$undefind."\n";
        }
    }
}