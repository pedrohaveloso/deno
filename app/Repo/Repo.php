<?

namespace App\Repo;

use App\Core\Database;
use App\Core\Database\ColumnString;
use App\Core\Database\QueryBuilder;
use App\Core\Database\TableString;

abstract class Repo
{
  /**
   * @param array{ColumnString, string, mixed} $wheres
   * @return array|null
   */
  public static function first(...$wheres): array|null
  {
    $query = self::table(static::name());

    if ($wheres != []) {
      foreach ($wheres as $where) {
        $query->where(static::col($where[0]), $where[1], $where[2]);
      }
    }

    return $query->first();
  }

  /**
   * @param array{ColumnString, string, mixed} $wheres
   * @return array|null
   */
  public static function get(...$wheres): array|null
  {
    $query = self::table(static::name());

    if ($wheres != []) {
      foreach ($wheres as $where) {
        $query->where(static::col($where[0]), $where[1], $where[2]);
      }
    }

    return $query->get();
  }

  private static array $table_names = [];

  public static function name(): TableString
  {
    if (array_key_exists(static::class, static::$table_names)) {
      return static::$table_names[static::class];
    }

    return static::$table_names[static::class] = new TableString(
      static::class
    );
  }

  private static array $column_names = [];

  public static function col(string $column_name): ColumnString
  {
    if (
      array_key_exists(static::class, static::$column_names)
      && array_key_exists($column_name, static::$column_names[static::class])
    ) {
      return static::$column_names[static::class][$column_name];
    }

    return static::$column_names[static::class][$column_name] = new ColumnString(
      static::name(),
      $column_name
    );
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