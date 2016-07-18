<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 7/12/16
 * Time: 7:55 AM
 */

namespace somename\packagename\useful;


class Outputter {

  static function helloWorld() {
    var_dump("Hello my friend, I welcome you to " . __NAMESPACE__ . PHP_EOL);
  }
}