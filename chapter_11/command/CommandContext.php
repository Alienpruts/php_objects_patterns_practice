<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 9/13/16
 * Time: 11:07 PM
 */

namespace chapter11\command;


class CommandContext {

  private $params = [];
  private $error = '';

  public function __construct() {
    $this->params = $_REQUEST;
  }

  public function addParam($key, $val) {
    $this->params[$key] = $val;
  }

  public function get($key) {
    if (isset($this->params[$key])) {
      return $this->params[$key];
    }

    return NULL;
  }

  public function setError($error) {
    $this->error = $error;
  }

  public function getError() {
    return $this->error;
  }


}