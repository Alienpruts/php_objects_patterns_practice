<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 7/26/16
 * Time: 6:14 PM
 */

namespace chapter11\visitor;

use ReflectionClass;

abstract class Unit {

  protected $depth;

  abstract function bombardStrength();

  public function getComposite() {
    return null;
  }

  public function accept(ArmyVisitor $visitor) {
    $class = new ReflectionClass(get_class($this));
    $class_name = $class->getShortName();
    $method = "visit" . $class_name;
    $visitor->$method($this);
  }

  protected function setDepth($depth) {
    $this->depth = $depth;
  }

  public function getDepth() {
    return $this->depth;
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

}