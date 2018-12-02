<?php
/**
 * Created by PhpStorm.
 * User: stanislaw
 * Date: 11/29/18
 * Time: 18:10
 */

require_once 'Logger.php';

class UtovO
{
    private $log = null;

    public function run ($default = [], $input = [], $logger = 0, $reg = true) {

        switch ($logger) {
            case 0;
                // Off log
                $this->clearElse($default, $input);
                break;
            case 1:
                $this->set_logging(['error' => false, 'warning' => true],$default,$input);
                break;
            case 2:
                $this->set_logging(['error' => true, 'warning' => false],$default,$input);
                break;
            default:
                trigger_error("Logger type '".$logger."' is undefined", E_USER_ERROR);
        }

        if (!$reg) {
            $this->keyToReg($default, $input, 1);
        }


        foreach ($default as $key => $item)  {
            if (!isset($input[$key])) {
                $input[$key] =  $item;
            }
        }

        if (!$reg) {
            $this->keyToReg($default, $input, 1);
        }


        return $input;
    }

    private function set_logging ($log_typing, $default, $input) {
        $report = '';

        $this->log = new Logger();
        $this->log->track($log_typing);

        foreach ($input as $key => $item)  {
            if (!isset($default[$key])) {
                $report .= ' "'.$key.'" with value = "'.$item.'" undefined;';
                unset($item);
            }
        }

        $this->log->createWarning($report);
        $this->log->createError($report);
    }

    private function clearElse ($default, &$input) {
        foreach ($input as $key => &$item)  {
            if (!isset($default[$key])) {
                unset($item);
            }
        }
    }

    private function keyToReg(&$default,&$input, $reg) {
        $time_d = [];
        $time_i = [];

        foreach ($default as $key => $item) {
            $time_d[$reg == 1 ? strtoupper($key) : strtolower($key)] = $item;
        }
        foreach ($input as $key => $item) {
            $time_i[$reg == 1 ? strtoupper($key) : strtolower($key)] = $item;
        }

        $default = $time_d;
        $input = $time_i;

        unset($time_d);
        unset($time_i);
    }
}