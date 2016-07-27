<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 7/27/16
 * Time: 4:07 PM
 */

namespace chapter10\composite;

//require_once ('Cavalry.php');

class TroopCarrier extends CompositeUnit {

  public function bombardStrength() {
    return 0;
  }

  public function addUnit(Unit $unit) {
    // We do not allow Cavalry Units in the TroopCarrier.
    if ($unit instanceof Cavalry) {
      throw new UnitException("Can't get a horse on the vehicle");
    }

    parent::addUnit($unit);

  }


}