<button type="<?= $attributes['type'] ?? 'button' ?>"
  class="<?= $attributes['class'] ?? '' ?> bg-indigo-800 outline-none rounded-2xl text-indigo-50 hover:bg-indigo-900 transition-all duration-500">
  <?= $children ?>
</button>