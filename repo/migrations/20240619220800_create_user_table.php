<?

use App\Core\Database;

return [
  'up' => function (Database $db) {
    $db::get()->query(<<<SQL
      CREATE TABLE IF NOT EXISTS "User" (
        "id"         UUID PRIMARY KEY DEFAULT gen_random_uuid(),
        "fullname"   VARCHAR(255),
        "password"   VARCHAR(255),
        "email"      VARCHAR(255),

        {$db::timestamp()}
      );
    SQL);
  },

  'down' => function (Database $db) {
    Database::get()->query(<<<SQL
      DROP TABLE IF EXISTS "User";
    SQL);
  }
];