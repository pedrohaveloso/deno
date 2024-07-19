<?

namespace App\Core\Database;

class TableString
{
  public function __construct(string $class_string)
  {
    $class_array = explode('\\', $class_string);
    $class_name = end($class_array);
    $this->table_name = '"' . str_replace('Repo', '', $class_name) . '"';
  }

  private string $table_name;

  public function get(): string
  {
    return $this->table_name;
  }
}