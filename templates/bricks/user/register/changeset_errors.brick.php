<p class="text-error">
  <?=
    join(array_map(function ($error) {
        return "$error <br />";
      }, $errors));
  ?>
</p>