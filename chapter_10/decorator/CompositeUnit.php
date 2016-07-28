<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 7/27/16
 * Time: 8:07 AM
 */

namespace chapter10\decorator;


abstract class CompositeUnit extends Unit {

  private $units = [];

  public function getComposite() {
    return $this;
  }

  protected function units() {
    return $this->units;
  }

  public function removeUnit(Unit $unit) {
    $this->units = array_udiff($this->units, array($unit),
      function ($a, $b) {
        return ($a === $b) ? 0 : 1;
      }
    );
  }

  public function addUnit(Unit $unit) {

    if (in_array($unit, $this->units, TRUE)) {
      return;
    }
    $this->units[] = $unit;
  }
}