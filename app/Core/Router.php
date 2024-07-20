<?

namespace App\Core;

use Closure;

/**
 * -----------------------------------------------------------------------------
 * Ao criar um novo roteador, extenda-o dessa classe e utilize suas funções para
 * criar novas rotas e guardas. Implemente o método [routes].
 * 
 * @author phav <pedrohaveloso@gmail.com>
 * -----------------------------------------------------------------------------
 */
abstract class Router
{
  /**
   * @return void
   */
  abstract public function routes(): void;

  /**
   * Adiciona uma nova rota com o método "GET".
   * @param string $path
   * @param \Closure|string $action
   * @return void
   */
  protected static function get(string $path, Closure|string $action): void
  {
    self::add_route('GET', $path, $action);
  }

  /**
   * Adiciona uma nova rota com o método "POST".
   * @param string $path
   * @param \Closure|string $action
   * @return void
   */
  protected static function post(string $path, Closure|string $action): void
  {
    self::add_route('POST', $path, $action);
  }

  /**
   * Adiciona uma nova rota de erro.
   * @param int $code
   * @param \Closure|string $action
   * @return void
   */
  protected static function error(int $code, Closure|string $action): void
  {
    self::$error_routes[$code] = $action;
  }

  /**
   * Inicia e cria um novo guarda.
   * @param string $guard_name 
   * @param \Closure $guard_closure
   * @param \Closure|null $block_closure
   * @return void
   */
  protected static function guard_start(
    string $guard_name,
    Closure $guard_closure,
    Closure $block_closure = null
  ): void {
    self::$active_guards[$guard_name] = true;

    self::$guards[$guard_name] = [
      'guard_closure' => $guard_closure,
      'block_closure' => $block_closure
    ];
  }

  /**
   * Finaliza um guarda.
   * @param string $guard_name
   * @return void
   */
  protected static function guard_end(string $guard_name): void
  {
    unset(self::$active_guards[$guard_name]);
  }

  /**
   * Inicia um novo grupo.
   * @param string $group_path
   * @return void
   */
  protected static function group_start(string $group_path): void
  {
    self::$active_groups[$group_path] = $group_path;
  }

  /**
   * Finaliza um grupo.
   * @param string $group_path
   * @return void
   */
  protected static function group_end(string $group_path): void
  {
    unset(self::$active_groups[$group_path]);
  }

  /**
   * Inicia o roteador.
   * @return void
   */
  public static function dispatch(): void
  {
    $method = $_SERVER['REQUEST_METHOD'];
    $path = $_SERVER['REQUEST_URI'];

    $path = parse_url($path, PHP_URL_PATH);

    self::handle_route($method, $path);
  }

  /**
   * @var array<string, array<string, array{action: Closure|string, guards: array}>>
   */
  private static array $routes = ['GET' => [], 'POST' => []];

  /**
   * @var array<int, Closure|string>
   */
  private static array $error_routes = [];

  /**
   * @var array<string, array{guard_closure: Closure, block_closure: Closure}>
   */
  private static array $guards = [];

  /**
   * @var array<string, true>
   */
  private static array $active_guards = [];

  /**
   * @var array<string, true>
   */
  private static array $active_groups = [];

  /**
   * @param string $method
   * @param string $path
   * @param \Closure|string $action
   * @return void
   */
  private static function add_route(
    string $method,
    string $path,
    Closure|string $action
  ): void {
    $path = join('/', self::$active_groups) . "/$path";
    $path = trim($path, '/');
    self::$routes[$method][$path] = [
      'action' => $action,
      'guards' => self::$active_guards
    ];
  }

  /**
   * @param string $method
   * @param string $path
   * @return void
   */
  private static function handle_route(string $method, string $path): void
  {
    try {
      $path = trim($path, '/');

      $routes = self::$routes[$method] ?? [];

      foreach ($routes as $route_path => $route) {
        $route_path = str_replace('//', '/', $route_path);

        $route_regex = preg_replace(
          '/\{([a-zA-Z0-9_]+)\}/',
          '(?P<$1>[^/]+)',
          $route_path
        );

        $route_regex = "#^$route_regex$#";

        if (preg_match($route_regex, $path, $matches)) {
          $guards = array_keys($route['guards']);

          foreach ($guards as $guard_name) {
            if (!self::$guards[$guard_name]['guard_closure']()) {
              self::$guards[$guard_name]['block_closure']();
              return;
            }
          }

          foreach ($matches as $key => $value) {
            if (is_string($key)) {
              $GLOBALS['ROUTER_PATH_VARIABLES'][$key] = $value;
            }
          }

          $action = $route['action'];

          self::execute_action($action);

          return;
        }
      }

      self::handle_error(404);
    } catch (\Throwable | \Error | \Exception $exception) {
      if (ini_get('display_errors') == 1) {
        var_dump($exception->getMessage());
      }

      self::handle_error(500);
    }
  }

  /**
   * @param int $code
   * @return void
   */
  private static function handle_error(int $code): void
  {
    $action = self::$error_routes[$code] ?? null;

    if ($action !== null) {
      self::execute_action($action);
    } else {
      http_response_code($code);
      die();
    }
  }

  /**
   * @param \Closure|string $action
   * @return void
   */
  private static function execute_action(Closure|string $action): void
  {
    if (is_string($action)) {
      $action = explode('@', $action);

      $action[0] = mb_convert_case($action[0], MB_CASE_TITLE);
      $action[0] = str_replace('/', '\\', $action[0]);

      $class = "App\\Controller\\{$action[0]}Controller";
      $method = $action[1];

      $class = new $class();
      $class->$method();
    } elseif ($action instanceof Closure) {
      $action();
    }
  }
}
