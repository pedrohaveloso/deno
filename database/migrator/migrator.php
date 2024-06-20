<?php

include __DIR__ . '/../../bootstrap/db_connections.php';
include __DIR__ . '/../../bootstrap/load_global.php';

foreach (glob(__DIR__ . '/../migrations/*.php') as $migration) {
  var_dump($migration);
}