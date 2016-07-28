<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 7/28/16
 * Time: 8:02 AM
 */

namespace chapter10\facade;


class ProductFacade {


  private $file;
  private $products;

  public function __construct($file) {
    $this->file = $file;
    $this->compile();
  }

  private function compile() {
    $lines = $this->getProductFileLines($this->file);
    foreach ($lines as $line) {
      $id = $this->getIDFromLine($line);
      $name = $this->getNameFromLine($line);
      $this->products[$id] = $this->getProductObjectFromId($id, $name);
    }
  }

  public function getProducts() {
    return $this->products;
  }

  public function getProduct($id) {
    if (isset($this->products[$id])) {
      return $this->products[$id];
    }
    return NULL;
  }

  public function getProductFileLines($file) {
    return file($file);
  }

  public function getProductObjectFromId ($id, $productname) {
    // Some kind of database lookup, etc...
    return new Product($id, $productname);
  }

  public function getNameFromLine($line) {
    if ( preg_match( "/.*-(.*)\s\d+/", $line, $array ) ) {
      return str_replace( '_',' ', $array[1] );
    }
    return '';
  }

  public function getIDFromLine($line) {
    if ( preg_match( "/^(\d{1,3})-/", $line, $array ) ) {
      return $array[1];
    }
    return -1;
  }
}