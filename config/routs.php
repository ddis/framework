<?php

$router = \kernel\Route::getInstance();

$router->get('\/', [\app\controllers\IndexController::class, 'index']);
$router->get('users\/([\d]+)\/ddis', [\app\controllers\IndexController::class, 'user']);
