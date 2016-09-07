<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 9/7/16
 * Time: 10:17 PM
 */

namespace chapter11\observer;

use SplObjectStorage;
use SplObserver;

class Login_SPL implements \SplSubject{

  private $storage;

  public function __construct() {
    $this->storage = new SplObjectStorage();
  }

  /**
   * @inheritdoc
   */
  public function attach(SplObserver $observer) {
    $this->storage->attach($observer);
  }

  /**
   * @inheritdoc
   */
  public function detach(SplObserver $observer) {
    $this->storage->detach($observer);
  }

  /**
   * @inheritdoc
   */
  public function notify() {
    foreach ($this->storage as $obs) {
      $obs->update($this);
    }
  }

  public function dummyNotify() {
    $this->notify();
  }
}