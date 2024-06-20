<main class="flex p-2 w-screen flex-grow">
  <div class="flex-grow grid place-items-center">
    <form hx-post="/auth/register" hx-trigger="submit" hx-target="#form-inputs" hx-swap="afterend"
      class="max-w-[500px] w-full p-2 sm:p-6 flex flex-col items-center justify-center gap-8 h-full">
      <h2 class="text-3xl font-medium text-indigo-800">
        Criar conta
      </h2>

      <div class="flex flex-col gap-4 w-full" id="form-inputs">
        <_inputs.generic id="username" name="username" label="Nome" required="true" icon="person"
          placeholder="João da Silva...">
        </_inputs.generic>

        <_inputs.generic id="email" name="email" label="E-mail" icon="contact" required="true" type="email"
          placeholder="joaosilva@email.com">
        </_inputs.generic>

        <_inputs.generic id="password" name="password" label="Senha" icon="key" required="true" type="password"
          placeholder="************">
        </_inputs.generic>
      </div>

      <button type="submit"
        class="bg-indigo-800 outline-none rounded-2xl w-full h-12 sm:h-14 text-indigo-50 hover:bg-indigo-900 transition-all duration-500">
        Cadastrar
      </button>

      <a href="/auth/login">
        Já possui uma conta? <strong>Entre</strong>.
      </a>
    </form>
  </div>

  <div
    class="hidden md:flex *:text-indigo-50 gap-8 text-center min-h-fit p-16 max-w-[50%] relative flex-grow flex-col items-center justify-center rounded-xl">
    <h2 class="text-4xl lg:text-5xl xl:text-6xl z-50">
      Bem-vindo à <strong>Deco</strong>
    </h2>

    <p class="text-xl lg:text-2xl z-50 max-w-[600px]">
      Para ter acesso em todos os nossos serviços e finalizar suas compras, crie uma conta.
    </p>

    <img loading="lazy" src="/public/assets/images/login_banner.webp" alt="Imagem de fundo de login"
      class="rounded-2xl absolute w-full h-full">
  </div>
</main>