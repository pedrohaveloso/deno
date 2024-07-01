<main class="text-center flex flex-col flex-grow justify-center items-center gap-6 py-16 p-4">
  <h1 class="text-3xl sm:text-4xl font-bold">
    <?= ('Página não encontrada') ?>
  </h1>

  <p class="sm:text-lg">
    <?= ('A página que você está procurando não foi encontrada.') ?>
  </p>

  <div class="flex flex-col sm:flex-row gap-4 sm:gap-2 mt-6 text-lg w-full sm:w-fit">
    <a href="javascript:history.go(-1)">
      <_buttons.secondary type="submit" class="w-full sm:w-fit h-12 px-14">
        <?= ('Voltar') ?>
      </_buttons.secondary>
    </a>

    <a href="/">
      <_buttons.primary type="submit" class="w-full sm:w-fit h-12 px-14">
        <?= ('Página inicial') ?>
      </_buttons.primary>
    </a>
  </div>
</main>