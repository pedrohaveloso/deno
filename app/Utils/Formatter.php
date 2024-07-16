<?

namespace App\Utils;

class Formatter
{
  public static function to_date_default(string $original): string
  {
    return date_create($original)->format('d/m/Y');
  }

  public static function to_datetime_default(string $original): string
  {
    return date_create($original)->format('d/m/Y H:i:s');
  }

  public static function to_time_default(string $original): string
  {
    return date_create($original)->format('H:i:s');
  }
}