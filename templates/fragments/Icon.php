<? $name = $attr('name') ?>

<span class="<?= $attr('class') ?? '' ?> flex icon w-6 h-6 *:w-full *:h-full *:fill-indigo-950" <?= $attr('rest') ?>>
  <? include FRAGMENTSDIR . '/Icons/' . $name . '.phtml'; ?>
</span>