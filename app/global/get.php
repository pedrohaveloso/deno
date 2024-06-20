<?php

if (!function_exists('get')) {
  function get(string $path, string|Closure $action): void
  {
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      route($path, $action);
    }
  }
}