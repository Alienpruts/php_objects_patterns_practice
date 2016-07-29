<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 7/28/16
 * Time: 6:02 PM
 */

namespace chapter11\interpreter;


class VariableExpression extends Expression {
  private $name;
  private $val;

  public function __construct($name, $val = NULL) {
    $this->name = $name;
    $this->val = $val;
  }

  public function interpret(InterPreterContext $context) {
    if (!is_null($this->val)) {
      $context->replace($this, $this->val);
      $this->val = NULL;
    }
  }

  public function setValue($value) {
    $this->val = $value;
  }

  public function getKey() {
    return $this->name;
  }


}