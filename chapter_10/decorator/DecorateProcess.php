<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 7/27/16
 * Time: 6:07 PM
 */

namespace chapter10\decorator;


abstract class DecorateProcess extends ProcessRequest {

  protected $processrequest;

  public function __construct(ProcessRequest $pr) {
    $this->processrequest = $pr;
  }
}