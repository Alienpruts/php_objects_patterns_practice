<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 8/1/16
 * Time: 7:26 PM
 */

namespace chapter11\strategy;

abstract class Question {

  protected $prompt;
  protected $marker;

  public function __construct($prompt, Marker $marker) {
    $this->prompt = $prompt;
    $this->marker = $marker;
  }

  public function mark($response) {
    return $this->marker->mark($response);

  }

}