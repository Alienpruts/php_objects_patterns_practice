<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 8/1/16
 * Time: 7:33 PM
 */

namespace chapter11\strategy;


abstract class Marker {

  protected $test;

  public function __construct($test) {
    $this->test = $test;
  }

  abstract function mark($response);


}