<?

namespace App\Repository;

class ProductRepository extends Repository
{
  public static function get_all_query(
    string $name = null,
    string $description = null
  ) {
    $query = self::table('Product')
      ->select(['Product.name'])
      ->join('ProductCategory', 'Product.id', '=', 'ProductCategory.product_id')
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