<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 7/18/16
 * Time: 5:44 PM
 */

namespace chapter8;

require_once ('CostStrategy.php');

class TimedCostStrategy extends CostStrategy{
  
  public function cost(Lesson $lesson) {
    return ($lesson->getDuration() * 5);
  }

  public function chargeType() {
    return "hourly rate";
  }

}