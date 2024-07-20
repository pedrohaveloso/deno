<?

namespace App\Repo;

class Product extends Repo
{
  public static function by_id(string $product_id): array|null
  {
    $product = self::table(Product::name())
      ->where(Product::col('id'), '=', $product_id)
      ->first();

    return $product;
  }

  public static function get_all_query(
    string $name = null,
    string $description = null
  ) {
    $query = self::table(Product::name())
      ->order_by_desc(Product::col('created_at'));

    if (!empty($name)) {
      $query->where(Product::col('name'), 'LIKE', "%$name%");
    }

    if (!empty($description)) {
      $query->where(Product::col('description'), 'LIKE', "%$description%");
    }

    return $query;
  }
}