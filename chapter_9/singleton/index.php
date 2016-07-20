<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 7/20/16
 * Time: 8:04 AM
 */

use chapter9\singleton\Preferences;

require_once ('Preferences.php');

$pref = Preferences::getInstance();
$pref->setProperty("name", "Bert");
var_dump($pref->getProperty("name"));

// demonstrate that value is not lost, it is sit in the instance.
unset($pref);
$pref2 = Preferences::getInstance();
var_dump($pref2->getProperty("name"));