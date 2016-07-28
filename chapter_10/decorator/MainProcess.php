<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 7/27/16
 * Time: 6:06 PM
 */

namespace chapter10\decorator;


class MainProcess extends ProcessRequest {

  public function process(RequestHelper $req) {
    var_dump(__CLASS__ . ' : doing something useful with the request');
  }
}