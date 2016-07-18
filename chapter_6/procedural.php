<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 7/14/16
 * Time: 5:53 PM
 */

function readParams($sourceFile) {
  $prams = [];
  if (preg_match("/\.xml$/i", $sourceFile)) {
    // read XML parameters from file
  } else {
    //read text parameters from $sourceFile.
  }
  return $prams;
}

function writeParams($params, $sourceFile) {
  if (preg_match("/\.xml$/i", $sourceFile)) {
    // write XML parameters to $sourceFile
  } else {
    // write text to $sourceFile.
  }
}

// Possible implementation
$file = "./param.txt";
$array['key1'] = "val1";
$array['key2'] = "val2";
$array['key3'] = "val3";
writeParams($array, $file);
$output = readParams($file);
var_dump($output);