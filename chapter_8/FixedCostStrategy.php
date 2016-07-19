<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 7/18/16
 * Time: 5:49 PM
 */

namespace chapter8;

require_once ('CostStrategy.php');

class FixedCostStrategy extends CostStrategy{

  public function cost(Lesson $lesson) {
    return 30;
  }

  public function chargeType() {
    return 'fixed rate';
  }

}