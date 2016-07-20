<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 7/19/16
 * Time: 4:57 PM
 */

namespace chapter9;

require_once ('Employee.php');

class WellConnected extends Employee{

  public function fire() {
    var_dump("({$this->name}) : I'll call my dad" . PHP_EOL);
  }
}