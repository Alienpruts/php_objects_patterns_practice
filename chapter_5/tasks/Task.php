<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 7/12/16
 * Time: 6:01 PM
 */

namespace tasks;


class Task {

  private $priv = 'testing private';
  protected $prot = 'testing protected';
  public $pub = 'testing public';

  public function doSpeak() {
    var_dump("Hello");
  }
}