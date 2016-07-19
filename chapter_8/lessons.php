<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 7/18/16
 * Time: 5:52 PM
 */

use chapter8\FixedCostStrategy;
use chapter8\Lecture;
use chapter8\RegistrationMgr;
use chapter8\Seminar;
use chapter8\TimedCostStrategy;

require_once ('Seminar.php');
require_once ('Lecture.php');
require_once ('TimedCostStrategy.php');
require_once ('FixedCostStrategy.php');
require_once ('RegistrationMgr.php');

$lessons[] = new Seminar(4, new TimedCostStrategy());
$lessons[] = new Lecture(4, new FixedCostStrategy());

foreach ($lessons as $lesson) {
  var_dump("lesson charge {$lesson->cost()}" . PHP_EOL);
  var_dump("Charge type : {$lesson->chargeType()}" . PHP_EOL);
}

$lesson3 = new Seminar(4, new FixedCostStrategy());
$lesson4 = new Lecture(4, new TimedCostStrategy());
$manager = new RegistrationMgr();
$manager->register($lesson3);
$manager->register($lesson4);