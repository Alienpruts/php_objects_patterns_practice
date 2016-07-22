<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 7/22/16
 * Time: 7:48 AM
 */

use chapter9\factory_method\BertCalCommsManager;
use chapter9\factory_method\BloggsCommManager;
use chapter9\factory_method\CommsManager;
use chapter9\factory_method\MegaCommsManager;

require_once ('CommsManager.php');
require_once ('BloggsCommManager.php');
require_once ('MegaCommsManager.php');
require_once ('BertCalCommsManager.php');

// Pre design pattern usage.
//$comms = new CommsManager();
//$apptEncoder = $comms->getApptEncoder();
//var_dump($apptEncoder->encode());

// Design patttern usage.
$mgr = new BloggsCommManager();
var_dump($mgr->getHeaderText());
var_dump($mgr->getApptEncoder()->encode());
var_dump($mgr->getFooterText());

$mgr2 = new MegaCommsManager();
var_dump($mgr2->getHeaderText());
var_dump($mgr2->getApptEncoder()->encode());
var_dump($mgr2->getFooterText());

$mgr3 = new BertCalCommsManager();
var_dump($mgr3->getHeaderText());
var_dump($mgr3->getApptEncoder()->encode());
var_dump($mgr3->getFooterText());
