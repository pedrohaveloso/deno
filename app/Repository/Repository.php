<?

namespace App\Repository;

use App\Core\Database;

abstract class Repository
{
  protected static function db(string $name = null): \PDO
  {
    return Database::get($name);
  }
}