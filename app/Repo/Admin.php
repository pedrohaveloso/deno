<?

namespace App\Repo;

class Admin extends Repo
{
  public static function get_by_username(string $username): array|null
  {
    return self::table(Admin::name())
      ->where(Admin::col('username'), '=', $username)
      ->first();
  }
}