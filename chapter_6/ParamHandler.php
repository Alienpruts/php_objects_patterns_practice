<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 7/14/16
 * Time: 6:05 PM
 */

namespace chapter6;


abstract class ParamHandler {
  protected $source;
  protected $params = [];

  public function __construct($source) {
    $this->source;
  }

  public function addParam($key, $value) {
    $this->params[$key] = $value;
  }

  public function getAllParams() {
    return $this->params;
  }

  static function getInstance($filename) {
    if (preg_match("/\.xml$/i", $filename)) {
      return new XmlParamHandler($filename);
    } elseif (preg_match("/\.csv$/i", $filename)) {
      return new CsvParamHandler($filename);
    }
    return new TextParamHandler($filename);
  }

  abstract function write();
  abstract function read();
}

class XmlParamHandler extends ParamHandler {
  function write() {
    // write XML using $this->params
    var_dump("writing stuff to XML");
  }

  function read() {
    // Read XML and populate $this->params
    var_dump("reading stuff from XML");
  }

}

class TextParamHandler extends ParamHandler {
  function write() {
    // write text using $this->params
    var_dump("writing stuff to TXT");
  }

  function read() {
    // Read txt and populate $this->params
    var_dump("reading stuff from TXT");
  }

}

class CsvParamHandler extends ParamHandler {
  function write() {
    var_dump('writing to CSV');
  }

  function read() {
    var_dump('reading from CSV');
  }

}


$test = ParamHandler::getInstance("./params.xml");
$test->addParam('key1', 'val1');
$test->addParam('key2', 'val2');
$test->addParam('key3', 'val3');
$test->write();

$test2 = ParamHandler::getInstance("./params.txt");
$test2->read();

$test3 = ParamHandler::getInstance("./params.csv");
$test3->read();