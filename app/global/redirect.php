<?php

if (!function_exists('redirect')) {
  function redirect(string $to)
  {
    ?>
    <div>
      <meta http-equiv="refresh" content="0; url=<?= $to ?>">
    </div>
    <?

    exit;
  }
}