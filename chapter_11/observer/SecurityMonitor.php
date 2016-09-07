<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 9/6/16
 * Time: 9:53 PM
 */

namespace chapter11\observer;


class SecurityMonitor extends LoginObserver {
// old solution!!
//class SecurityMonitor implements Observer{

//  public function update(Observable $observable) {
//    $status = $observable->getStatus();
//    var_dump("SecurityMonitor has been called");
//    if ($status[0] == Login::LOGIN_WRONG_PASS) {
//      // send mail to sysadmin
//      var_dump(__CLASS__ . ": Sending mail to sysadmin");
//    }
//  }
  public function doUpdate(Login $login) {
    $status = $login->getStatus();
    if ($status[0] == Login::LOGIN_WRONG_PASS) {
      var_dump("sending mail to sysadmin");
    }
  }
}