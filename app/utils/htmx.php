<?php

namespace App\Utils;

class HTMX
{
  public static function redirect(string $to)
  {
    ?>
    <div>
      <meta http-equiv="refresh" content="0; url=<?= $to ?>">
    </div>
    <?
  }
}