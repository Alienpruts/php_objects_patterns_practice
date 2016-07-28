<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 7/28/16
 * Time: 7:52 AM
 */
class Product {
  public $id;
  public $name;

  public function __construct($id, $name) {
    $this->id = $id;
    $this->name = $name;
  }
}

function getProductFileLines($file) {
  return file($file);
}

function getProductObjectFromId ($id, $productname) {
  // Some kind of database lookup, etc...
  return new Product($id, $productname);
}

function getNameFromLine($line) {
  if ( preg_match( "/.*-(.*)\s\d+/", $line, $array ) ) {
    return str_replace( '_',' ', $array[1] );
  }
  return '';
}

function getIDFromLine($line) {
  if ( preg_match( "/^(\d{1,3})-/", $line, $array ) ) {
    return $array[1];
  }
  return -1;
}

///////////////////////////////////////////

$lines = getProductFileLines('test.txt');
$objects = [];
foreach ($lines as $line) {
  $id = getIDFromLine($line);
  $name = getNameFromLine($line);
  $objects[$id] = getProductObjectFromId($id, $name);
}

var_dump($objects);