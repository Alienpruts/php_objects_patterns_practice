<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 7/28/16
 * Time: 8:08 AM
 */

namespace chapter10\facade;


class Product {
  private $id;
  private $name;

  /**
   * Product constructor.
   * @param $id
   * @param $name
   */
  public function __construct($id, $name) {
    $this->id = $id;
    $this->name = $name;
  }


}