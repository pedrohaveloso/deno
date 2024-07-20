<?

namespace App\Web;

final class Request
{
  public static function get_path_variable(string $key): string|null
  {
    return $GLOBALS['ROUTER_PATH_VARIABLES'][$key] ?? null;
  }

  public static function path(): string
  {
    return explode('?', $_SERVER['REQUEST_URI'])[0];
  }

  public static function origin_url(): string
  {
    if (array_key_exists('HTTP_ORIGIN', $_SERVER)) {
      return $_SERVER['HTTP_ORIGIN'];
    }

    if (array_key_exists('HTTP_REFERER', $_SERVER)) {
      return $_SERVER['HTTP_REFERER'];
    }

    if (array_key_exists('REMOTE_ADDR', $_SERVER)) {
      return $_SERVER['REMOTE_ADDR'];
    }

    return '';
  }

  public static function is_pagination(): bool
  {
    return self::get_data_by_key('paginator') !== null;
  }

  public static function post_data(): array
  {
    return $_POST ?? [];
  }

  public static function post_data_by_key(string $key): mixed
  {
    return $_POST[$key] ?? null;
  }

  public static function get_data(): array
  {
    return $_GET ?? [];
  }

  public static function get_data_by_key(string $key): mixed
  {
    return $_GET[$key] ?? null;
  }
}