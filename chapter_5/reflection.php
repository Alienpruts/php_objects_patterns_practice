<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 7/13/16
 * Time: 8:14 AM
 */
require_once ('../chapter_4/ShopProduct.php');

class ReflectionUtil {

  static function getClassSource(ReflectionClass $class) {
    $path = $class->getFileName();
    $lines = @file($path);
    $from = $class->getStartLine();
    $to = $class->getEndLine();
    $len = $to - $from+1;

    return implode(array_slice($lines, $from-1, $len));
  }
}

function argData( ReflectionParameter $arg) {
  $details = '';
  $name = $arg->getName();
  $class = $arg->getClass();
  $position = $arg->getPosition();
  $details .= "\$$name has position $position" . PHP_EOL;
  if (!empty($class)) {
    $className = $class->getName();
    $details .= "\$$name must be a $className object" . PHP_EOL;
  }

  if ($arg->isPassedByReference()) {
    $details .= "\$$name is passed by reference." . PHP_EOL;
  }

  if ($arg->isDefaultValueAvailable()) {
    $def = $arg->getDefaultValue();
    $details .= "\$$name has default: $def " . PHP_EOL;
  }

  return $details;
}

function classData( ReflectionClass $class) {
  $details = '';
  $name = $class->getName();

  if ($class->isUserDefined()) {
    $details .= "$name is user defined." . PHP_EOL;
  }

  if ($class->isInternal()) {
    $details .= "$name is built-in" . PHP_EOL;
  }

  if ($class->isInterface()) {
    $details .= "$name is interface" . PHP_EOL;
  }

  if ($class->isAbstract()) {
    $details .= "$name is abstract." . PHP_EOL;
  }

  if ($class->isFinal()) {
    $details .= "$name is final class" . PHP_EOL;
  }

  if ($class->isInstantiable()) {
    $details .= "$name can be instantiated" . PHP_EOL;
  } else {
    $details .= "$name can not be instantiated." . PHP_EOL;
  }

  if ($class->isCloneable()) {
    $details .= "$name can be cloned" . PHP_EOL;
  } else {
    $details .= "$name can not be cloned." . PHP_EOL;
  }

  return $details;
}

// The same (and more info) can be obtained for methods using ReflectionMethod
// instantiation. See book for examples.

$prod_class = new ReflectionClass('CdProduct');
$method = $prod_class->getMethod('__construct');
$params = $method->getParameters();



var_dump(Reflection::export($prod_class, TRUE));


var_dump(classData($prod_class));

var_dump(ReflectionUtil::getClassSource($prod_class));

var_dump($prod_class->getMethods());


foreach ($params as $param) {
  var_dump(argData($param));
}


