<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 9/12/16
 * Time: 11:26 PM
 */

namespace chapter11\visitor;


class TaxCollectionVisitor extends ArmyVisitor {

  private $report = '';
  private $due = 0;

  public function visit(Unit $node) {
    $this->levy($node, 1);
  }

  public function visitArcher(Archer $node) {
    $this->levy($node, 2);
  }

  public function visitCavalry(Cavalry $node) {
    $this->levy($node, 3);
  }

  public function visitTroopCarrier(TroopCarrier $node) {
    $this->levy($node, 5);
  }

  public function visitLaserCannon(LaserCannon $node) {
    $this->levy($node, 4);
  }

  private function levy(Unit $unit, $amount) {
    $this->report .= "Tax levied for " . get_class($unit);
    $this->report .= ": $amount" . PHP_EOL;
    $this->due += $amount;
  }

  /**
   * @return string
   */
  public function getReport() {
    return $this->report;
  }

  /**
   * @return int
   */
  public function getDue() {
    return $this->due;
  }


}