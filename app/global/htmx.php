<?php

if (!function_exists('htmx_redirect')) {
  function htmx_redirect(string $to)
  {
    ?>
    <div>
      <meta http-equiv="refresh" content="0; url=<?= $to ?>">
    </div>
    <?
  }
}