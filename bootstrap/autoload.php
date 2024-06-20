<?php

include_once __BASEDIR__ . '/app/utils/str.php';

spl_autoload_register(function ($namespace) {
  $paths = explode('\\', $namespace);

  $file_path = join(
    '/',
    array_map(fn($path) => App\Utils\Str::to_snake_case($path), $paths),
  ) . '.php';

  include_once __BASEDIR__ . '/' . $file_path;
});
