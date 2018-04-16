<?php

use Psr\Http\Message\ServerRequestInterface;
use SONFin\Application;
use SONFin\Plugins\AutorPlugin;
use SONFin\Plugins\DbPlugin;
use SONFin\Plugins\RoutePlugin;
use SONFin\Plugins\ViewPlugin;
use SONFin\ServiceContainer;

require_once __DIR__ .'/../vendor/autoload.php';

if(file_exists(__DIR__ . '/../.env')){
	$dotenv = new \Dotenv\Dotenv(__DIR__ . '/../');
	$dotenv->overload();
}

echo getenv('DB_DRIVER');

require_once __DIR__ .'/../src/helpers.php';

$serviceContainer = new ServiceContainer();
$app = new Application($serviceContainer);

$app->plugin(new RoutePlugin());
$app->plugin(new ViewPlugin());
$app->plugin(new DbPlugin());
$app->plugin(new AutorPlugin);

$app->get('/home/{name}/{id}', function(ServerRequestInterface $request){
	$response = new \Zend\Diactoros\Response();
	$response->getBody()->write("response com emmiter do diactoros");
	return $response;
});

require_once __DIR__ . '/../src/controllers/charts.php';
require_once __DIR__ . '/../src/controllers/statements.php';
require_once __DIR__ . '/../src/controllers/category-costs.php';
require_once __DIR__ . '/../src/controllers/bill_receives.php';
require_once __DIR__ . '/../src/controllers/bill_pays.php';
require_once __DIR__ . '/../src/controllers/users.php';
require_once __DIR__ . '/../src/controllers/autor.php';

$app->start();
