<?

namespace App\Repository;

class CategoryRepository extends Repository
{
  public static function g()
  {
    self::db()->prepare(<<<SQL
      SELECT * FROM "Category" ORDER BY DESC "created_at";
    SQL);
  }
}