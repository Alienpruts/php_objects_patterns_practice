<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 9/10/16
 * Time: 2:04 PM
 */

namespace chapter11\visitor;


class TextDumpArmyVisitor extends ArmyVisitor {
  private $text = "";

  public function visit(Unit $node) {
    $txt = '';
    $pad = 4 * $node->getDepth();
    $txt .= sprintf("%{$pad}s", "");
    $txt .= get_class($node) . ": ";
    $txt .= "bombard: " . $node->bombardStrength() . PHP_EOL;
    $this->text .= $txt;
  }

  public function getText() {
    return $this->text;
  }
}