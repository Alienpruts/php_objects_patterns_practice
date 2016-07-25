<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 7/20/16
 * Time: 8:20 AM
 */

namespace chapter9\factory_abstract;

abstract class CommsManager {
  const APPT = 1;
  const TTD = 2;
  const CONTACT = 3;

  abstract function getHeaderText();
  abstract function getFooterText();
  //abstract function getApptEncoder();
  //abstract function getTtdEncoder();
  //abstract function getContactEncoder();

  // Instead of creating seperate methods for each object creation we can
  // leverage unenforeced return types of PHP by selecting on the fly what
  // object to create.
  abstract function make($flag_int);
}
