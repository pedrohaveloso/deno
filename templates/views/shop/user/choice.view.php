<main class="text-center flex flex-col flex-grow justify-center items-center gap-6 py-16 p-4 mt-8">
  <h1 class="text-3xl sm:text-4xl font-bold">
    <?= _('Você não está logado') ?>
  </h1>

  <p class="sm:text-xl max-w-[700px]">
    <?= _('Para prosseguir com suas compras em nosso site, crie uma conta ou entre com a sua.') ?>
  </p>

  <div class="flex flex-col sm:flex-row gap-4 sm:gap-2 mt-6 text-lg w-full sm:w-fit">
    <a href="/user/login">
      <Button\Secondary type="submit" class="w-full sm:w-fit h-12 px-14">
        <?= _('Entrar') ?>
      </Button\Secondary>
    </a>

    <a href="/user/register">
      <Button\Primary type="submit" class="w-full sm:w-fit h-12 px-14">
        <?= _('Cadastrar-se') ?>
      </Button\Primary>
    </a>
  </div>

  <a href="/admin/login">
    <small>
      É administrador? Entre aqui.
    </small>
  </a>
</main>