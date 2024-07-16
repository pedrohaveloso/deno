<?

namespace App\Repository;

class CategoryRepository extends Repository
{
  public static function get_all(int $page = 1, int $limit = 20): array
  {
    $query = self::db()->prepare(<<<SQL
      SELECT * FROM "Category" ORDER BY "created_at" DESC LIMIT :limit OFFSET :start;
    SQL);

    $start = ($page - 1) * $limit;

    $query->bindValue(':start', $start);
    $query->bindValue(':limit', $limit);

    $query->execute();

    return $query->fetchAll(\PDO::FETCH_ASSOC) ?? [];
  }
}