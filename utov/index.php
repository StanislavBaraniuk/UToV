<?php
/**
 * Created by PhpStorm.
 * User: stanislaw
 * Date: 11/30/18
 * Time: 23:45
 */

function myAutoloader($class_name)
{
    if (!class_exists($class_name))
    {
        include 'classes/' . $class_name . '.php';
    }
}
spl_autoload_register("myAutoloader");

new UtovO();
UtovA::class;