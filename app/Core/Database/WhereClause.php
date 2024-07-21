<?

namespace App\Core\Database;

class WhereClause
{
  public function __construct(
    public ColumnString $column,
    string $operator,
    public readonly mixed $value
  ) {
    $this->replace_label = ":where_{$column->brute_name}";
    $this->where_clause = $column->get() . ' ' . $operator . ' ' . $this->replace_label;
  }

  private string $where_clause;

  public readonly string $replace_label;

  public function get(): string
  {
    return $this->where_clause;
  }
}
