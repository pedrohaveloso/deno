<?

namespace App\Core\Router;

class Group
{
  public function __construct(
    public string $path,
    public array $routes,
    public ?Guard $guard = null
  ) {
  }
}
