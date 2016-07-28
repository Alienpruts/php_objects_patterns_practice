<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 7/27/16
 * Time: 5:44 PM
 */

namespace chapter10\decorator;


class DiamondPlains extends Plains {

  public function getWealthFactor() {
    return parent::getWealthFactor() + 2;
  }


}