<?

namespace App\Core;

class Env
{
  private static $env = [];

  public static function get(string $key): mixed
  {
    if (empty(self::$env)) {
      if (file_exists(CONFIGDIR . '/local.php')) {
        self::$env = include CONFIGDIR . '/local.php';
      } else {
        self::$env = include CONFIGDIR . '/local.default.php';
      }
    }

    return $env[$key];
  }

  public static function show_errors(): bool
  {
    return self::get('show_errors');
  }
}