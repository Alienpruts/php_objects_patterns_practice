<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 9/13/16
 * Time: 11:00 PM
 */

namespace chapter11\command;


class LoginCommand extends Command{

  public function execute(CommandContext $context) {

    $manager = Registry::getAccessManager();
    $user = $context->get('username');
    $pass = $context->get('pass');
    $user_obj = $manager->login($user, $pass);
    if (is_null($user_obj)) {
      $context->setError($manager->getError());
      return false;
    }

    $context->addParam('user', $user_obj);
    var_dump('I just finished executing');
    return true;
  }
}