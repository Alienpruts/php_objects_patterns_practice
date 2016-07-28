<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 7/27/16
 * Time: 5:40 PM
 */

namespace chapter10\decorator;


class Plains extends Tile{

  private $wealthFactor = 2;

  public function getWealthFactor() {
    return $this->wealthFactor;
  }
}