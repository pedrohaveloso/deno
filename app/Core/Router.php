<?

namespace App\Core;

class Router
{
  private static $routes = [];

  private static $guards = [];

  private static $guard_counter = 1;

  private static $on = [];

  public static function group(string $path, array $routes, ?array $guard = null)
  {
    foreach ($routes as $route) {
      $route['path'] = $path . $route['path'];
      $route['path'] = str_replace('//', '/', $route['path']);

      if (mb_substr($route['path'], -1) == '/') {
        $route['path'] = mb_substr($route['path'], 0, -1);
      }

      $route['guard'] = null;

      if ($guard !== null) {
        self::$guards[$guard['id']] = $guard['guard'];
        $route['guard'] = $guard['id'];
      }

      self::$routes[$route['method']][$route['path']] = [
        'action' => $route['action'],
        'guard' => $route['guard'],
      ];
    }
  }

  public static function guard(\Closure $condition, \Closure $on_guard)
  {
    return [
      'id' => self::$guard_counter++,
      'guard' => [
        'condition' => $condition,
        'on_guard' => $on_guard
      ]
    ];
  }

  public static function get(string $path, string|\Closure $action)
  {
    return ['method' => 'GET', 'path' => $path, 'action' => $action];
  }

  public static function post(string $path, string|\Closure $action)
  {
    return ['method' => 'POST', 'path' => $path, 'action' => $action];
  }

  public static function on(int $status_code, string|\Closure $action)
  {
    self::$on[$status_code] = $action;
  }

  public static function dispatch()
  {
    try {
      $current_uri = explode('?', $_SERVER['REQUEST_URI']);
      $current_method = $_SERVER['REQUEST_METHOD'];

      $path = $current_uri[0];

      if (empty(self::$routes[$current_method][$path])) {
        $action = self::$on[404] ?? http_response_code(404) && exit;
      } else {
        $action = self::$routes[$current_method][$path];
      }

      if (is_array($action)) {
        $guard = $action['guard'];
        $action = $action['action'];

        $guard = self::$guards[$guard] ?? null;

        if (!empty($guard['condition']) && $guard['condition']()) {
          $guard['on_guard']();
        }
      }

      if (is_string($action)) {
        $action = explode('@', $action);

        $class = 'App\\Controller\\' . mb_convert_case($action[0], MB_CASE_TITLE) . 'Controller';
        $method = $action[1];

        $class = new $class();
        $class->$method();

        return;
      }

      $action();
    } catch (\Throwable | \Error | \Exception $exception) {
      if (ini_get('display_errors') === 1) {
        var_dump($exception->getMessage());
      }

      (self::$on[500] ?? fn() => http_response_code(500) && exit )();
    }
  }
}