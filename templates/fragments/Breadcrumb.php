<?

$items = array_map('trim', explode(';', $children));
$last = array_pop($items);

?>


<div class="flex items-center h-fit gap-2">
  <? foreach ($items as $item) {
    $item = explode(':', $item);

    if (!empty($item[1])) {
      ?>
      <a href="<?= $item[1] ?>">
        <?= $item[0] ?>
      </a>
      <?
    } else {
      ?>
      <p>
        <?= $item[0] ?>
      </p>
      <?
    }

    // ">" symbol: 
    ?> &gt;
    <?

  } ?>

  <h1 class="text-2xl font-medium"><?= $last ?></h1>
</div>