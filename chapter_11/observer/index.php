<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 9/6/16
 * Time: 9:56 PM
 */

use chapter11\observer\GeneralLogger;
use chapter11\observer\Login;
use chapter11\observer\Login_SPL;
use chapter11\observer\PartnerShipTool;
use chapter11\observer\SecurityMonitor;
use chapter11\observer\SecurityMonitor_SPL;
use chapter11\observer\SuperBertClass;

spl_autoload_register(function ($className) {
  $className = str_replace("chapter11\\observer\\", "", $className);
  require_once ("{$className}.php");
});

//$login = new Login();
//$login->attach(new SecurityMonitor());
//$login->attach(new SuperBertClass());
//$login->handleLogin('test', 'test', 'ip');

$login = new Login();
new SecurityMonitor($login);
new GeneralLogger($login);
new PartnerShipTool($login);

$login->handleLogin('user', 'pass', 'ip');

$loginSPL = new Login_SPL();
new SecurityMonitor_SPL($loginSPL);
$loginSPL->dummyNotify();