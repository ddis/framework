<?php


namespace kernel;

/**
 * Class App
 *
 * @package kernel
 */
class App
{
    /**
     * @param array $config
     *
     * @return mixed
     * @throws \Exception
     */
    public static function run(array $config)
    {
        list($function, $params) = Route::getInstance()->run();

        return (new $function[0])->{$function[1]}(...$params);
    }
}
