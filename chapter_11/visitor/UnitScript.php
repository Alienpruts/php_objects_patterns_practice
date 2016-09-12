<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 7/27/16
 * Time: 8:21 AM
 */

namespace chapter11\visitor;

//require_once ('Army.php');

class UnitScript {

  static function joinExisting(Unit $newUnit, Unit $occupyingUnit) {
    $comp = NULL;

    // Check whether occupying unit is a Composite, if so, add newunit.
    // Else : create a brand new Composite with both units.
    if (!is_null($comp = $occupyingUnit->getComposite())) {
      $comp->addUnit($newUnit);
    } else {
      $comp = new Army();
      $comp->addUnit($occupyingUnit);
      $comp->addUnit($newUnit);
    }

    return $comp;

  }
}