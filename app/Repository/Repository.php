<?

namespace App\Repository;

use App\Core\Database;
use App\Core\Database\QueryBuilder;

abstract class Repository
{
  protected static function db(string $name = 'default'): \PDO
  {
    return Database::get($name);
  }

  protected static function table(string $table_name, ?\PDO $db = null)
  {
    return new QueryBuilder($table_name, $db ?? self::db());
  }
}