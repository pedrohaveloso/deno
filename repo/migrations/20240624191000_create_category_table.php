<?

use App\Core\Database;

return [
  'up' => function (Database $db) {
    $db::get()->query(<<<SQL
      CREATE TABLE IF NOT EXISTS "Category" (
        "id"          UUID PRIMARY KEY DEFAULT gen_random_uuid(),
        "name"        VARCHAR(155),
        "description" TEXT,

        {$db::timestamp()}
      );
    SQL);
  },

  'down' => function (Database $db) {
    $db::get()->query(<<<SQL
      DROP TABLE IF EXISTS "Category";
    SQL);
  }
];