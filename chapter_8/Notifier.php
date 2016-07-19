<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 7/19/16
 * Time: 9:14 AM
 */

namespace chapter8;

require_once ('TextNotifier.php');
require_once ('MailNotifier.php');

abstract class Notifier {

  public static function getNotifier() {
    // Acquire concrete class according to config or logic.

    if (rand(1,2) === 1) {
      return new MailNotifier();
    }

    return new TextNotifier();
  }

  abstract public function inform($message);

}