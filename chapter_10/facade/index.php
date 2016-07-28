<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 7/28/16
 * Time: 7:48 AM
 */
use chapter10\facade\ProductFacade;

spl_autoload_register(function ($className) {
  $className = str_replace("chapter10\\facade\\", "", $className);
  require_once ("{$className}.php");
});

$facade = new ProductFacade('test.txt');
var_dump($facade->getProduct(234));