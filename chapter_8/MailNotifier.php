<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 7/19/16
 * Time: 9:18 AM
 */

namespace chapter8;
require_once ('Notifier.php');

class MailNotifier extends Notifier {

  public function inform($message) {
    var_dump("MAIL notification : {$message}" . PHP_EOL);
  }

}