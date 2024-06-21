<?

namespace App\Core;

// use App\Core\Router\Group;
// use App\Core\Router\Guard;

// class Router
// {
//   public static array $routes = [];

//   public static function add(Group $group)
//   {
//     foreach ($group->routes as $method => $routes) {
//       foreach ($routes as $route) {
//         if (is_array($route)) {
//           $full_path = rtrim($group->path, '/') . '/' . ltrim(key($route), '/');
//           $action = current($route);

//           $route_arr = self::build_route_array($full_path, $action, $method);

//           if ($group->guard) {
//             $route_arr['guard'] = $group->guard;
//           }

//           self::merge_routes(self::$routes, $route_arr);
//         }
//       }
//     }
//   }

//   private static function build_route_array(
//     string $path,
//     \Closure|string $action,
//     string $method
//   ): array {
//     $parts = explode('/', trim($path, '/'));

//     $route = [];

//     $current = &$route;

//     foreach ($parts as $part) {
//       $current[$part] = [];
//       $current = &$current[$part];
//     }

//     $current = [
//       'action' => $action,
//       'method' => $method
//     ];

//     return $route;
//   }

//   private static function merge_routes(array &$base, array $new)
//   {
//     foreach ($new as $key => $value) {
//       if (is_array($value) && isset($base[$key]) && is_array($base[$key])) {
//         self::merge_routes($base[$key], $value);
//       } else {
//         $base[$key] = $value;
//       }
//     }
//   }

//   public static function group(string $path, array $routes, ?Guard $guard = null)
//   {
//     self::add(new Group($path, $routes, $guard));
//   }

//   public static function get(string $path, \Closure|string $action)
//   {
//     return ['GET' => [$path => $action]];
//   }

//   public static function post(string $path, \Closure|string $action)
//   {
//     return ['POST' => [$path => $action]];
//   }

//   public static function put(string $path, \Closure|string $action)
//   {
//     return ['PUT' => [$path => $action]];
//   }

//   public static function delete(string $path, \Closure|string $action)
//   {
//     return ['DELETE' => [$path => $action]];
//   }

//   public static function guard(array $conditions, \Closure $on): Guard
//   {
//     return new Guard($conditions, $on);
//   }

//   public static function dispatch()
//   {
//     $uri = $_SERVER['REQUEST_URI'];
//     $method = $_SERVER['REQUEST_METHOD'];

//     $parts = explode('/', trim($uri, '/'));
//     $current = self::$routes;

//     foreach ($parts as $part) {
//       if (isset($current[$part])) {
//         $current = $current[$part];
//       } else {
//         http_response_code(404);
//         echo "404 Not Found";
//         return;
//       }
//     }

//     if (isset($current['method']) && $current['method'] === $method) {
//       if (isset($current['guard']) && $current['guard'] instanceof Guard) {
//         $current['guard']->start();
//       }

//       $action = $current['action'];

//       if ($action instanceof \Closure) {
//         $action();
//       } else {
//         $action = explode('@', $action);

//         $class = 'App\\Controller\\' .
//           (mb_convert_case(str_replace('/', '\\\\', $action[0]), MB_CASE_TITLE)) .
//           'Controller';

//         $class = new $class();
//         $method = $action[1];

//         $class->$method();
//       }
//     } else {
//       http_response_code(405);
//       echo "405 Method Not Allowed";
//     }
//   }  
// }


// class Router
// {
//   private static $routes = [];
//   private static $group_prefix = '';
//   private static $group_middleware = null;

//   public static function get($path, $callback)
//   {
//     self::add_route('GET', $path, $callback);
//   }

//   public static function post($path, $callback)
//   {
//     self::add_route('POST', $path, $callback);
//   }

//   private static function add_route($method, $path, $callback)
//   {
//     $full_path = self::$group_prefix . $path;
//     self::$routes[] = [
//       'method' => $method,
//       'path' => $full_path,
//       'callback' => $callback,
//       'middleware' => self::$group_middleware,
//     ];
//   }

//   public static function group($prefix, $routes, $middleware = null)
//   {
//     $previous_prefix = self::$group_prefix;
//     $previous_middleware = self::$group_middleware;

//     self::$group_prefix .= $prefix;
//     self::$group_middleware = $middleware;

//     foreach ($routes as $route) {
//       if (is_callable($route)) {
//         $route();
//       }
//     }

//     self::$group_prefix = $previous_prefix;
//     self::$group_middleware = $previous_middleware;
//   }

//   public static function guard($conditions, $callback)
//   {
//     return function () use ($conditions, $callback) {
//       foreach ($conditions as $condition) {
//         if (!$condition) {
//           $callback();
//           return false;
//         }
//       }
//       return true;
//     };
//   }

//   public static function dispatch()
//   {
//     $method = $_SERVER['REQUEST_METHOD'];
//     $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

//     foreach (self::$routes as $route) {
//       if ($method == $route['method'] && preg_match("#^{$route['path']}$#", $path)) {
//         if ($route['middleware'] === null || call_user_func($route['middleware'])) {
//           call_user_func($route['callback']);
//           return;
//         }
//       }
//     }

//     if (!headers_sent()) {
//       http_response_code(404);
//       echo "404 Not Found";
//     }
//   }
// }