<?

use App\Core\Router;

return new class extends Router {
  public function routes(): void
  {
    self::error(404, 'error@not_found');
  }
};
