<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 7/27/16
 * Time: 6:11 PM
 */

namespace chapter10\decorator;


class StructureRequest extends DecorateProcess {

  public function process(RequestHelper $req) {
    var_dump(__CLASS__ . ' : doing something with the request');
    $this->processrequest->process($req);
  }


}