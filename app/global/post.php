<?php

if (!function_exists('post')) {
  function post(string $path, string|Closure $action): void
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      route($path, $action);
    }
  }
}