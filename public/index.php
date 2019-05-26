<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once __DIR__ . "/../kernel/autoload/autoload.php";
include_once __DIR__ . "/../config/routs.php";

$configs = require __DIR__ . "/../config/configs.php";

kernel\App::run($configs);
