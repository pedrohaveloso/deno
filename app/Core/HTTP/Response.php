<?

namespace App\Core\HTTP;

class Response
{
  public static function redirect(string $to)
  {
    http_response_code(301);
    header('Location: ' . $to);
    exit;
  }
}