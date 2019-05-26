<?php

$router = \kernel\Route::getInstance();

$router->get('\/', [\controllers\IndexController::class, 'index']);
$router->get('users\/([\d]+)\/ddis', [\controllers\IndexController::class, 'user']);
