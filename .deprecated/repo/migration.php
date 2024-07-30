<?

namespace Repo;

abstract class Migration
{
  abstract public function up();
  abstract public function down();

  protected function db(string $name = null): \PDO
  {
    return \App\Core\Database::get($name ?? 'default');
  }

  protected function timestamp(): string
  {
    return <<<SQL
      "created_at" TIMESTAMP DEFAULT NOW(),
      "updated_at" TIMESTAMP DEFAULT NOW()
    SQL;
  }
}