<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 7/22/16
 * Time: 7:48 AM
 */

use chapter9\factory_abstract\BertCalCommsManager;
use chapter9\factory_abstract\BloggsCommManager;
use chapter9\factory_abstract\CommsManager;
use chapter9\factory_abstract\MegaCommsManager;

require_once ('CommsManager.php');
require_once ('BloggsCommManager.php');
require_once ('MegaCommsManager.php');

// Pre design pattern usage.
//$comms = new CommsManager();
//$apptEncoder = $comms->getApptEncoder();
//var_dump($apptEncoder->encode());

// Design patttern usage.
$mgr = new BloggsCommManager();
var_dump($mgr->getHeaderText());
var_dump($mgr->getFooterText());
var_dump($mgr->make(1)->encode());
var_dump($mgr->make(2)->encode());
var_dump($mgr->make(3)->encode());
/**
var_dump($mgr->getApptEncoder()->encode());
var_dump($mgr->getContactEncoder()->encode());
var_dump($mgr->getTtdEncoder()->encode());
*/

$mgr2 = new MegaCommsManager();
var_dump($mgr2->getHeaderText());
var_dump($mgr2->getFooterText());
var_dump($mgr2->make(1)->encode());
var_dump($mgr2->make(2)->encode());
var_dump($mgr2->make(3)->encode());

/**
var_dump($mgr2->getApptEncoder()->encode());
var_dump($mgr2->getContactEncoder()->encode());
var_dump($mgr2->getTtdEncoder()->encode());
*/

