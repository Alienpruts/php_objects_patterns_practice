<?php

/**
 * Created by PhpStorm.
 * User: bert
 * Date: 7/5/16
 * Time: 7:56 AM
 */
class ShopProduct {

//  public $numPages;
//  public $playLength;
  private $title;
  private $producerMainName;
  private $producerFirstName;
  protected $price;
  private $discount = 0;

  /**
   * ShopProduct constructor.
   * @param $title
   * @param $producerMainName
   * @param $producerFirstName
   * @param $price
   */
  public function __construct($title, $producerMainName, $producerFirstName, $price) {
//    $this->numPages = $numPages;
//    $this->playLength = $playLength;
    $this->title = $title;
    $this->producerMainName = $producerMainName;
    $this->producerFirstName = $producerFirstName;
    $this->price = $price;
  }

  /**
   * @return mixed
   */
  public function getProducerMainName() {
    return $this->producerMainName;
  }

  /**
   * @return mixed
   */
  public function getProducerFirstName() {
    return $this->producerFirstName;
  }

  /**
   * @return int
   */
  public function getDiscount() {
    return $this->discount;
  }

  /**
   * @return mixed
   */
  public function getTitle() {
    return $this->title;
  }



  public function getProducer(){
    return "{$this->producerFirstName} " . "{$this->producerMainName}";
  }

  public function getSummaryLine() {
    $base = "$this->title ( {$this->producerMainName}, ";
    $base .= "{$this->producerFirstName} )";
    return $base;
  }

  /**
   * @param int $discount
   */
  public function setDiscount($discount) {
    $this->discount = $discount;
  }

  /**
   * @return mixed
   */
  public function getPrice() {
    return ($this->price - $this->discount);
  }

}

class ShopProductWriter {

  private $products = array();

  /**
   * @param \ShopProduct $shopProduct
   */
  public function addProduct(ShopProduct $shopProduct) {
    $this->products[] = $shopProduct;
  }

  /**
   * @param \ShopProduct $shopProduct

  public function write(ShopProduct $shopProduct) {
    $str = "{$shopProduct->title}: " . $shopProduct->getProducer() . " ({$shopProduct->price})'";
    var_dump($str);
  }
   */

  public function write() {
    $str = "";
    foreach ($this->products as $product) {
      $str .= "{$product->title}: ";
      $str .= $product->getProducer();
      $str .= "({$product->getPrice()})" . PHP_EOL;
    }
    var_dump($str);

  }
}

class Wrong {};


class CdProduct extends ShopProduct{

  private $playLength;

  public function __construct($title, $producerMainName, $producerFirstName, $price, $playLength) {
    parent::__construct($title, $producerMainName, $producerFirstName, $price);
    $this->playLength  = $playLength;
  }


  public function getPlayLength() {
    return $this->playLength;
  }

  public function getSummaryLine() {
    $base = parent::getSummaryLine();
    $base .= ": playing time - {$this->playLength}";
    return $base;
  }
  
}

class BookProduct extends ShopProduct{

  private $numPages;

  public function __construct($title, $producerMainName, $producerFirstName, $price, $numPages) {
    parent::__construct($title, $producerMainName, $producerFirstName, $price);
    $this->numPages = $numPages;
  }

  public function getPrice() {
    return $this->price;
  }


  /**
   * @return mixed
   */
  public function getNumberOfPages() {
    return $this->numPages;
  }

  public function getSummaryLine() {
    $base = parent::getSummaryLine();
    $base .= ": page count - {$this->numPages}";
    return $base;
  }

}

//$product1 = new ShopProduct();
//$product2 = new ShopProduct();
$product3 = new ShopProduct("Bert is cool", "Van de Casteele", "Bert", "29.99");
$product3 = new ShopProduct("Mamma loves ya", "Egghead", "Egbert", "19.99");
$writer = new ShopProductWriter();
$product4 = new CdProduct("Exile on Bert lane",
                          "The", "Alabama 3",
                          10.99, null, 60.33);


//var_dump($product1);
//var_dump($product2);
var_dump($product3);

//$product1->title = " My Antonia";
//$product2->title = "Catch 22";

//var_dump($product1->title);
//var_dump($product2->title);

//$product1->subTitle = "Cathchy subtitle";

//var_dump($product1);
//var_dump($product2);

var_dump($product3->getProducer());

//$writer->write($product3);
//$writer->write(new Wrong());

var_dump($product4->getProducer());
//$writer->write($product4);

$product3->setDiscount(5);
//var_dump('Get the price directly from object');
//var_dump($product3->price);
var_dump("Get the price with discount!");
var_dump($product3->getPrice());
var_dump("These two do not match, because price is freely accessible");

$writer->addProduct($product3);
$writer->addProduct($product4);

$writer->write();