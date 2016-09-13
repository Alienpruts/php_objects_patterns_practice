<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 9/13/16
 * Time: 10:59 PM
 */

namespace chapter11\command;


abstract class Command {
  abstract function execute(CommandContext $context);
}