<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 7/22/16
 * Time: 8:02 AM
 */

namespace chapter9\factory_abstract;

require_once ('CommsManager.php');
require_once ('BloggsApptEncoder.php');
require_once ('BloggsTdEncoder.php');
require_once ('BloggsContactEncoder.php');

class BloggsCommManager extends CommsManager{

  public function getHeaderText() {
    return "BloggsCal header" . PHP_EOL;

  }

  public function getFooterText() {
    return "BloggsCal footer" . PHP_EOL;
  }

  // See abstract comments as to why these are disabled! and replaced by
  // single make method.
  /**
  public function getApptEncoder() {
    return new BloggsApptEncoder();
  }

  function getTtdEncoder() {
    return new BloggsTdEncoder();
  }

  function getContactEncoder() {
    return new BloggsContactEncoder();
  }
  **/

  public function make($flag_int) {
    switch ($flag_int) {
      case self::APPT:
        return new BloggsApptEncoder();
      case self::TTD:
        return new BloggsTdEncoder();
      case self::CONTACT:
        return new BloggsContactEncoder();
    }
  }
}