<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 7/26/16
 * Time: 9:21 AM
 */


use chapter9\singleton_abstract_factory\AppConfig;

require_once ('AppConfig.php');
var_dump(new AppConfig());

$commsManager = AppConfig::getInstance()->getCommsManager();
var_dump($commsManager->getApptEncoder()->encode());