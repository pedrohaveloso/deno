<?php

if (!function_exists('route')) {
  function route(string $path, string|Closure $action): void
  {
    if ($action instanceof Closure) {
      $action();
    } else {
      $action = explode('@', $action);

      $class = 'App\\Controller\\' .
        (mb_convert_case($action[0], MB_CASE_TITLE)) .
        'Controller';

      $class = new $class();
      $method = $action[1];

      $class->$method();
    }
  }
}

