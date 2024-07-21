<?

namespace App\Core;

class Application
{
  public static function start()
  {
    Router::dispatch();
    Database::close_all();
  }
}