<?

namespace App\Core;

class Database
{
  public static function get(string $name = 'default'): \PDO
  {
    return $GLOBALS['___dbs___'][$name ?? 'default'];
  }
}