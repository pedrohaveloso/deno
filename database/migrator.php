<?php

if (empty($argv[1])) {
  return;
}

include __DIR__ . '/../bootstrap/db_connections.php';

function db(string $name = 'primary'): PDO
{
  return $GLOBALS['db___primary'];
}

if ($argv[1] == 'migrate') {
  migrate();
}

if ($argv[1] == 'up' && !empty($argv[2])) {
  up($argv[2]);
}

function migration_id($migration_name)
{
  return substr($migration_name, 0, 14);
}

function up(string $name)
{
  $files = glob(__DIR__ . '/migrations/*.php');
}

function migrate()
{
  $files = glob(__DIR__ . '/migrations/*.php');

  $migrations = array_map(function ($file) {
    $migration = include $file;

    if (empty($migration['up']) || empty($migration['down'])) {
      throw new Exception('');
    }

    $migration['name'] = explode('/', $file);
    $migration['name'] = end($migration['name']);

    return $migration;
  }, $files);

  array_map(function ($migration) {
    $control = json_decode(file_get_contents(__DIR__ . '/migrations/control.json'));

    if (empty($control)) {
      $control = [];
    }

    if (in_array(migration_id($migration['name']), $control)) {
      return;
    }

    echo str_repeat('-', 50) . PHP_EOL;
    echo 'Migrating: ' . $migration['name'] . PHP_EOL;

    try {
      $migration['up']();

      $control[] = migration_id($migration['name']);
      file_put_contents(__DIR__ . '/migrations/control.json', json_encode($control));

    } catch (Exception $exception) {
      echo 'Error: ' . PHP_EOL;
      echo $exception->getMessage();
      echo PHP_EOL;
      exit;
    }

  }, $migrations);
}
