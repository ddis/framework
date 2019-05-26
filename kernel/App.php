<?php


namespace kernel;


class App
{
    public static function run(array $config)
    {
        list($function, $params) = Route::getInstance()->run();

        echo call_user_func_array($function, $params);
    }
}
