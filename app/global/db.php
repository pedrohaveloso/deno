<?php

if (!function_exists('db')) {
  function db(string $name = 'primary'): PDO
  {
    return $GLOBALS['db___primary'];
  }
}