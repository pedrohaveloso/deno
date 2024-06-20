<?php

namespace App\Utils;

class Request
{
  public static function post_data(): array
  {
    return $_POST ?? [];
  }

  public static function post_data_by_key(string $key): mixed
  {
    return $_POST[$key] ?? null;
  }
}