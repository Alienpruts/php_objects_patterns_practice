<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 7/25/16
 * Time: 9:06 AM
 */

namespace chapter9\factory_abstract;


class MegaCalContactEncoder extends ApptEncoder{

  function encode() {
    return "Encoded Contact data to Megacal format";
  }
}