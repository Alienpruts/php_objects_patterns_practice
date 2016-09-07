<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 9/5/16
 * Time: 8:16 AM
 */

namespace chapter11\observer;


interface Observable {
  public function attach(Observer $observer);

  public function detach(Observer $observer);

  public function notify();

}