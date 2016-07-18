<?php

/**
 * Created by PhpStorm.
 * User: bert
 * Date: 7/11/16
 * Time: 7:43 AM
 */
class Person {

  private $_name;
  private $_age;
  private $writer;
  private $id;
  public $account;

  public function __construct( PersonWriter $writer, Account $account) {
    $this->writer = $writer;
    $this->account = $account;
  }

  public function __get($property) {
    $method = "get{$property}";
    if (method_exists($this, $method)) {
      return $this->$method();
    }
  }

  public function __isset($property) {
    $method = "get{$property}";
    return (method_exists($this, $method));
  }

  public function __set($propery, $value) {
    $method = "set{$propery}";
    if (method_exists($this, $method)) {
      return $this->$method($value);
    }
  }

  public function __unset($property) {
    $method = "set{$property}";
    if (method_exists($this, $method)) {
      $this->$method(NULL);
    }
  }

  public function __call($methodName, $args) {
    if (method_exists($this->writer, $methodName)) {
      return $this->writer->$methodName($this);
    }
  }

  public function __destruct() {
    if (!empty($this->id)) {
      // Do something with this User before it gets garbage collected.
      var_dump("Saving Person to database" . PHP_EOL);
    }
  }

  public function __clone() {
    // If we would just clone the object, the ID would be cloned also, leading
    // to nasty bugs. Magic method overrides that behavior.
    $this->id = 0;

    // Cloning an object also makes a reference to any object as a property.
    // Comment this line to see the effects to the Account object.
    $this->account = clone $this->account;
  }

  public function __toString() {
    $desc = $this->getName();
    $desc .= " (age " . $this->getAge() . ")";

    return $desc;
  }

  public function getName() {
    return "Bert";
  }

  public function getAge() {
    return 35;
  }

  public function setName($name) {
    $this->_name = $name;
    if (! is_null($name)) {
      $this->_name = strtoupper($this->_name);
    }
  }

  public function setAge($age) {
    $this->_age = strtoupper($age);
  }

  public function setID($id) {
    $this->id = $id;
  }
}

class PersonWriter {

  public function writeName(Person $p) {
    var_dump($p->getName());
  }

  public function writeAge(Person $p) {
    var_dump($p->getAge());
  }
}

class Address {

  private $number;
  private $street;

  public function __construct($mayBeNumber, $mayBeStreet = NULL) {

    if (is_null($mayBeStreet)) {
      $this->streetAddress = $mayBeNumber;
    } else {
      $this->number = $mayBeStreet;
      $this->street = $mayBeNumber;
    }
  }

  public function __set($property, $value) {
    if ($property === "streetaddress") {
      if ( preg_match( "/^(\d+.*?)[\s,]+(.+)$/", $value, $matches ) ) {
        $this->number = $matches[1];
        $this->street = $matches[2];
      } else {
        throw new Exception("unable to parse street address: '{$value}'");
      }
    }
  }

  public function __get($property) {
    if ($property === "streetaddress") {
      return $this->number . " " . $this->street;
    }
  }
}

class Account {

  public $balance;

  public function __construct($balance) {
    $this->balance = $balance;
  }


}

$p = new Person(new PersonWriter(), new Account(200));

if (isset($p->name)) {
  var_dump($p->name);
};

if (isset($p->age)) {
  var_dump($p->age);
}

if (isset($p->bertage)) {
  var_dump($p->bertage);
}

$q = new Person(new PersonWriter(), new Account(100));
$q->name = "Berten Bibber";
$q->age = 105;

var_dump($q);

$r = new Person(new PersonWriter(), new Account(50));
$r->writeName();

$address = new Address("441b Bakers Street");
var_dump("street address : {$address->streetAddress}" . PHP_EOL);
$address = new Address(15, "Albert Mews");
var_dump("street address : {$address->streetAddress}" . PHP_EOL);
$address->streetAddress = "34, West 24th Avenue";
var_dump("street address : {$address->streetAddress}" . PHP_EOL);

$q->setID(1);
var_dump($q);
unset($p);

$clone = clone($q);
var_dump($clone);

// Account object of cloned person will also be referencing to the same Account
// object of the source Person!
$person = new Person(new PersonWriter(), new Account(200));
$person->setID(343);
$person2 = clone $person;
$person->account->balance += 10;
var_dump($person->account->balance);
var_dump($person2->account->balance);

var_dump($q);
echo $q;