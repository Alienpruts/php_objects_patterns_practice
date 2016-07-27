<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 7/27/16
 * Time: 7:58 AM
 */

spl_autoload_register( function ($className) {
  $className = str_replace("chapter10\\composite\\", "", $className);
  require_once ("{$className}.php");
});

use chapter10\composite\Archer;
use chapter10\composite\Army;
use chapter10\composite\Cavalry;
use chapter10\composite\LaserCannon;
use chapter10\composite\TroopCarrier;
use chapter10\composite\UnitException;
use chapter10\composite\UnitScript;

//require_once ('Army.php');
//require_once ('Archer.php');
//require_once ('LaserCannon.php');
//require_once ('UnitScript.php');

try {
  $main_army = new Army();

  $main_army->addUnit(new Archer());
  $main_army->addUnit(new LaserCannon());

  var_dump('Main army attacking with strength : ' . $main_army->bombardStrength());

  $sub_army = new Army();

  $sub_army->addUnit(new Archer());
  $sub_army->addUnit(new Archer());
  $sub_army->addUnit(new Archer());

  var_dump('Sub army attacking with strength : ' . $sub_army->bombardStrength());

// Add the second army to the first.
  $main_army->addUnit($sub_army);

  var_dump('Attacking with strength : ' . $main_army->bombardStrength());

// TODO : test with two new armies the UnitScript methods

  $army1 = new Army();

  $army1->addUnit(new LaserCannon());
  $army1->addUnit(new LaserCannon());

  $army2 = new Army();

  $army2->addUnit(new Archer());

  $unit = new LaserCannon();

//$test = UnitScript::joinExisting($army1, $army2);
  $test = UnitScript::joinExisting($army2, $unit);

  var_dump($test->bombardStrength());

  $troopTransport = new TroopCarrier();
  $troopTransport->addUnit(new Cavalry());
} catch (UnitException $e) {
  var_dump($e->getMessage());
}