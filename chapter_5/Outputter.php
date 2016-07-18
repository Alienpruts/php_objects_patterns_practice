<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 7/12/16
 * Time: 7:55 AM
 */

namespace alienpruts\chapter5\my;
// use the namespace directly, saves you from long typing.
use \somename\packagename\useful\Outputter as uOutputter;
// COuld be useeful to add your own package directory to the include path.
// If realtive or absolute require / include is not found, it will search the
// include paths also
set_include_path( get_include_path() . PATH_SEPARATOR . "/home/john/phplib/");
require_once "useful/Outputter_2.php";

class Outputter {

  static function helloWorld() {
    var_dump("Hello my friend, I welcome you to " . __NAMESPACE__ . PHP_EOL);
  }
}

Outputter::helloWorld();

// Above is identical to below, since you are IN this namespace.
\alienpruts\chapter5\my\Outputter::helloWorld();

// Below will not work because of relativity.
//alienpruts\chapter5\my\Outputter::helloWorld();


// Full name, for use without use statement.
\somename\packagename\useful\Outputter::helloWorld();
// Below for use with use statement.
uOutputter::helloWorld();