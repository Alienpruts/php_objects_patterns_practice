<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 7/22/16
 * Time: 8:15 AM
 */

namespace chapter9\factory_method;

require_once ('CommsManager.php');

class BertCalCommsManager extends CommsManager {

  public function getApptEncoder() {
    return new BertApptEncoder();
  }

  public function getHeaderText() {
    return "BertCal dun' no need no Headers, yo";
  }

  public function getFooterText() {
    return "BertCal dun' no need no Footers, yo";
  }
}