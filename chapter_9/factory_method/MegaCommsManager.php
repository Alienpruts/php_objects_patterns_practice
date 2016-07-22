<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 7/22/16
 * Time: 8:11 AM
 */

namespace chapter9\factory_method;

require_once ('CommsManager.php');
require_once ('MegaApptEncoder.php');

class MegaCommsManager extends CommsManager {

  public function getApptEncoder() {
    return new MegaApptEncoder();
  }

  public function getHeaderText() {
    return "MegaCal header" . PHP_EOL;
  }

  public function getFooterText() {
    return "MegaCal footer" . PHP_EOL;
  }
}