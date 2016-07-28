<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 7/27/16
 * Time: 6:08 PM
 */

namespace chapter10\decorator;


class LogRequest extends DecorateProcess {

  public function process(RequestHelper $req) {
    var_dump(__CLASS__ . ' : doing something with the request');
    $this->processrequest->process($req);
  }
}