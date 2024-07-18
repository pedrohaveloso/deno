<?

namespace App\Utils;

class Formatter
{
  public static function text_max_length(
    ?string $text,
    int $max_length,
    string $overflow = '...'
  ): string {
    if ($text === null) {
      return '';
    }

    if (mb_strlen($text) > $max_length) {
      return mb_substr($text, 0, $max_length) . $overflow;
    } else {
      return $text;
    }
  }

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