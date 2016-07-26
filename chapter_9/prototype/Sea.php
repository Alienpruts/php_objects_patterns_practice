<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 7/26/16
 * Time: 8:47 AM
 */

namespace chapter9\prototype;


class Sea {
  private $navigability = 0;

  /**
   * Sea constructor.
   */
  public function __construct($navigability) {
    $this->navigability = $navigability;
  }
}