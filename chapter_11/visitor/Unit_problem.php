<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 7/26/16
 * Time: 6:14 PM
 */

namespace chapter11\visitor;


abstract class Unit_problem {
  abstract function bombardStrength();

  public function getComposite() {
    return null;
  }

  // Following functions can be either declared in Leaf classes, but has drawback of having
  // to be declared in all Leaf classes (all non composite units in this case)
  // Or, they could be declared in this parent class (Unit), but that has drawback
  // that Composition is not enforced, which could lead to problems further down
  // the line.

  // These  are commented in favour of getComposite method.
  /**
  public function addUnit(Unit $unit) {
    throw new UnitException(get_class($unit) . "is a leaf");
  }

  public function removeUnit(Unit $unit){
    throw new UnitException(get_class($unit) . "is a leaf");
  }
   */

  // We need to dump textual information about all units. We COULD add this to the
  // anstract class and override every Unit class to display specific info
  public function textDump($num = 0) {
    $txtOut = '';
    $pad = 4 * $num;
    $txtOut .= sprintf("%{$pad}s", "");
    $txtOut .= get_class($this) . ": ";
    $txtOut .= "bombard: " . $this->bombardStrength() . PHP_EOL;
    return $txtOut;
  }

}