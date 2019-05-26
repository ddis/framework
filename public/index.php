<?php

include_once __DIR__ . "/../kernel/autoload/autoload.php";
include_once __DIR__ . "/../config/routs.php";

$configs = require __DIR__ . "/../config/configs.php";

kernel\App::run($configs);
