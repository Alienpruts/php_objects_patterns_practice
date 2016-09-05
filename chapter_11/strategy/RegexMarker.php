<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 8/1/16
 * Time: 7:39 PM
 */

namespace chapter11\strategy;


class RegexMarker extends Marker{

  public function mark($response) {
    return (preg_match($this->test, $response));
  }


}