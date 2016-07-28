<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 7/27/16
 * Time: 5:55 PM
 */

namespace chapter10\decorator;


abstract class TileDecorator extends Tile {

  protected $tile;

  public function __construct(Tile $tile) {
    $this->tile = $tile;
  }
}