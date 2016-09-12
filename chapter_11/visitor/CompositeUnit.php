<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 7/27/16
 * Time: 8:07 AM
 */

namespace chapter11\visitor;


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

  // Previous addUnit method.
/*  public function addUnit(Unit $unit) {

    if (in_array($unit, $this->units, TRUE)) {
      return;
    }
    $this->units[] = $unit;
  }  */


  public function addUnit(Unit $unit) {
    foreach ($this->units as $thisunit) {
      if ($unit === $thisunit) {
        return;
      }
    }
    $this->setDepth($this->depth + 1);
    $this->units[] = $unit;
  }


}