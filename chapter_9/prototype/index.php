<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 7/26/16
 * Time: 8:53 AM
 */

use chapter9\prototype\EarthForest;
use chapter9\prototype\EarthPlains;
use chapter9\prototype\EarthSea;
use chapter9\prototype\MarsPlains;
use chapter9\prototype\TerrainFactory;

require_once ('TerrainFactory.php');
require_once ('EarthPlains.php');
require_once ('EarthForest.php');
require_once ('EarthSea.php');
require_once ('MarsPlains.php');

$factory = new TerrainFactory(new EarthSea(0), new EarthPlains(), new EarthForest());

$factory2 = new TerrainFactory(new EarthSea(-1), new MarsPlains(), new EarthForest());

var_dump($factory->getForest());
var_dump($factory->getPlains());
var_dump($factory->getSea());

var_dump($factory2->getForest());
var_dump($factory2->getPlains());
var_dump($factory2->getSea());
