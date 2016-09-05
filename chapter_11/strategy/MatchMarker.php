<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 8/1/16
 * Time: 7:38 PM
 */

namespace chapter11\strategy;


class MatchMarker extends Marker{

  public function mark($response) {
    return ($this->test == $response);
  }


}