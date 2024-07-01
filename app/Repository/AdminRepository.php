<?

namespace App\Repository;

class AdminRepository extends Repository
{
  public static function get_by_username(string $username): array|null
  {
    $query = self::db()->prepare(<<<SQL
      SELECT * FROM "Admin" WHERE "username" = :username;
    SQL);

    $query->bindValue(':username', $username);

    $query->execute();

    return $query->fetchAll(\PDO::FETCH_ASSOC)[0] ?? null;
  }
}