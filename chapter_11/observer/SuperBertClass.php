<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 9/6/16
 * Time: 10:05 PM
 */

namespace chapter11\observer;


class SuperBertClass implements Observer {

  public function update(Observable $observable) {
    var_dump("Bert Class is up and runninig");
  }
}