<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 7/19/16
 * Time: 9:43 AM
 */

namespace chapter9;

require_once ('Minion.php');
require_once ('CluedUp.php');
require_once ('WellConnected.php');


abstract class Employee{

  private static $types = ['Minion', 'CluedUp', 'WellConnected'];
  protected $name;

  public function __construct($name) {
    $this->name = $name;
  }

  static function recruit($name) {
    $num = rand(0, count(self::$types) -1);
    $class = self::$types[$num];
    var_dump($class);
    $test = new $class($name);
    return $test;
  }

  abstract function fire();
}