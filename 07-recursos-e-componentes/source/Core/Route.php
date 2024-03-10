<?php

namespace Source\Core;

class Route
{
    protected static array $route;

    public static function get(string $route, $handler): void
    {
        $get = "/" . filter_input(INPUT_GET, 'url', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        self::$route = [
            $route => [
                'route' => $route,
                'controller' => !is_string($handler) ? $handler : strstr($handler, ':', true),
                'method' => !is_string($handler) ?: str_replace(":", "", strstr($handler, ':', false))
            ]
        ];

        self::dispatch($get);
    }

    public static function dispatch(?string $route): void
    {
        $route = self::$route[$route] ?? [];

        if ($route) {
            if ($route['controller'] instanceof \Closure) {
                call_user_func($route['controller']);
                return;
            }

            $controller = self::getNamespace() . $route['controller'];
            $method = $route['method'];

            if (class_exists($controller)) {
                $newController = new $controller;
                if (method_exists($newController, $method)) {
                    $newController->{$method}();
                }
            }

        }
    }

    public static function getRoute(): array
    {
        return self::$route;
    }

    public static function getNamespace(): string
    {
        return "Source\App\Controller\\";
    }

}