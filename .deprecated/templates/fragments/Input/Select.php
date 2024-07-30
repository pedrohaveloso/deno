<? if (!empty($attr('label'))): ?>
  <label for="<?= $attr('id') ?? '' ?>" class="flex flex-col gap-2 w-full">
    <span class="ps-6 text-gray-700 font-medium">
      <?= $attr('label') ?? '' ?>

      <? if (empty($attr('required'))): ?>
        <span class="font-normal">*</span>
      <? endif ?>
    </span>
  <? endif; ?>

  <div
    class="<?= $attr('class') ?? '' ?> bg-gray-100 rounded-2xl flex items-center justify-center">

    <select id="<?= $attr('id') ?? '' ?>" name="<?= $attr('name') ?? '' ?>"
      type="<?= $attr('type') ?? 'text' ?>"
      placeholder="<?= $attr('placeholder') ?? '' ?>"
      class="bg-transparent rounded-2xl px-6 py-4 w-full outline-none me-4"
      <?= empty($attr('required')) ? 'required' : '' ?>>
      <?= $children ?>
    </select>

    <? if (!empty($attr('icon'))): ?>
      <Icon name="<?= $attr('icon') ?>" class="pe-6 *:!fill-gray-700"></Icon>
    <? endif; ?>
  </div>

  <? if (!empty($attr('label'))): ?>
  </label>
<? endif; ?>