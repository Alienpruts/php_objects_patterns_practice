<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 7/26/16
 * Time: 8:51 AM
 */

namespace chapter9\prototype;


class TerrainFactory {

  private $sea;
  private $plains;
  private $forest;

  /**
   * TerrainFactory constructor.
   * @param Sea $sea
   * @param Plains $plains
   * @param Forest $forest
   */
  public function __construct( Sea $sea, Plains $plains, Forest $forest) {
    $this->sea = $sea;
    $this->plains = $plains;
    $this->forest = $forest;
  }

  /**
   * @return \chapter9\prototype\Sea
   */
  public function getSea() {
    return clone $this->sea;
  }

  /**
   * @return \chapter9\prototype\Plains
   */
  public function getPlains() {
    return clone $this->plains;
  }

  /**
   * @return \chapter9\prototype\Forest
   */
  public function getForest() {
    return clone $this->forest;
  }




}