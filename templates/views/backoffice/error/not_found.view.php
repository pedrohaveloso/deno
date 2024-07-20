<Backoffice\Main class="flex items-center justify-center h-full">
  <h1 class="text-3xl sm:text-4xl font-bold">
    <?= _('Página não encontrada') ?>
  </h1>

  <p class="sm:text-lg">
    <?= _('A página que você está procurando não foi encontrada.') ?>
  </p>

  <div class="flex flex-col sm:flex-row gap-4 sm:gap-2 mt-6 text-lg w-full sm:w-fit">
    <a href="javascript:history.go(-1)">
      <Button\Secondary type="submit" class="w-full sm:w-fit h-12 px-14">
        <?= _('Voltar') ?>
      </Button\Secondary>
    </a>

    <a href="/backoffice">
      <Button\Primary type="submit" class="w-full sm:w-fit h-12 px-14">
        <?= _('Página inicial') ?>
      </Button\Primary>
    </a>
  </div>
</Backoffice\Main>