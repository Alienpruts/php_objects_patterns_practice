<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 7/27/16
 * Time: 4:38 PM
 */

use chapter10\decorator\AuthenticateRequest;
use chapter10\decorator\DiamondDecorator;
use chapter10\decorator\LogRequest;
use chapter10\decorator\MainProcess;
use chapter10\decorator\Plains;
use chapter10\decorator\PollutedDecorator;
use chapter10\decorator\PollutedPlains;
use chapter10\decorator\RequestHelper;
use chapter10\decorator\StructureRequest;

spl_autoload_register( function ($className) {
  $className = str_replace("chapter10\\decorator\\", "", $className);
  require_once ("{$className}.php");
});

// Problem demonstration.
$plains = new Plains();
var_dump($plains->getWealthFactor());

$polluted = new PollutedPlains();
var_dump($polluted->getWealthFactor());

// What if we want a polluted Plains? Create another class? sigh....


// Decorator pattern to the rescue.
$tile = new Plains();
var_dump($tile->getWealthFactor());

$tile = new DiamondDecorator(new Plains());
var_dump($tile->getWealthFactor());

$tile = new PollutedDecorator(new DiamondDecorator(new Plains()));
var_dump($tile->getWealthFactor());


$process = new AuthenticateRequest(new StructureRequest(new LogRequest(new MainProcess())));
$process->process(new RequestHelper());

$process2 = new LogRequest(new MainProcess());
$process2->process(new RequestHelper());