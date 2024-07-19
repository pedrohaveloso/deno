<?

namespace App\Core\Database;

use PDO;

class QueryBuilder
{
  public function __construct(TableString $table, PDO $pdo_connection)
  {
    $this->table = $table;
    $this->pdo_connection = $pdo_connection;
  }

  /**
   * Conexão PDO do Builder.
   * @var PDO
   */
  private PDO $pdo_connection;

  /**
   * Tabela primária utilizada.
   * @var TableString
   */
  private TableString $table;

  /**
   * Colunas a serem selecionadas.
   * @var ColumnString[] 
   */
  private array $select = ['*'];

  /**
   * Coluna para ordenação.
   * @var ColumnString|null
   */
  private ColumnString|null $order_by = null;


  /**
   * Define se a ordenação será descendente.
   * @var bool
   */
  private bool $order_by_desc = false;

  /**
   * Comparações da query.
   * @var WhereClause[]
   */
  private array $where = [];

  private ?int $limit = null;

  private ?int $offset = null;

  /**
   * JOINs com outras tabelas. 
   * @var JoinClause[]
   */
  private array $join = [];

  /**
   * Define o agrupamento.
   * @var ColumnString[]
   */
  private array $group_by = [];

  /**
   * @var HavingClause[] 
   */
  private array $having = [];

  /**
   * Une outras queries.
   * @var QueryBuilder[]
   */
  private array $union = [];

  public function select(
    ColumnString $select = null,
    ColumnString ...$rest
  ): QueryBuilder {
    $this->select = $select === null
      ? ['*']
      : $this->select = [$select, ...$rest];

    return $this;
  }

  public function order_by(ColumnString $column): QueryBuilder
  {
    $this->order_by = $column;
    $this->order_by_desc = false;

    return $this;
  }

  public function order_by_desc(ColumnString $column): QueryBuilder
  {
    $this->order_by = $column;
    $this->order_by_desc = true;

    return $this;
  }

  public function where(
    ColumnString $column,
    string $operator,
    mixed $value
  ): QueryBuilder {
    $this->where[] = new WhereClause($column, $operator, $value);

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

  public function join(
    TableString $table,
    ColumnString $first_column,
    string $operator,
    ColumnString $second_column
  ): QueryBuilder {
    $this->join[] = new JoinClause(
      JoinType::Inner,
      $table,
      $first_column,
      $operator,
      $second_column
    );

    return $this;
  }

  public function left_join(
    TableString $table,
    ColumnString $first_column,
    string $operator,
    ColumnString $second_column
  ): QueryBuilder {
    $this->join[] = new JoinClause(
      JoinType::Left,
      $table,
      $first_column,
      $operator,
      $second_column
    );

    return $this;
  }

  public function right_join(
    TableString $table,
    ColumnString $first_column,
    string $operator,
    ColumnString $second_column
  ): QueryBuilder {
    $this->join[] = new JoinClause(
      JoinType::Right,
      $table,
      $first_column,
      $operator,
      $second_column
    );

    return $this;
  }

  public function group_by(ColumnString ...$columns): QueryBuilder
  {
    $this->group_by = $columns;

    return $this;
  }

  public function having(
    ColumnString $column,
    string $operator,
    mixed $value
  ): QueryBuilder {
    $this->having[] = new HavingClause($column, $operator, $value);

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

  /**
   * ---------------------------------------------------------------------------
   */

  private function query()
  {
    $selects = $this->select == ['*']
      ? '*'
      : join(
        ', ',
        array_map(
          fn(ColumnString $select) => $select->get(),
          $this->select
        )
      );

    $query = " SELECT $selects FROM {$this->table->get()} ";

    foreach ($this->join as $join) {
      $query .= " {$join->get()} ";
    }

    if ($this->where != []) {
      $clauses = array_map(
        fn(WhereClause $clause) => $clause->get(),
        $this->where
      );

      $query .= ' WHERE ' . implode(' AND ', $clauses) . ' ';
    }

    if ($this->group_by != []) {
      $group_columns = implode(
        ', ',
        array_map(
          fn(ColumnString $column) => $column->get(),
          $this->group_by
        )
      );

      $query .= " GROUP BY $group_columns ";
    }

    if ($this->having != []) {
      $clauses = array_map(
        fn(WhereClause $clause) => $clause->get(),
        $this->having
      );

      $query .= ' HAVING ' . implode(' AND ', $clauses) . ' ';
    }

    if ($this->order_by !== null) {
      $order = $this->order_by_desc ? ' DESC ' : ' ASC ';

      $query .= ' ORDER BY ' . $this->order_by->get() . " $order ";
    }

    if ($this->limit !== null) {
      $query .= " LIMIT {$this->limit} ";
    }

    if ($this->offset !== null) {
      $query .= " OFFSET {$this->offset} ";
    }

    if ($this->union != []) {
      foreach ($this->union as $union_query) {
        $query .= " UNION " . $union_query->get();
      }
    }

    $stmt = $this->pdo_connection->prepare($query);

    if ($this->where != []) {
      foreach ($this->where as $clause) {
        $stmt->bindValue(
          $clause->replace_label,
          $clause->value
        );
      }
    }

    if ($this->having != []) {
      foreach ($this->having as $clause) {
        $stmt->bindValue(
          $clause->replace_label,
          $clause->value
        );
      }
    }

    return $stmt;
  }

  public function get()
  {
    $stmt = $this->query();
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function count()
  {
    $stmt = $this->query();
    $stmt->execute();

    return $stmt->rowCount();
  }
}
