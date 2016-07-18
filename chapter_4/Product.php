<?php

/**
 * Created by PhpStorm.
 * User: bert
 * Date: 7/11/16
 * Time: 5:54 PM
 */
class Product {

  public $price;
  public $name;

  public function __construct($name, $price) {
    $this->price = $price;
    $this->name = $name;
  }

}

class ProcessSale {

  private $callbacks;

  public function registerCallback($callback) {

    if (!is_callable($callback)) {
      throw new Exception("Callback is not callable!");
    }
    $this->callbacks[] = $callback;
  }

  public function sale($product) {
    var_dump("{$product->name}: processing ".PHP_EOL);
    foreach ($this->callbacks as $callback) {
      call_user_func($callback, $product);
    }

  }
}

class Mailer {

  public function doMail($product) {
    var_dump("mailing ({$product->name})" . PHP_EOL);
  }
}

class Totalizer {

  static function warnAmount($amt) {
    $count = 0;
    return function($product) use ($amt, &$count) {
      $count += $product->price;
      var_dump("count: $count" . PHP_EOL);
      if ($count > $amt) {
        var_dump("reached high price ({$count})" . PHP_EOL);
      }
    };
  }
}

// Old way of declaring anonymous function.
$logger = create_function('$product',
                          'var_dump("logging ({$product->name})\n");');

// Better way of declaring anonymous function.
$logger2 = function ($product) {
  var_dump("logging ({$product->name})" . PHP_EOL);
};

$processor = new ProcessSale();
$processor->registerCallback($logger);
$processor->registerCallback($logger2);
$processor->registerCallback(array(new Mailer(), "doMail"));
$processor->registerCallback(Totalizer::warnAmount(70));

$processor->sale(new Product('testbert', 60));
$processor->sale(new Product('berttest', 20));
