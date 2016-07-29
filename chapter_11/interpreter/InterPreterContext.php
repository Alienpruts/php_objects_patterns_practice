<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 7/28/16
 * Time: 5:48 PM
 */

namespace chapter11\interpreter;


class InterPreterContext {

  private $expressionstore = [];

  public function replace(Expression $expr, $value) {
    $this->expressionstore[$expr->getKey()] = $value;
  }

  public function lookup( Expression $exp) {
      return $this->expressionstore[$exp->getKey()];
  }


}