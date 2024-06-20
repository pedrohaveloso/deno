<?php

spl_autoload_register(function ($namespace) {
  $paths = explode('\\', $namespace);

  $file_path = join(
    '/',
    array_map(fn($path) => to_snake_case($path), $paths),
  ) . '.php';

  include_once __BASEDIR__ . '/' . $file_path;
});
