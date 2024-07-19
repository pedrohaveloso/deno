<?

if (!function_exists('dd')) {
  function dd(mixed ...$arguments): never
  {
    var_dump(...$arguments);
    die;
  }
}

if (!function_exists('hdd')) {
  function hdd(mixed ...$arguments): never
  {
    foreach ($arguments as $argument) {
      highlight_string("<?\n" . var_export($argument, true) . "\n?>");
    }
    die;
  }
}
