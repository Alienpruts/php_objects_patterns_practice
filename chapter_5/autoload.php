<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 7/12/16
 * Time: 5:41 PM
 */

spl_autoload_register('straightIncludeWithCase');
// Try to load a file writer.php or .inc.
//$writer = new Writer();
// Try to laod the same file in directory util.
//$writer2 = new util\Writer();

// Default implementation means searching will be for lowercase filenmaes.
// We can change the registering of autoloading to accomodate for Uppoercase.
function straightIncludeWithCase($classname) {

  $file = "{$classname}.php";
  if (file_exists($file)) {
    require_once $file;
  }
}


$ouputter = new AutoloadTest();
