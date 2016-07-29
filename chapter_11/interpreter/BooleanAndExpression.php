<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 7/29/16
 * Time: 8:01 AM
 */

namespace chapter11\interpreter;


class BooleanAndExpression  extends OperatorExpression {
  protected function doInterpret(InterPreterContext $context, $result_l, $result_r) {
    $context->replace($this, $result_l && $result_r);
  }

}