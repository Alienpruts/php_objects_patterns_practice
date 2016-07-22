<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 7/20/16
 * Time: 8:19 AM
 */

namespace chapter9\factory_method;

require_once ('ApptEncoder.php');

class MegaApptEncoder extends ApptEncoder{

  public function encode() {
    return "Appointment data encoded in MegaCal format";
  }
}