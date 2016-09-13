<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 9/13/16
 * Time: 11:25 PM
 */

use chapter11\command\CommandContext;
use chapter11\command\LoginCommand;

spl_autoload_register(function ($className) {
  $className = str_replace("chapter11\\command\\", "", $className);
  require_once ("{$className}.php");
});

$loginCommand = new LoginCommand();
$context = new CommandContext();

$loginCommand->execute($context);
