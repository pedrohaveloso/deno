<?

namespace App\Core\HTTP;

class Response
{
  public static function redirect(string $to)
  {
    header('Location: ' . $to);
    exit;
  }
}