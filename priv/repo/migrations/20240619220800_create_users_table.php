<?

use App\Core\Database;

return [
  'up' => function () {
    Database::get()->query(<<<SQL
      CREATE TABLE IF NOT EXISTS users (
        id         UUID PRIMARY KEY DEFAULT gen_random_uuid(),
        fullname   VARCHAR(255),
        password   VARCHAR(255),
        email      VARCHAR(255),
        created_at TIMESTAMP DEFAULT NOW(),
        updated_at TIMESTAMP DEFAULT NOW()
      );
    SQL);
  },

  'down' => function () {
    Database::get()->query(<<<SQL
      DROP TABLE IF EXISTS users;
    SQL);
  }
];