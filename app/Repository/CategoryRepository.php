<?

namespace App\Repository;

class CategoryRepository extends Repository
{
  public static function get_all_query(
    string $name = null,
    string $description = null
  ) {
    $query = self::table('Category')
      ->select()
      ->order_by_desc('created_at');

    if (!empty($name)) {
      $query->where('name', 'LIKE', "%$name%");
    }

    if (!empty($description)) {
      $query->where('description', 'LIKE', "%$description%");
    }

    return $query;
  }
}