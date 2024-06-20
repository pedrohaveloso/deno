<?php

if (!function_exists('route')) {
  function route(string $path, string|Closure $action): void
  {
    if (!empty($GLOBALS['group_route_path'])) {
      $path = $GLOBALS['group_route_path'] . $path;
    }

    $current_uri = explode('?', $_SERVER['REQUEST_URI']);

    $current_path = $current_uri[0];

    if ($current_path !== $path) {
      return;
    }

    if ($action instanceof Closure) {
      $action();
    } else {
      $action = explode('@', $action);

      $class = 'App\\Controller\\' .
        (mb_convert_case(str_replace('/', '\\\\', $action[0]), MB_CASE_TITLE)) .
        'Controller';

      $class = new $class();
      $method = $action[1];

      $class->$method();
    }
  }
}

