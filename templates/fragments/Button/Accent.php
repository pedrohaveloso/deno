<? if (!empty($attr('href'))): ?>
  <a href="<?= $attr('href') ?>">
  <? endif ?>

  <button type="<?= $attr('type') ?? 'button' ?>"
    class="<?= $attr('class') ?? '' ?> bg-indigo-600 outline-none rounded-2xl text-white hover:bg-indigo-700 transition-all duration-500"
    <?= $attr('rest') ?>>
    <?= $children ?>
  </button>

  <? if (!empty($attr('href'))): ?>
  </a>
<? endif ?>