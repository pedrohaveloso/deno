<?

namespace App\Core\Database;

use PDO;

class QueryBuilder
{
  public function __construct(string $table_name, PDO $pdo_connection)
  {
    $this->table_name = $table_name;
    $this->pdo_connection = $pdo_connection;
  }

  private PDO $pdo_connection;

  private string $table_name;

  private ?array $select = null;

  private ?string $order_by = null;

  private bool $order_by_desc = false;

  private ?array $where = [];

  private ?int $limit = null;

  private ?int $offset = null;

  private ?array $join = [];

  private ?array $group_by = null;

  private ?array $having = [];

  private ?array $union = [];

  public function select(array $select = []): QueryBuilder
  {
    $this->select = $select;
    return $this;
  }

  public function order_by_desc(string $column_name): QueryBuilder
  {
    $this->order_by = $column_name;
    $this->order_by_desc = true;
    return $this;
  }

  public function where(string $column, string $operator, $value): QueryBuilder
  {
    $this->where[] = [$column, $operator, $value];
    return $this;
  }

  public function limit(int $limit): QueryBuilder
  {
    $this->limit = $limit;
    return $this;
  }

  public function offset(int $offset): QueryBuilder
  {
    $this->offset = $offset;
    return $this;
  }

  public function join(string $table, string $column1, string $operator, string $column2): QueryBuilder
  {
    $this->join[] = ["type" => "INNER JOIN", "table" => $table, "condition" => [$column1, $operator, $column2]];
    return $this;
  }

  public function left_join(string $table, string $column1, string $operator, string $column2): QueryBuilder
  {
    $this->join[] = ["type" => "LEFT JOIN", "table" => $table, "condition" => [$column1, $operator, $column2]];
    return $this;
  }

  public function right_join(string $table, string $column1, string $operator, string $column2): QueryBuilder
  {
    $this->join[] = ["type" => "RIGHT JOIN", "table" => $table, "condition" => [$column1, $operator, $column2]];
    return $this;
  }

  public function group_by(array $columns): QueryBuilder
  {
    $this->group_by = $columns;
    return $this;
  }

  public function having(string $column, string $operator, $value): QueryBuilder
  {
    $this->having[] = [$column, $operator, $value];
    return $this;
  }

  public function union(QueryBuilder $query): QueryBuilder
  {
    $this->union[] = $query;
    return $this;
  }

  public function paginate(int $page, int $items_per_page): QueryBuilder
  {
    $this->limit = $items_per_page;
    $this->offset = ($page - 1) * $items_per_page;
    return $this;
  }

  private function format_column(string $column): string
  {
    if ($column === "*") {
      return $column;
    }

    return join('.', array_map(function ($part) {
      if ($part === "*") {
        return $part;
      }

      return "\"$part\"";
    }, explode('.', $column)));
  }

  public function get()
  {
    $columns = (empty($this->select))
      ? '*'
      : join(',', array_map(function ($column) {
        return $this->format_column($column);
      }, $this->select));

    $query = "SELECT $columns FROM \"$this->table_name\"";

    if ($this->join) {
      foreach ($this->join as $join) {
        $join_table = "\"$join[table]\"";

        $condition =
          $this->format_column($join['condition'][0])
          . ' ' . $join['condition'][1] . ' '
          . $this->format_column($join['condition'][2]);

        $query .= " {$join['type']} $join_table ON $condition";
      }
    }

    dd($query);

    if ($this->where) {
      $conditions = array_map(function ($condition) use ($table_alias) {
        return $this->format_condition($condition, $table_alias);
      }, $this->where);
      $query .= " WHERE " . implode(' AND ', $conditions);
    }

    if ($this->group_by) {
      $group_columns = implode(', ', array_map([$this, 'quote_identifier'], $this->group_by));
      $query .= " GROUP BY $group_columns";
    }

    if ($this->having) {
      $having_conditions = array_map(function ($condition) use ($table_alias) {
        return $this->format_condition($condition, $table_alias);
      }, $this->having);
      $query .= " HAVING " . implode(' AND ', $having_conditions);
    }

    if ($this->order_by) {
      $order = $this->order_by_desc ? 'DESC' : 'ASC';
      $query .= " ORDER BY " . $this->quote_identifier($this->order_by) . " $order";
    }

    if ($this->limit) {
      $query .= " LIMIT {$this->limit}";
    }

    if ($this->offset !== null) {
      $query .= " OFFSET {$this->offset}";
    }

    if ($this->union) {
      foreach ($this->union as $union_query) {
        $query .= " UNION " . $union_query->get();
      }
    }

    $stmt = $this->pdo_connection->prepare($query);

    if ($this->where) {
      foreach ($this->where as $condition) {
        list($column, $operator, $value) = $condition;
        $stmt->bindValue(":$column", $value);
      }
    }

    if ($this->having) {
      foreach ($this->having as $condition) {
        list($column, $operator, $value) = $condition;
        $stmt->bindValue(":having_$column", $value);
      }
    }

    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function count()
  {

  }
}
