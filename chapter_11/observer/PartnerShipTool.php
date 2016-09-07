<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 9/6/16
 * Time: 10:35 PM
 */

namespace chapter11\observer;


class PartnerShipTool extends LoginObserver {

  public function doUpdate(Login $login) {
    $status = $login->getStatus();
    var_dump("Setting cookie if IP matches a list!");
  }
}