<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 7/19/16
 * Time: 9:45 AM
 */

namespace chapter9;

class NastyBoss {

  private $employees;

  public function addEmployee(Employee $employee) {
    // We limit flexibility by directly instantiating a Minion here.
    // $this->employees[] = new Minion($employeeName);
    $this->employees[] = $employee;
  }

  public function projectFails() {
    if (count($this->employees) > 0 ){
      $emp = array_pop($this->employees);
      $emp->fire();
    }

  }
}