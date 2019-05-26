<?php


namespace kernel;

/**
 * Class Route
 *
 * @package kernel
 */
class Route
{
    private static $instance = null;
    private        $routs    = [];

    private function __construct() { }

    private function __clone() { }

    /**
     * @return Route
     */
    public static function getInstance(): Route
    {
        if (!self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * @param string $route
     * @param array  $params
     *
     * @return Route
     */
    public function post(string $route, array $params): Route
    {
        $this->setRoute("POST", $route, $params);

        return $this;
    }

    /**
     * @param string $route
     * @param array  $params
     *
     * @return Route
     */
    public function get(string $route, array $params): Route
    {
        $this->setRoute("GET", $route, $params);

        return $this;
    }

    /**
     * @param string $route
     * @param array  $params
     *
     * @return Route
     */
    public function delete(string $route, array $params): Route
    {
        $this->setRoute("DELETE", $route, $params);

        return $this;
    }

    /**
     * @param string $route
     * @param array  $params
     *
     * @return Route
     */
    public function put(string $route, array $params): Route
    {
        $this->setRoute("PUT", $route, $params);

        return $this;
    }

    /**
     * @return array
     * @throws \Exception
     */
    public function run(): array
    {
        $url     = $this->getCurrentUrl();
        $method  = $this->getCurrentMethod();
        $matches = [];

        foreach ($this->routs[$method] as $rout => $params) {
            if (preg_match("/^".$rout."$/", $url, $matches)) {
                return [
                    $params, array_slice($matches, 1),
                ];
            }
        }

        echo "Method not found";
    }

    /**
     * @param string $method
     * @param string $pattern
     * @param array  $params
     *
     * @return Route
     */
    private function setRoute(string $method, string $pattern, array $params): Route
    {
        $this->routs[$method][$pattern] = $params;

        return $this;
    }

    /**
     * @return string
     */
    private function getCurrentUrl(): string
    {
        if (!empty($_SERVER['REQUEST_URI'])) {
            return (trim($_SERVER['REQUEST_URI'], '/') ?: '/');
        }

        if (!empty($_SERVER['PATH_INFO'])) {
            return (trim($_SERVER['PATH_INFO'], '/') ?: '/');
        }

        if (!empty($_SERVER['QUERY_STRING'])) {
            return (trim($_SERVER['QUERY_STRING'], '/') ?: '/');
        }

        return '/';
    }

    /**
     * @return string
     */
    private function getCurrentMethod(): string
    {
        return $_SERVER['REQUEST_METHOD'];
    }
}
