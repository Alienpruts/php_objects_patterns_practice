<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 7/29/16
 * Time: 7:59 AM
 */

namespace chapter11\interpreter;


class BooleanOrExpression extends OperatorExpression {
  protected function doInterpret(InterPreterContext $context, $result_l, $result_r) {
    $context->replace($this, $result_l || $result_r);
  }

}