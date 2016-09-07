<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 9/7/16
 * Time: 10:26 PM
 */

namespace chapter11\observer;


use SplObserver;
use SplSubject;

abstract class LoginObserver_SPL implements SplObserver {
  private $login;

  public function __construct( Login_SPL $login) {
    $this->login = $login;
    $login->attach($this);
  }

  public function update(SplSubject $subject) {
    if ($subject === $this->login) {
      $this->doUpdate($subject);
    }
  }

  abstract function doUpdate( Login_SPL $login);


}