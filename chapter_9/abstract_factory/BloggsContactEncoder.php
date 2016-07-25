<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 7/25/16
 * Time: 9:03 AM
 */

namespace chapter9\factory_abstract;

require_once ('ContactEncoder.php');

class BloggsContactEncoder extends ContactEncoder{

  function encode() {
    return "Encoding Contact data to BloggsCal format";
  }
}