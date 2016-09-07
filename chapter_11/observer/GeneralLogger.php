<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 9/6/16
 * Time: 10:34 PM
 */

namespace chapter11\observer;


class GeneralLogger extends LoginObserver {

  public function doUpdate(Login $login) {
    $status = $login->getStatus();
    var_dump("Adding data to log!");
  }
}