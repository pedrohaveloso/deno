<?php

return [
  'up' => function () {
    db()->query(<<<SQL
      CREATE TABLE IF NOT EXISTS `users` (
      );
    SQL);
  },

  'down' => function () {
    db()->query(<<<SQL
      DROP TABLE IF EXISTS `users`;
    SQL);
  }
];