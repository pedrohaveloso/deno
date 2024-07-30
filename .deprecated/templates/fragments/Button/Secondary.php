<? if (!empty($attr('href'))): ?>
  <a href="<?= $attr('href') ?>">
  <? endif ?>

  <button type="<?= $attr('type') ?? 'button' ?>"
    class="<?= $attr('class') ?? '' ?> bg-indigo-50 rounded-2xl text-indigo-950 hover:bg-indigo-100 transition-all duration-500"
    <?= $attr('rest') ?>>
    <?= $children ?>
  </button>

  <? if (!empty($attr('href'))): ?>
  </a>
<? endif ?>