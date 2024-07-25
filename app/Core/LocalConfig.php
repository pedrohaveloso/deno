<?

namespace App\Core;

class LocalConfig
{
  private static array $configs = [];

  public static function get(string $key = null): mixed
  {
    if (empty(self::$configs)) {
      self::$configs = file_exists(CONFIGDIR . 'local.php')
        ? include CONFIGDIR . 'local.php'
        : include CONFIGDIR . 'local.default.php';
    }

    return $key === null
      ? self::$configs
      : self::$configs[$key];
  }

  public static function get_remove_html_comments(): bool
  {
    return self::get('remove_html_comments') ?? false;
  }
}