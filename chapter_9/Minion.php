<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 7/19/16
 * Time: 9:44 AM
 */

namespace chapter9;

require_once ('Employee.php');


class Minion extends Employee{

  public function fire() {
    var_dump("$this->name : I'll clear my desk :( " . PHP_EOL);
  }
}