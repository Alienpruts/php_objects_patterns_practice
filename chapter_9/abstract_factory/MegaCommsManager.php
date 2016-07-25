<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 7/22/16
 * Time: 8:11 AM
 */

namespace chapter9\factory_abstract;


require_once ('CommsManager.php');
require_once ('MegaApptEncoder.php');
require_once ('MegaCalTdEncoder.php');
require_once('MegaCalContactEncoder.php');

class MegaCommsManager extends CommsManager {

  public function getHeaderText() {
    return "MegaCal header" . PHP_EOL;
  }

  public function getFooterText() {
    return "MegaCal footer" . PHP_EOL;
  }

  // See comment in abstract function as to why these are disabled and
  // replaced by make method.
  /**
  public function getApptEncoder() {
    return new MegaApptEncoder();
  }

  public function getTtdEncoder() {
    return new MegaCalTdEncoder();
  }

  public function getContactEncoder() {
    return new MegaCalContactEncoder();
  }
  **/

  public function make($flag_int) {
    switch ($flag_int) {
      case self::APPT:
        return new MegaApptEncoder();
      case self::TTD:
        return new MegaCalTdEncoder();
      case self::CONTACT:
        return new MegaCalContactEncoder();
    }
  }
}