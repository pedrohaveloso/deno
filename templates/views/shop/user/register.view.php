<main class="flex p-2 flex-grow min-h-[calc(100vh-70px)]">
  <div class="flex-grow grid place-items-center">
    <form hx-post="/user/register" hx-trigger="submit" hx-target="#error"
      class="max-w-[500px] w-full p-2 sm:p-6 flex flex-col items-center justify-center gap-8 h-full">
      <h2 class="text-3xl font-medium text-indigo-800">
        <?= _('Criar conta') ?>
      </h2>

      <div class="flex flex-col gap-4 w-full" id="form-inputs">
        <Input\Generic id="fullname" name="fullname" label="<?= _('Nome') ?>" required="true" icon="person"
          placeholder="João da Silva...">
        </Input\Generic>

        <Input\Generic id="email" name="email" label="<?= _('E-mail') ?>" icon="contact" required="true" type="email"
          placeholder="joaosilva@email.com">
        </Input\Generic>

        <Input\Generic id="password" name="password" minlength="12" label="<?= _('Senha') ?>" icon="key" required="true"
          type="password" placeholder="************">
        </Input\Generic>
      </div>

      <div id="error"></div>

      <Button\Primary type="submit" class="w-full h-12 sm:h-14">
        <?= _('Cadastrar') ?>
      </Button\Primary>

      <a href="/user/login">
        <?= _('Já possui uma conta?') ?> <strong><?= _('Entre') ?></strong>.
      </a>
    </form>
  </div>

  <div
    class="hidden md:flex *:text-indigo-50 gap-8 text-center min-h-fit p-16 max-w-[50%] relative flex-grow flex-col items-center justify-center rounded-xl">
    <h2 class="text-4xl lg:text-5xl xl:text-6xl z-50">
      <?= _('Bem-vindo à') ?> <strong><?= _('Deno') ?></strong>
    </h2>

    <p class="text-xl lg:text-2xl z-50 max-w-[600px]">
      <?= _('Para ter acesso em todos os nossos serviços e finalizar suas compras, crie uma conta.') ?>
    </p>

    <img loading="lazy" src="/public/assets/images/login_banner.webp" alt="<?= _('Imagem de fundo de login') ?>"
      class="rounded-2xl absolute w-full h-full bg-indigo-800">
  </div>
</main>