<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 9/5/16
 * Time: 8:03 AM
 */

namespace chapter11\observer;


class Login implements Observable{

  const LOGIN_USER_UNKNOWN = 1;
  const LOGIN_WRONG_PASS = 2;
  const LOGIN_ACCESS = 3;
  private $status = [];
  private $observers = [];
  private $storage;

  public function handleLogin($user, $pass, $ip) {
    $isValid = FALSE;
    // Dummy random method of checking credentials.
    switch (rand(1,3)) {
      case 1 :
        $this->setStatus(self::LOGIN_ACCESS, $user, $ip);
        $isValid = TRUE;
        break;
      case 2 :
        $this->setStatus(self::LOGIN_WRONG_PASS, $user, $ip);
        $isValid = FALSE;
        break;
      case 3 :
        $this->setStatus(self::LOGIN_USER_UNKNOWN, $user, $ip);
        $isValid = FALSE;
        break;
    }
    $this->notify();
    return $isValid;
  }

  private function setStatus($status, $user, $ip) {
    $this->status = [$status, $user, $ip];
  }

  public function getStatus() {
     return $this->status;
   }

  public function attach(Observer $observer) {
    $this->observers[] = $observer;
  }

  public function detach(Observer $observer) {
    $this->observers = array_filter($this->observers,
      function ($a) use ($observer) {return (! ($a === $observer));}
      );
  }

  public function notify() {
    foreach ($this->observers as $obs) {
      $obs->update($this);
    }
  }
}