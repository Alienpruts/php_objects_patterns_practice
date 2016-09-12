<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 7/27/16
 * Time: 8:07 AM
 */

namespace chapter11\visitor;


abstract class CompositeUnit_problem extends Unit_problem {

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

  public function addUnit(Unit_problem $unit) {

    if (in_array($unit, $this->units, TRUE)) {
      return;
    }
    $this->units[] = $unit;
  }

  // Overriding txtDump from Abstract class, as this COULD be solution!!
  public function textDump($num = 0) {
    var_dump('Hi, Im the CompositeUnit textDump method');
    $txtout =  parent::textDump($num);
    foreach ($this->units as $unit) {
      $txtout .= $unit->textDump($num + 1);
    }

    return $txtout;
  }


}