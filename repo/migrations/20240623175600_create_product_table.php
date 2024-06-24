<?

use App\Core\Database;

return [
  'up' => function (Database $db) {
    $db::get()->query(<<<SQL
      CREATE TABLE IF NOT EXISTS "Product" (
        "id"             UUID PRIMARY KEY DEFAULT gen_random_uuid(),
        "name"           VARCHAR(155),
        "description"    TEXT,
        "value"          INTEGER DEFAULT 0,
        "in_stock"       INTEGER DEFAULT 0,
        "is_installment" BOOLEAN DEFAULT FALSE,

        {$db::timestamp()}
      );
    SQL);
  },

  'down' => function (Database $db) {
    $db::get()->query(<<<SQL
      DROP TABLE IF EXISTS "Product";
    SQL);
  }
];