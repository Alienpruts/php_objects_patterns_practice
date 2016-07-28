<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 7/26/16
 * Time: 6:16 PM
 */

namespace chapter10\decorator;

//require_once ('Unit.php');
//require_once ('CompositeUnit.php');

class Army extends CompositeUnit {

  private $units = [];
  // Problem illustration.
  //private $armies = [];



// Probmem illustration.
/**
  public function bombardStrength() {
    $ret = 0;
    foreach ($this->units as $unit) {
      $ret += $unit->bombardStrength();
    }

    foreach ($this->armies as $army) {
      $ret += $army->bombardStrength();
    }

    return $ret;
  }
 */

// Problem illustration.
/**
  public function addArmy(Army $army) {
    array_push($this->armies, $army);
  }
*/
  public function bombardStrength() {
    $ret = 0;
    foreach (parent::units() as $unit) {
      $ret += $unit->bombardStrength();
    }

    return $ret;
  }


}