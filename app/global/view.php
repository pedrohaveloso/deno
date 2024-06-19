<?php

if (!function_exists('view')) {
  function view(string $name, ...$attributes)
  {
    extract($attributes);

    ob_start();
    include __BASEDIR__ . '/app/ui/view/' . $name . '.htmx.php';
    $inner_content = ob_get_clean();

    $components_pattern = '/<_([a-zA-Z0-9_.]+)([^>]*)>(.*?)<\/_[a-zA-Z0-9_.]+>/s';

    while (str_contains($inner_content, '<_')) {
      $inner_content = preg_replace_callback(
        $components_pattern,
        function ($matches) {
          $_name = $matches[1];

          $attributes_string = $matches[2];
          $children = $matches[3];

          $attributes = [];

          preg_match_all(
            '/([a-zA-Z0-9_:-]+)="([^"]*)"/',
            $attributes_string,
            $attributes_matches,
            PREG_SET_ORDER
          );

          foreach ($attributes_matches as $attr) {
            $attributes[$attr[1]] = $attr[2];
          }

          extract($attributes);

          ob_start();
          include __BASEDIR__ . '/app/ui/components/' . str_replace('.', '/', $_name) . '.phtml';
          $child = ob_get_clean();

          return $child;
        },
        $inner_content
      );
    }

    include __BASEDIR__ . '/app/ui/root.htmx.php';
  }
}