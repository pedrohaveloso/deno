<?php

$GLOBALS['db___primary'] = new PDO(
  'pgsql:host=db;port=5432;dbname=deno_dev;',
  'postgres',
  'dev',
  [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
);