<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 7/20/16
 * Time: 8:00 AM
 */

namespace chapter9\singleton;


class Preferences {

  private static $instance;
  private $props = [];

  private function __construct() {
  }

  public static function getInstance() {
    if (empty(self::$instance)) {
      self::$instance = new Preferences();
    }
    return self::$instance;
  }

  public function setProperty($key, $val) {
    $this->props[$key] = $val;
  }

  public function getProperty($key) {
    return $this->props[$key];
  }
}
