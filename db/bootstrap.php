<?php

use SONFin\Application;
use SONFin\Plugins\AutorPlugin;
use SONFin\Plugins\DbPlugin;
use SONFin\ServiceContainer;

$serviceContainer = new ServiceContainer();
$app = new Application($serviceContainer);

$app->plugin(new DbPlugin());
$app->plugin(new AutorPlugin);

return $app;	