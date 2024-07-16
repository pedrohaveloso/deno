<?

namespace App\Web;

final class Request
{
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