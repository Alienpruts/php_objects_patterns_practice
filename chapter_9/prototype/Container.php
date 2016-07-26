<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 7/26/16
 * Time: 9:05 AM
 */

namespace chapter9\prototype;
require_once ('Contained.php');

class Container {

  public $contained;

  /**
   * Container constructor.
   */
  public function __construct() {
    $this->contained = new Contained();
  }

  public function __clone() {
    // Ensure that a cloned object hold a clone of sel::$contained and not a
    // reference to it!
    $this->contained = clone $this->contained;
  }


}