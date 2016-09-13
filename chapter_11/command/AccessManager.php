<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 9/13/16
 * Time: 11:20 PM
 */

namespace chapter11\command;


class AccessManager {

  private $error = '';

  public function __construct() {
  }

  public function login($user, $pass) {
    if (true) {
      // Return anything other than NULL in this example.
      return true;
    } else {
      $this->setError('This is an error');
      return NULL;
    }

  }

  public function getError() {
    return $this->error;
  }

  private function setError($string) {
    $this->error = $string;
  }


}