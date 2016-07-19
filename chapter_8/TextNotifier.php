<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 7/19/16
 * Time: 9:20 AM
 */

namespace chapter8;
require_once ('Notifier.php');

class TextNotifier extends Notifier {

  public function inform($message) {
    var_dump("TEXT notification : {$message}" . PHP_EOL);
  }

}