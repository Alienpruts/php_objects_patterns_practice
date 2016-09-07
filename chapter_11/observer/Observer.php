<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 9/6/16
 * Time: 9:40 PM
 */

namespace chapter11\observer;


interface Observer {
  public function update(Observable $observable);
}