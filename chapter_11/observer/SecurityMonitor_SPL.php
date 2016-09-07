<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 9/6/16
 * Time: 9:53 PM
 */

namespace chapter11\observer;


class SecurityMonitor_SPL extends LoginObserver_SPL {
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
  public function doUpdate(Login_SPL $login) {
    var_dump('Hi, I\'m SecurityMonitorSPL and this is Jackass');
  }
}