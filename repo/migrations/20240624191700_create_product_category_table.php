<?

use App\Core\Database;

return [
  'up' => function (Database $db) {
    $db::get()->query(<<<SQL
      CREATE TABLE IF NOT EXISTS "ProductCategory" (
        "id"          SERIAL PRIMARY KEY, 
        "product_id"  UUID,
        "category_id" UUID,

        FOREIGN KEY ("product_id") REFERENCES "Product" ("id"),
        FOREIGN KEY ("category_id") REFERENCES "Category" ("id"),

        {$db::timestamp()}
      );
    SQL);
  },

  'down' => function (Database $db) {
    $db::get()->query(<<<SQL
      DROP TABLE IF EXISTS "ProductCategory";
    SQL);
  }
];