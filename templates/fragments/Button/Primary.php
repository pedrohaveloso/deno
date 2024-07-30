<? if (!empty($attr('href'))): ?>
  <a href="<?= $attr('href') ?>">
  <? endif ?>

  <button type="<?= $attr('type') ?? 'button' ?>"
    class="<?= $attr('class') ?? '' ?> bg-indigo-800 rounded-2xl text-indigo-50 hover:bg-indigo-900 transition-all duration-500"
    <?= $attr('rest') ?>>
    <?= $children ?>
  </button>

  <? if (!empty($attr('href'))): ?>
  </a>
<? endif ?>