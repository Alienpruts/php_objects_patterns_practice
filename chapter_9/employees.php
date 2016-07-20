<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 7/19/16
 * Time: 9:48 AM
 */

use chapter9\CluedUp;
use chapter9\Employee;
use chapter9\Minion;
use chapter9\NastyBoss;


require_once ('NastyBoss.php');
require_once ('Minion.php');
require_once ('CluedUp.php');
require_once ('Employee.php');
require_once ('WellConnected.php');

$boss = new NastyBoss();
// This only works with $employeeName parameter of NastyBoss::addEmployee().
//$boss->addEmployee('Bert');
//$boss->addEmployee('Wouter');
//$boss->addEmployee('Jens');

// This works, but you need to implicitely instantiate an object.
//$boss->addEmployee(new Minion('Bert'));
//$boss->addEmployee(new CluedUp('Lizette'));
//$boss->addEmployee(new Minion('Dieter'));

$boss->addEmployee(Employee::recruit('Bert'));
$boss->addEmployee(Employee::recruit('Lizette'));
$boss->addEmployee(Employee::recruit('Dieter'));

$boss->projectFails();
$boss->projectFails();
$boss->projectFails();

