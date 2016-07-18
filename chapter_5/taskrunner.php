<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 7/12/16
 * Time: 6:03 PM
 */

$classname = "Task";

$path = "tasks/{$classname}.php";

if (!file_exists($path)) {
  throw new Exception("No such file : {$path}");
}

require_once ($path);

$qclassname = "tasks\\$classname";;

if (!class_exists($qclassname)) {
  throw new Exception("No such class : {$qclassname}");
}
$myObj = new $qclassname();
$myObj->doSpeak();

var_dump($myObj);

// Get all declared classes.
//var_dump(get_declared_classes());
$class = get_class($myObj);
var_dump($class);
var_dump($myObj instanceof $class);

var_dump(get_class_methods($class));
var_dump(get_class_methods($myObj));

if (is_callable(array($myObj, 'doSpeak'))) {
  var_dump("Is callable");
}

if (method_exists($myObj, 'doSpeak')) {
  var_dump("Method exists");
}

// Only public properties will be shown.
var_dump(get_class_vars($class));

var_dump(get_parent_class($myObj));

var_dump(class_implements($myObj));

call_user_func(array($myObj, 'doSpeak'));

// call_user_func_array() does not have a valid example (would require rewrite).
// See book p 98 for more details.
// Function passes arguments as an array, which could be useful if you do not know
// in advance how many arguments you'll be getting.