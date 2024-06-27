<?

namespace Repo\Migrations;

return new class extends \Repo\Migration {
  public function up()
  {
    $this->db()->query(<<<SQL
      CREATE TABLE IF NOT EXISTS "Product" (
        "id"             UUID PRIMARY KEY DEFAULT gen_random_uuid(),
        "name"           VARCHAR(155),
        "description"    TEXT,
        "value"          INTEGER DEFAULT 0,
        "in_stock"       INTEGER DEFAULT 0,
        "is_installment" BOOLEAN DEFAULT FALSE,

        {$this->timestamp()}
      );
    SQL);
  }

  public function down()
  {
    $this->db()->query(<<<SQL
      DROP TABLE IF EXISTS "Product";
    SQL);
  }
};