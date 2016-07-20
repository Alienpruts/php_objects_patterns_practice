<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 7/19/16
 * Time: 4:48 PM
 */

namespace chapter9;

require_once ('Employee.php');

class CluedUp extends Employee{

  public function fire() {
    var_dump("({$this->name}) : I'll call my lawyer" . PHP_EOL);
  }
}