<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 7/14/16
 * Time: 8:07 AM
 */

namespace alienpruts\chapter5;


class Person {

  public $name;

  public function __construct($name) {
    $this->name = $name;
  }
}

interface Module {

  public function execute();
}

class FtpModule implements Module {

  public function setHost($host) {
    var_dump("FtpModule::setHost(): $host" . PHP_EOL);
  }

  public function setUser($user) {
    var_dump("FtpModule::setUser(): $user" . PHP_EOL);

  }

  public function execute() {
  }

}

class PersonModule implements Module {

  public function setPerson(Person $person) {
    var_dump("PersonModule::setPerson(): {$person->name}" . PHP_EOL);

  }

  public function execute() {
    // TODO: Implement execute() method.
  }

}

class ModuleRunner {

  private $configData = array(
      "PersonModule" => array( 'person'=>'bob' ),
      "FtpModule"
      => array( 'host'
      =>'example.com',
        'user' =>'anon' )
    );
  private $modules = array();

  public function init() {
    $interface = new \ReflectionClass('alienpruts\chapter5\Module');
    foreach ($this->configData as $modulename => $params) {
      $module_class = new \ReflectionClass("alienpruts\\chapter5\\$modulename");
      if (!$module_class->isSubclassOf($interface)) {
        throw new \Exception("Unknown module type : $modulename");
      }

      $module = $module_class->newInstance();
      foreach ($module_class->getMethods() as $method) {
        $this->handleMethod($module, $method, $params);
        // NEEDS TO BE UPDATED!!!
        var_dump("calling handleMethod on " . $method->name);
      }

      array_push($this->modules, $module);
    }
  }

  private function handleMethod( Module $module, \ReflectionMethod $method, $params) {
    $name = $method->getName();
    $args = $method->getParameters();

    if (count($args) != 1 || substr($name, 0, 3 != "set")) {
      return false;
    }

    $property = strtolower(substr($name, 3));
    if (!isset($params[$property])) {
      return false;
    }

    $arg_class = $args[0]->getClass();
    if (empty($arg_class)) {
      $method->invoke($module, $params[$property]);
    } else {
      $method->invoke($module, $arg_class->newInstance($params[$property]));
    }
  }
}

$test = new ModuleRunner();
$test->init();