<?php

namespace App\Pinnio\Config;

class Router
{
  private static array $routes = [];

  public static function add(string $path, string $http_method, callable $method, ?callable $middleware = null): void
  {
    self::$routes[] = [
      "path" => $path,
      "http_method" => $http_method,
      "method" => $method,
      "middleware" => $middleware,
    ];
  }

  public static function execute(): void
  {
    foreach (self::$routes as $route) {
      if ($route["path"] === $_SERVER['REQUEST_URI'] && $route["http_method"] === $_SERVER['REQUEST_METHOD']) {
        if (isset($route["middleware"])) {
          call_user_func($route["middleware"]);
          call_user_func($route["method"]);
        } else {
          session_start();
          call_user_func($route["method"]);
        }
        return;
      }
    }

    http_response_code(404);
    View::notFound();
  }
}