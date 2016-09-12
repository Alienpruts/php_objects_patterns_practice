<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 9/10/16
 * Time: 1:58 PM
 */

namespace chapter11\visitor;


abstract class ArmyVisitor {
  abstract function visit(Unit $node);

  public function visitArcher(Archer $node){
    $this->visit($node);
  }

  public function visitCavalry(Cavalry $node) {
    $this->visit($node);
  }

  public function visitLaserCannon(LaserCannon $node) {
    $this->visit($node);
  }

  public function visitTroopCarrier(TroopCarrier $node) {
    $this->visit($node);
  }

  public function visitArmy(Army $node) {
    $this->visit($node);
  }

}