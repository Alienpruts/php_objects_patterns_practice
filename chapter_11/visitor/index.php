<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 7/27/16
 * Time: 7:58 AM
 */

spl_autoload_register( function ($className) {
  $className = str_replace("chapter11\\visitor\\", "", $className);
  require_once ("{$className}.php");
});

use chapter11\visitor\Archer;
use chapter11\visitor\Archer_problem;
use chapter11\visitor\Army;
use chapter11\visitor\Army_problem;
use chapter11\visitor\Cavalry;
use chapter11\visitor\LaserCannon;
use chapter11\visitor\LaserCannon_problem;
use chapter11\visitor\TaxCollectionVisitor;
use chapter11\visitor\TroopCarrier;
use chapter11\visitor\UnitException;
use chapter11\visitor\UnitScript;
use chapter11\visitor\TextDumpArmyVisitor;


// Testing textDump problem
$test_army = new Army_problem();
$test_army->addUnit(new Archer_problem());
$test_army->addUnit(new LaserCannon_problem());

var_dump($test_army->textDump());


try {
  $main_army = new Army();

  $main_army->addUnit(new Archer());
  $main_army->addUnit(new LaserCannon());
  $main_army->addUnit(new Cavalry());
  $main_army->addUnit(new Cavalry());

  $textdump = new TextDumpArmyVisitor();

  $main_army->accept($textdump);
  var_dump($textdump->getText());

  $taxcollector = new TaxCollectionVisitor();
  $main_army->accept($taxcollector);
  var_dump($taxcollector->getReport());
  var_dump("Total tax due for this unit : " . $taxcollector->getDue());

} catch (UnitException $e) {
  var_dump($e->getMessage());
}


