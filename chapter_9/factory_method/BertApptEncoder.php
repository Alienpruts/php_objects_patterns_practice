<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 7/22/16
 * Time: 8:16 AM
 */

namespace chapter9\factory_method;

require_once ('ApptEncoder.php');

class BertApptEncoder extends ApptEncoder {

  public function encode() {
    return "Encoded yo' appointment to BertCalender format, yo";
  }
}