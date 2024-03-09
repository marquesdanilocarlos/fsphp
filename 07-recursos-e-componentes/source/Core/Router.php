<?php

namespace Source\Core;

class Router
{
    protected static array $route;

    public static function get(string $route, $handler): void
    {
        $get = "/" . filter_input(INPUT_GET, 'url', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        self::$route = [
            $route => [
                'route' => $route,
                'controller' => !is_string($handler) ? $handler : strstr($handler, ':', true),
                'method' => !is_string($handler) ?: str_replace(":", "",  strstr($handler, ':', false))
            ]
        ];

        var_dump(self::$route);
    }

}