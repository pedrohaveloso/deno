<?

namespace App\Core\Database;

class ColumnString
{
  public function __construct(TableString $table, string $column_name)
  {
    $this->brute_name = $column_name;
    $this->column_name = "{$table->get()}.\"$column_name\"";
  }

  public readonly string $brute_name;

  private string $column_name;

  public function get(): string
  {
    return $this->column_name;
  }
}