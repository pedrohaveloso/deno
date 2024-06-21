<?

namespace App\Core;

class Session
{
  private static bool $started = false;

  private static function start(): void
  {
    if (self::$started) {
      return;
    }

    session_start();
    self::$started = true;
  }

  public static function set(string $key, mixed $value): void
  {
    self::start();
    $_SESSION['SITE_SESSION'][$key] = $value;
  }

  public static function get(string $key): mixed
  {
    self::start();
    return $_SESSION['SITE_SESSION'][$key];
  }
}