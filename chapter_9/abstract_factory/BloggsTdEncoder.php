<?php

/**
 * Created by PhpStorm.
 * User: bert
 * Date: 7/25/16
 * Time: 9:01 AM
 */
namespace chapter9\factory_abstract;

require_once ('TdEncoder.php');

class BloggsTdEncoder extends TdEncoder{

  function encode() {
    return "Encoded To Do list data to BloggsCal format";
  }
}