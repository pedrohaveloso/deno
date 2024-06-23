<?

if (!function_exists('dd')) {
  function dd(mixed ...$arguments): never
  {
    var_dump(...$arguments);
    exit;
  }
}