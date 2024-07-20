<?

namespace App\Utils;

class Validator
{
  public static function is_valid_uuid(mixed $mixed): bool
  {
    return
      is_string($mixed)
      && preg_match(
        '/^[0-9A-F]{8}-[0-9A-F]{4}-4[0-9A-F]{3}-[89AB][0-9A-F]{3}-[0-9A-F]{12}$/i',
        $mixed
      ) === 1;
  }
}