<?php
/**
 * Created by PhpStorm.
 * User: stanislaw
 * Date: 11/29/18
 * Time: 18:10
 */

require_once 'Logger.php';

abstract class UtovA
{
    private static $log = null;

    public static function run ($default = [], $input = [], $logger = 0) {

        switch ($logger) {
            case 0;
                // Off log
                self::clearElse($default,$input);
                break;
            case 1:
                self::set_logging(['error' => false, 'warning' => true],$default,$input);
                break;
            case 2:
                self::set_logging(['error' => true, 'warning' => false],$default,$input);
                break;
            default:
                trigger_error("Logger type '".$logger."' is undefined", E_USER_ERROR);
        }

        foreach ($default as $key => $item)  {
            if (!isset($input[$key])) {
                $input[$key] =  $item;
            }
        }

        return $input;
    }

    private static function set_logging ($log_typing, $default, $input) {
        $report = '';

        self::$log = new Logger();
        self::$log->track($log_typing);

        foreach ($input as $key => $item)  {
            if (!isset($default[$key])) {
                $report .= ' "'.$key.'" with value = "'.$item.'" undefined;';
                unset($item);
            }
        }

        self::$log->createWarning($report);
        self::$log->createError($report);
    }

    private  static function clearElse ($default, &$input) {
        foreach ($input as $key => &$item)  {
            if (!isset($default[$key])) {
                unset($item);
            }
        }
    }
}