<?

namespace App\Core\Database;

class HavingClause
{
  public function __construct(
    ColumnString $column,
    string $operator,
    public readonly mixed $value
  ) {
    $this->replace_label = ":having_{$column->brute_name}";
    $this->having_clause = $column->get() . ' ' . $operator . ' ' . $this->replace_label;
  }

  private string $having_clause;

  public readonly string $replace_label;

  public function get(): string
  {
    return $this->having_clause;
  }
}
