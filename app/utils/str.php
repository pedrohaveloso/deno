<?php

namespace App\Utils;

class Str
{
  /**
   * @var string[]
   */
  private static $snake_case_cache = [];

  public static function to_snake_case(string $word): string
  {
    if (!empty(self::$snake_case_cache[$word])) {
      return self::$snake_case_cache[$word];
    }

    $to_snake_case = ltrim(
      strtolower(preg_replace('/[A-Z]([A-Z](?![a-z]))*/', '_$0', $word)),
      '_'
    );

    self::$snake_case_cache[$word] = $to_snake_case;

    return $to_snake_case;
  }
}

