<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 7/28/16
 * Time: 8:13 AM
 */
use chapter11\interpreter\BooleanOrExpression;
use chapter11\interpreter\EqualsExpression;
use chapter11\interpreter\InterPreterContext;
use chapter11\interpreter\LiteralExpression;
use chapter11\interpreter\VariableExpression;

spl_autoload_register(function ($className) {
  $className = str_replace("chapter11\\interpreter\\", "", $className);
  require_once ("{$className}.php");
});

//$form_input = $_REQUEST['form_input'];
// warning : contains "print_file_contents('etc/passwd')"
//eval($form_input);

$context = new InterPreterContext();
$literal = new LiteralExpression('four');
$literal->interpret($context);
var_dump($context->lookup($literal));

$myvar = new VariableExpression('input', 'four');
$myvar->interpret($context);
var_dump($context->lookup($myvar));

$newvar = new VariableExpression('input');
$newvar->interpret($context);
var_dump($context->lookup($newvar));

$myvar->setValue('five');
$myvar->interpret($context);
var_dump($context->lookup($myvar));
var_dump($context->lookup($newvar));

///////////////////////////

var_dump('---------------------------------');

$context2 = new InterPreterContext();
$input = new VariableExpression('input');
$statement = new BooleanOrExpression(
  new EqualsExpression($input, new LiteralExpression('four')),
  new EqualsExpression($input, new LiteralExpression('4'))
);

foreach (array('four', '4', '52') as $val) {
  $input->setValue($val);
  var_dump( "value is : " . $val);
  $statement->interpret($context2);
  if ($context2->lookup($statement)) {
    var_dump("top hats");
  } else {
    var_dump("dunce hat on");
  }
}