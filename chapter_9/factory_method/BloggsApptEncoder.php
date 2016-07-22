<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 7/20/16
 * Time: 8:18 AM
 */

namespace chapter9\factory_method;

require_once ('ApptEncoder.php');


class BloggsApptEncoder extends ApptEncoder{

  public function encode() {
    return "Appountment data encoded in BloggsCal format";
  }
}

