<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 7/28/16
 * Time: 5:47 PM
 */

namespace chapter11\interpreter;


class LiteralExpression extends Expression {
  private $value;

  public function __construct($value) {
    $this->value = $value;
  }


  public function interpret(InterPreterContext $context) {
    $context->replace($this, $this->value);
  }
}