<?

namespace App\Web;

final class Response
{
  public static function redirect(string $to)
  {
    http_response_code(302);
    header("Location: $to");
    exit;
  }
}