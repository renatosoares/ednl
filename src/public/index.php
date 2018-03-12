<?php
use \EDNL\CONTROLLERS\GraphSimpleBin;
use \EDNL\CONTROLLERS\DijkstraBin;
use \EDNL\CONTROLLERS\TreeAVLController;

require dirname(dirname(__DIR__)) . '/vendor/autoload.php';

$app = new \Slim\App;

$app->get('/graph/insert-edge', GraphSimpleBin::class . ':viewInsertEdge');
$app->get('/graph/insert-vertex', GraphSimpleBin::class . ':viewInsertVertex');
$app->get('/graph/remove-vertex/{key}', GraphSimpleBin::class . ':viewRemoveVertex');

$app->get('/dijkstra/relocation-cities/{source}/{target}', DijkstraBin::class . ':viewRelocationCities');
$app->get('/dijkstra/relocation-cities-linked', DijkstraBin::class . ':viewRelocationCitiesLinked');
$app->get('/dijkstra/maze/{source}/{target}', DijkstraBin::class . ':viewMaze');

$app->get('/tree/avl/insert[/{params:.*}]', TreeAVLController::class . ':insert');
$app->get('/tree/avl/delete[/{params:.*}]', TreeAVLController::class . ':delete');

$app->run();
