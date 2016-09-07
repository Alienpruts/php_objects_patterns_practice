<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 9/6/16
 * Time: 10:19 PM
 */

namespace chapter11\observer;


abstract class LoginObserver implements Observer {

  private $login;

  public function __construct(Login $login) {
    $this->login = $login;
    $login->attach($this);
  }

  public function update(Observable $observable) {
    if ($observable === $this->login) {
      $this->doUpdate($observable);
    }
  }

  abstract function doUpdate(Login $login);


}