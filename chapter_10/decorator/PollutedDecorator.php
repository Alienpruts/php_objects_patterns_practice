<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 7/27/16
 * Time: 5:58 PM
 */

namespace chapter10\decorator;


class PollutedDecorator extends TileDecorator {

  public function getWealthFactor() {
    return $this->tile->getWealthFactor() - 4;
  }
}