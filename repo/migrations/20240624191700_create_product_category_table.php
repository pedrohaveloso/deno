<?

namespace Repo\Migrations;

return new class extends \Repo\Migration {
  public function up()
  {
    $this->db()->query(<<<SQL
      CREATE TABLE IF NOT EXISTS "ProductCategory" (
        "id"          SERIAL PRIMARY KEY, 
        "product_id"  UUID,
        "category_id" UUID,

        FOREIGN KEY ("product_id") REFERENCES "Product" ("id"),
        FOREIGN KEY ("category_id") REFERENCES "Category" ("id"),

        {$this->timestamp()}
      );
    SQL);
  }

  public function down()
  {
    $this->db()->query(<<<SQL
      DROP TABLE IF EXISTS "ProductCategory";
    SQL);
  }
};