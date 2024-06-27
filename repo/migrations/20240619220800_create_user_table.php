<?

namespace Repo\Migrations;

return new class extends \Repo\Migration {
  public function up()
  {
    $this->db()->query(<<<SQL
      CREATE TABLE IF NOT EXISTS "User" (
        "id"         UUID PRIMARY KEY DEFAULT gen_random_uuid(),
        "fullname"   VARCHAR(255),
        "password"   VARCHAR(255),
        "email"      VARCHAR(255),

        {$this->timestamp()}
      );
    SQL);
  }

  public function down()
  {
    $this->db()->query(<<<SQL
      DROP TABLE IF EXISTS "User";
    SQL);
  }
};