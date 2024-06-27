<main class="flex-grow flex-col flex items-center justify-center">
  <form action="" class="flex flex-col gap-12">
    <h1 class="text-center">
      <strong class="text-3xl">Deno</strong>
      <br />
      <?= _('Painel Backoffice') ?>
    </h1>

    <div class="flex-col flex gap-2">
      <_inputs.generic label="<?= _('Usuário') ?>">
      </_inputs.generic>

      <_inputs.generic label="<?= _('Senha') ?>">
      </_inputs.generic>
    </div>

    <_buttons.primary class="h-12">
      <?= _('Entrar') ?>
    </_buttons.primary>
  </form>
</main>