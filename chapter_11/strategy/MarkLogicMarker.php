<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 8/1/16
 * Time: 7:35 PM
 */

namespace chapter11\strategy;


class MarkLogicMarker extends Marker{

  private $engine;

  public function __construct($test) {
    parent::__construct($test);
    //$this->engine = new MarkParse($test);
  }


  public function mark($response) {
    //return $this->engine->evaluate($response);
    // Dummy return value.
    return true;
  }


}