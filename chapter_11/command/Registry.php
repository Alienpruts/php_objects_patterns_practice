<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 9/13/16
 * Time: 11:18 PM
 */

namespace chapter11\command;


class Registry {

  public static function getAccessManager() {
    return new AccessManager();
  }
}