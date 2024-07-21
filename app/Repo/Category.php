<?

namespace App\Repo;

class Category extends Repo
{
  public static function get_all_query(
    string $name = null,
    string $description = null
  ) {
    $query = self::table(Category::name())
      ->select()
      ->order_by_desc(Category::col('created_at'));

    if (!empty($name)) {
      $query->where(Category::col('name'), 'LIKE', "%$name%");
    }

    if (!empty($description)) {
      $query->where(Category::col('description'), 'LIKE', "%$description%");
    }

    return $query;
  }
}