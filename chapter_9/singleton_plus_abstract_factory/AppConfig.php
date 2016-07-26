<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 7/26/16
 * Time: 9:16 AM
 */

namespace chapter9\singleton_abstract_factory;

use chapter9\factory_method\MegaCommsManager;
use chapter9\factory_method\BloggsCommManager;
use chapter9\singleton_abstract_factory\Settings;

require_once ('../factory_method/MegaCommsManager.php');
require_once ('../factory_method/BloggsCommManager.php');
require_once ('Settings.php');

class AppConfig {
  private static $instance;
  private $commsManager;

  public function __construct() {
    // Will run only once !
    $this->init();
  }

  private function init() {
    switch (Settings::$COMMSTYPE) {
      case 'Mega':
        $this->commsManager = new MegaCommsManager();
        break;
      case 'Bloggs':
        $this->commsManager = new BloggsCommManager();
        break;
    }
  }

  public static function getInstance() {
    if (empty(self::$instance)) {
      self::$instance = new self();
    }
    return self::$instance;
  }

  public function getCommsManager() {
    return $this->commsManager;

  }

}