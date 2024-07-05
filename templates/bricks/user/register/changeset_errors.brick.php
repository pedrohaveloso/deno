<p class="text-error">
  <?
  echo join(array_map(function ($error) {
    return $error . '<br />';
  }, $errors));
  ?>
</p>