<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 7/18/16
 * Time: 5:43 PM
 */

namespace chapter8;


abstract class CostStrategy {

  abstract public function cost(Lesson $lesson);
  abstract public function chargeType();

}