<?

namespace Repo\Migrations;

return new class extends \Repo\Migration {
  public function up()
  {
    $this->db()->query(<<<SQL
      CREATE TABLE IF NOT EXISTS "Category" (
        "id"          UUID PRIMARY KEY DEFAULT gen_random_uuid(),
        "name"        VARCHAR(155),
        "description" TEXT,

        {$this->timestamp()}
      );
    SQL);
  }

  public function down()
  {
    $this->db()->query(<<<SQL
      DROP TABLE IF EXISTS "Category";
    SQL);
  }
};