<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 7/20/16
 * Time: 8:20 AM
 */

namespace chapter9\factory_method;

abstract class CommsManager {

  abstract function getApptEncoder();
  abstract function getHeaderText();
  abstract function getFooterText();
}
