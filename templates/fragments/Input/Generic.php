<? if (!empty($attributes['label'])): ?>
  <label for="<?= $attributes['id'] ?? '' ?>" class="flex flex-col gap-2 w-full">
    <span class="ps-6 text-gray-700 font-medium"><?= $attributes['label'] ?? '' ?></span>
  <? endif; ?>

  <div class="<?= $attributes['class'] ?? '' ?> bg-gray-100 rounded-2xl flex items-center justify-center">
    <input id="<?= $attributes['id'] ?? '' ?>" name="<?= $attributes['name'] ?? '' ?>"
      type="<?= $attributes['type'] ?? 'text' ?>" placeholder="<?= $attributes['placeholder'] ?? '' ?>"
      minlength="<?= $attributes['minlength'] ?? '' ?>" class="bg-transparent rounded-2xl px-6 py-4 w-full outline-none"
      <?= isset($attributes['required']) ? 'required' : '' ?>>

    <? if (!empty($attributes['icon'])): ?>
      <Icon name="<?= $attributes['icon'] ?>" class="pe-6 *:!fill-gray-700"></Icon>
    <? endif; ?>
  </div>

  <? if (!empty($attributes['label'])): ?>
  </label>
<? endif; ?>