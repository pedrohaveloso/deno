<?

namespace App\Core\Router;

class Guard
{
  public function __construct(
    private array $conditions,
    private \Closure $on
  ) {
  }

  public function start()
  {
    if (in_array(true, $this->conditions)) {
      $on = $this->on;
      $on();
    }
  }
}
