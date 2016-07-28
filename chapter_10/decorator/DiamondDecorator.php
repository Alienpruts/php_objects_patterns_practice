<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 7/27/16
 * Time: 5:56 PM
 */

namespace chapter10\decorator;


class DiamondDecorator extends TileDecorator {

  public function getWealthFactor() {
    return $this->tile->getWealthFactor() + 2;
  }
}