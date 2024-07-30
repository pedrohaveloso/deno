<header class="p-4 fixed">
  <a href="/user/choice">
    <Button.Primary class="py-2 px-4">
      <?= _('Voltar') ?>
    </Button.Primary>
  </a>
</header>

<main class="flex-grow flex-col flex items-center justify-center p-2">
  <form hx-post="/admin/login" hx-trigger="submit" hx-target="#error"
    class="flex flex-col gap-8">
    <h1 class="text-center mb-4">
      <strong class="text-3xl">Deno</strong>
      <br />
      <?= _('Painel administrativo') ?>
    </h1>

    <div class="flex-col flex gap-4">
      <Input.Generic id="username" name="username" required="true"
        placeholder="<?= _('Digite seu usuário...') ?>"
        label="<?= _('Usuário') ?>">
      </Input.Generic>

      <Input.Generic id="password" name="password" type="password"
        required="true" placeholder="<?= _('Digite sua senha...') ?>"
        label="<?= _('Senha') ?>">
      </Input.Generic>

      <div id="error" class="mt-4">
      </div>
    </div>

    <Button.Primary class="h-12" type="submit">
      <?= _('Entrar') ?>
    </Button.Primary>
  </form>
</main>