<?

namespace App\Core;

use Exception;

class Application
{
  public static function start()
  {
    Router::dispatch();
    Database::close_all();
  }
}