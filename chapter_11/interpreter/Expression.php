<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 7/28/16
 * Time: 5:44 PM
 */

namespace chapter11\interpreter;


abstract class Expression {
  private static $keycount = 0;
  private $key;

  abstract function interpret(InterPreterContext $context);

  public function getKey() {
    if (!isset($this->key)) {
      self::$keycount++;
      $this->key = self::$keycount;
    }
    return $this->key;
  }
}