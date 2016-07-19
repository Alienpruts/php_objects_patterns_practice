<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 7/18/16
 * Time: 5:41 PM
 */

namespace chapter8;


abstract class Lesson {
  private $duration;
  private $costStrategy;


  /**
   * Lesson constructor.
   * @param $duration
   * @param \chapter8\CostStrategy $strategy
   */
  public function __construct($duration, CostStrategy $strategy) {
    $this->costStrategy = $strategy;
    $this->duration = $duration;
  }

  public function cost() {
    return $this->costStrategy->cost($this);
  }

  public function chargeType() {
    return $this->costStrategy->chargeType();
  }

  public function getDuration() {
    return $this->duration;
  }
}