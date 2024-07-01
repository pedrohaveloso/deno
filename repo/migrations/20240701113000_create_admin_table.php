<?

namespace Repo\Migrations;

return new class extends \Repo\Migration {
  public function up()
  {
    $this->db()->query(<<<SQL
      CREATE TYPE ADMIN_STATUS AS ENUM ('active', 'inactive');
    SQL);

    $this->db()->query(<<<SQL
      CREATE TABLE IF NOT EXISTS "Admin" (
        "id"        UUID PRIMARY KEY DEFAULT gen_random_uuid(),
        "username"  VARCHAR(255),
        "email"     VARCHAR(255),
        "password"  VARCHAR(255),
        "status"    ADMIN_STATUS,

        {$this->timestamp()}
      );
    SQL);
  }

  public function down()
  {
    $this->db()->query(<<<SQL
      DROP TABLE IF EXISTS "Admin";
    SQL);

    $this->db()->query(<<<SQL
      DROP TYPE ADMIN_STATUS;
    SQL);
  }
};