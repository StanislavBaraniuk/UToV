<?php
/**
 * Created by PhpStorm.
 * User: stanislaw
 * Date: 11/30/18
 * Time: 23:59
 */

abstract class UtovA
{
    public static function run ($default = [], $input = [], $registry_independence = true) {
        if (!$registry_independence) {
            foreach ($default as $key => $item) {
                $default[strtoupper($key)] = $item;
                array_splice($default, $key, 1);
            }
        }

        foreach ($default as $key => $item)  {
            if (!isset($input[$registry_independence ? $key : strtoupper($key)])) {
                $input[$registry_independence ? $key : strtoupper($key)] =  $item;
            }
        }

        if (!$registry_independence) {
            foreach ($input as $key => $item) {
                array_splice($input, $key, 1, strtolower($key));
            }
        }

        return $input;
    }
}

class UtovO
{
    public function run ($default = [], $input = [], $registry_independence = true) {
        if (!$registry_independence) {
            foreach ($default as $key => $item) {
                $default[strtoupper($key)] = $item;
                array_splice($default, $key, 1);
            }
        }

        foreach ($default as $key => $item)  {
            if (!isset($input[$registry_independence ? $key : strtoupper($key)])) {
                $input[$registry_independence ? $key : strtoupper($key)] =  $item;
            }
        }

        if (!$registry_independence) {
            foreach ($input as $key => $item) {
                array_splice($input, $key, 1, strtolower($key));
            }
        }

        return $input;
    }
}


