<?php

/**
 * Created by PhpStorm.
 * User: bert
 * Date: 7/5/16
 * Time: 7:56 AM
 */
class ShopProduct implements Chargeable {

  use PriceUtilities;

  const AVAILABLE = 0;
  const OUT_OF_STOCK = 1;

  private $title;
  private $producerMainName;
  private $producerFirstName;
  protected $price;
  private $discount = 0;
  private $id = 0;

  /**
   * ShopProduct constructor.
   * @param $title
   * @param $producerMainName
   * @param $producerFirstName
   * @param $price
   */
  public function __construct($title, $producerMainName, $producerFirstName, $price) {
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

  /**
   * @param int $id
   */
  public function setId($id) {
    $this->id = $id;
  }

  static function getInstance($id, $pdo) {
    $stmt = $pdo->prepare("SELECT * from products where id=?");
    $stmt->execute(array($id));
      $row = $stmt->fetchObject();

    if (empty($row)) {
      return null;
    }

    if ($row->type == "book") {
      $product = new BookProduct( $row->title,
                                  $row->mainname,
                                  $row->firstname,
                                  $row->price,
                                  $row->numpages);
    } elseif ($row->type == "cd") {
      $product = new CdProduct( $row->title,
                                $row->mainname,
                                $row->firstname,
                                $row->price,
                                $row->playlength);

    } else {
      $product = new ShopProduct( $row->title,
        $row->mainname,
        $row->firstname,
        $row->price);
    }

    $product->setId($row->id);
    $product->setDiscount($row->discount);

    return $product;
  }

  // Dummy implementation of abstract method.
  public function getTaxRate() {
    // TODO: Implement getTaxRate() method.
  }


}

abstract class ShopProductWriter {

  protected $products = array();

  /**
   * @param \ShopProduct $shopProduct
   */
  public function addProduct(ShopProduct $shopProduct) {
    $this->products[] = $shopProduct;
  }

  abstract public function write();

}

class XmlProductWriter extends ShopProductWriter {

  public function write() {
    // TODO: Implement write() method.
  }
}

class TextProductWriter extends ShopProductWriter {
  public function write() {
    // TODO: Implement write() method.
  }

}

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

  public function cdInfo(CdProduct $prod) {
    return $prod->getPlayLength();
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

interface Chargeable {

  public function getPrice();
}

abstract class Service {
  // Just a random class for demo purposes.
}

class UtilityService extends Service {
  // We WILL need to duplicate the tax related stuff because we can't
  // extend from more than 1 class. Tax related stuff is in ShopProduct class.
  //private $taxrate = 17;

  //public function calculateTax($price) {
  //  return (($this->taxrate/100) * $price);
  //}

  //Solution : use traits.
  use PriceUtilities, Taxtools {
    // We have two traits with similar names.
    Taxtools::calculateTax insteadof PriceUtilities;
    // But we still want to use the overidden one.
    PriceUtilities::calculateTax as basicTax;
  }

  // Overrride the abstract method from PriceUtilities trait.
  public function getTaxRate() {
    return 27;
  }

}

trait PriceUtilities {

  public function calculateTax($price) {
    return (($this->getTaxRate()/100) * $price);
  }

  abstract function getTaxRate();

}

trait Taxtools {

  public function calculateTax($price) {
    return 222;
  }
}

abstract class DomainObject {

  private $group;

  public function __construct() {
    // for the same reason as in create(), we use static keyword.
    $this->group = static::getGroup();
  }


  public static function create() {
    // will not work in extending classes, will try to nistantiate the abstract class.
    //return new self();
    // Use late static binding.
    return new static();
  }

  public static function getGroup() {
    return "default";
  }


}

class User extends DomainObject {

}

class Document extends DomainObject {

  public static function getGroup() {
    return 'document';
  }
}

class SpreadSheet extends Document {

}



$dsn = "mysql:host=localhost;port=5123;dbname=php_objects_patterns";
$pdo = new PDO($dsn, "root", "root");
$pdo->errorCode();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$obj = ShopProduct::getInstance(1,$pdo);

var_dump($obj);
var_dump(ShopProduct::AVAILABLE);

// Bad implementation, we KNOW the product is a cdproduct.
var_dump($obj->cdInfo($obj));

$p = new ShopProduct('Test', 'VdC','Bert',100);
var_dump($p->calculateTax(100) . PHP_EOL);
// of (static method) .
//var_dump($p::calculateTax(100) . PHP_EOL);
$u = new UtilityService();
var_dump($u->calculateTax(100) . PHP_EOL);

var_dump($u->basicTax(100) . PHP_EOL);

// Test retunrn self.
var_dump(User::create());
var_dump(Document::create());
var_dump(SpreadSheet::create());
