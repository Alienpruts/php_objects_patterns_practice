<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 7/19/16
 * Time: 9:12 AM
 */

namespace chapter8;

require_once 'Notifier.php';

class RegistrationMgr {

  public function register( Lesson $lesson) {
    // Do something (registration) with this lesson.
    // Now tell someone.

    $notifier = Notifier::getNotifier();
    $notifier->inform("new lesson: cost ({$lesson->cost()})");
  }

}