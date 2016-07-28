<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 7/26/16
 * Time: 6:15 PM
 */

namespace chapter10\decorator;

//require_once ('Unit.php');
//require_once ('UnitException.php');

class LaserCannon extends Unit{

  public function bombardStrength() {
    return 44;
  }

  // Following functions can be either declared here, but has drawback of having
  // to be declared in all Leaf classes (all non composite units in this case)
  // Or, they could be declared in parent class (Unit), but that has drawback
  // that Composition is not enforced, which could lead to problems further down
  // the line.
  /**
  public function addUnit(Unit $unit) {
    throw new UnitException(get_class($unit) . "is a leaf");
  }

  public function removeUnit(Unit $unit) {
    throw new UnitException(get_class($unit) . "is a leaf");
  }
   */
}