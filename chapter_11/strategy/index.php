<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 9/5/16
 * Time: 7:50 AM
 */

use chapter11\strategy\MarkLogicMarker;
use chapter11\strategy\MatchMarker;
use chapter11\strategy\RegexMarker;
use chapter11\strategy\TextQuestion;

spl_autoload_register(function ($className) {
  $className = str_replace("chapter11\\strategy\\", "", $className);
  require_once ("{$className}.php");
});

$markers = [
  new RegexMarker("/f.ve/"),
  new MatchMarker("five"),
  new MarkLogicMarker('$input equals "five"'),
];

foreach ($markers as $marker) {
  var_dump(get_class($marker));
  $question = new TextQuestion("how many beans make five", $marker);
  foreach (["five", "four"] as $response ) {
    var_dump("response: $response");
    if ($question->mark($response)) {
      // Will mostly default to this because of dummy return value in mark method.
      var_dump("well_done");
    } else {
      var_dump("u r an idiot!");
    }
  }
}