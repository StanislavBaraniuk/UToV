<?php
/**
 * Created by PhpStorm.
 * User: stanislaw
 * Date: 12/1/18
 * Time: 17:19
 */

interface LoggerI {
    public function track ($turn = false);
    function createError($undefind);
    function createWarning($undefind);
}