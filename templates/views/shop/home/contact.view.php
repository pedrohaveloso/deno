<main class="py-8 p-4 sm:p-12 flex flex-col items-center justify-center gap-12 flex-grow">
  <h1 class="font-bold text-2xl sm:text-3xl">
    <?= _('Central de atendimento') ?>
  </h1>

  <section class="w-full flex flex-col gap-4">
    <h2 class="font-medium text-2xl">
      <?= _('Tópicos frequentes') ?>
    </h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
      <? foreach ($topics as $topic): ?>
        <a href="<?= $topic['slug'] ?>">
          <_buttons.secondary class="w-full px-4 py-4 h-full font-medium">
            <?= $topic['title'] ?>
          </_buttons.secondary>
        </a>
      <? endforeach; ?>
    </div>
  </section>

  <section class="w-full flex flex-col gap-4">
    <h2 class="font-medium text-2xl">
      <?= _('Perguntas frequentes') ?>
    </h2>

    <div class="flex flex-col gap-2">
      <? foreach ($questions as $question): ?>
        <a href="<?= $question['slug'] ?>" class="flex gap-2">
          <_icon name="contact"></_icon>
          <?= $question['title'] ?>
        </a>
      <? endforeach; ?>
    </div>
  </section>

  <section class="w-full flex flex-col lg:flex-row bg-indigo-100 rounded-2xl gap-6 p-6 items-center justify-center">
    <p class="w-full text-center lg:text-start lg:w-1/5 font-medium">
      <?= _('Inscreva-se para receber novidades e ofertas especiais') ?>
    </p>

    <form action="/" class="flex flex-col sm:flex-row gap-4 sm:gap-2 w-full">
      <_inputs.generic id="email" name="email" required="true" type="email"
        placeholder="<?= _('Insira seu e-mail...') ?>" class="!bg-indigo-50 w-full">
      </_inputs.generic>

      <_buttons.primary type="submit" class="px-10 text-nowrap w-full py-4 sm:py-0 sm:w-fit">
        <?= _('Inscrever-se') ?>
      </_buttons.primary>
    </form>
  </section>
</main>

<_footer></_footer>