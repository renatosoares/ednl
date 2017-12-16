<?php
use \EDNL\RUNNER\GraphSimpleBin;
use \EDNL\RUNNER\DijkstraBin;

require dirname(dirname(__DIR__)) . '/vendor/autoload.php';

$app = new \Slim\App;

$app->get('/graph/insert-edge', GraphSimpleBin::class . ':viewInsertEdge');
$app->get('/graph/insert-vertex', GraphSimpleBin::class . ':viewInsertVertex');
$app->get('/graph/remove-vertex/{key}', GraphSimpleBin::class . ':viewRemoveVertex');

$app->get('/dijkstra/relocation-cities/{source}/{target}', DijkstraBin::class, ':viewRelocationCities');

$app->run();