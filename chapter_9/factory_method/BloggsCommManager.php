<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 7/22/16
 * Time: 8:02 AM
 */

namespace chapter9\factory_method;

require_once ('CommsManager.php');
require_once ('BloggsApptEncoder.php');
require_once ('BertApptEncoder.php');

class BloggsCommManager extends CommsManager{

  /**
   * @return \chapter9\factory_method\BloggsApptEncoder
   */
  public function getApptEncoder() {
    return new BloggsApptEncoder();
  }

  public function getHeaderText() {
    return "BloggsCal header" . PHP_EOL;

  }

  public function getFooterText() {
    return "BloggsCal footer" . PHP_EOL;
  }
}