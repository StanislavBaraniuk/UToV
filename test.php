<?php
/**
 * Created by PhpStorm.
 * User: stanislaw
 * Date: 11/29/18
 * Time: 18:15
 */

require_once "./index.php";

print_r(UtovA::run(["source" => "source.txt", "dest" => "dest.txt"], ["source" => 'file.txt']));