<?php

if (!function_exists('group')) {
  function group(
    string $group_route_path,
    Closure $routes,
    array $conditions = [],
    Closure $if_false = null
  ): void {
    if (in_array(false, $conditions)) {
      $if_false();
      return;
    }

    $GLOBALS['group_route_path'] = $group_route_path;
    $routes();
    $GLOBALS['group_route_path'] = null;
  }
}

