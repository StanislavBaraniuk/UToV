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

    public function run ($default = [], $input = [], $logger = 0) {

        switch ($logger) {
            case 0;
                // Off log
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

        foreach ($default as $key => $item)  {
            if (!isset($input[$key])) {
                $input[$key] =  $item;
            }
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
            }
        }

        $this->log->createWarning($report);
        $this->log->createError($report);
    }
}