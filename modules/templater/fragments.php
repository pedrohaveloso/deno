<?php

namespace Templater;

trait Fragments
{
  public static function process(string $content)
  {
    $file = file_get_contents(__DIR__ . '/template.php');

    $params = ['name' => 'hello'];

    $pattern = '/(\$attr\(\'.*?\'\))/s';

    preg_match_all($pattern, $file, $matches);

    $file = preg_replace_callback($pattern, function ($matche) use ($params) {
      $matche = str_replace('$attr(\'', '', $matche[0]);
      $name = substr($matche, 0, strlen($matche) - 2);
      return "'$params[$name]'";
    }, $file);

    file_put_contents(__DIR__ . '/exit.php', $file);
  }
}

Fragments::process('');