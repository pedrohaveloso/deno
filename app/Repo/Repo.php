<?

namespace App\Repo;

use App\Core\Database;
use App\Core\Database\ColumnString;
use App\Core\Database\QueryBuilder;
use App\Core\Database\TableString;

abstract class Repo
{
  public static function name(): TableString
  {
    return new TableString(static::class);
  }

  public static function col(string $column_name): ColumnString
  {
    return new ColumnString(static::name(), $column_name);
  }

  protected static function db(string $name = 'default'): \PDO
  {
    return Database::get($name);
  }

  protected static function table(TableString $table, ?\PDO $db = null)
  {
    return new QueryBuilder($table, $db ?? self::db());
  }
}