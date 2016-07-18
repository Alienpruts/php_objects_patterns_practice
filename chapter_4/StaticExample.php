<?php

/**
 * Created by PhpStorm.
 * User: bert
 * Date: 7/6/16
 * Time: 8:00 AM
 */
class StaticExample {
  static public $aNum = 0;
  static public function sayHello(){
    self::$aNum++;
    var_dump("Hello (" . self::$aNum .")" . PHP_EOL);
  }
}

StaticExample::sayHello();
var_dump(StaticExample::$aNum);