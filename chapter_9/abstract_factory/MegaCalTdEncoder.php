<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 7/25/16
 * Time: 9:05 AM
 */

namespace chapter9\factory_abstract;


class MegaCalTdEncoder extends ApptEncoder{

  function encode() {
    return "Encoded To do list data to MegaCal format";
  }
}