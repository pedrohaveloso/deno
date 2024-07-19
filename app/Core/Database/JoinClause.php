<?

namespace App\Core\Database;

class JoinClause
{
  public function __construct(
    JoinType $join_type,
    TableString $table,
    ColumnString $first_column,
    string $operator,
    ColumnString $second_column
  ) {
    $this->join_clause =
      $join_type->value . ' JOIN ' . $table->get()
      . ' ON ' . $first_column->get() . $operator
      . ' ' . $second_column->get();
  }

  private string $join_clause;

  public function get(): string
  {
    return $this->join_clause;
  }
}