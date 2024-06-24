<main class="p-8 sm:p-12 flex flex-col gap-12">
  <section class="flex flex-col lg:flex-row flex-grow gap-16 items-center">
    <p class="w-full lg:w-2/3 text-xl lg:text-2xl xl:text-3xl text-gray-950">
      <?= _('Bem-vindo à') ?>

      <strong class="text-indigo-950">Deno</strong>,

      <?= _('
      sua parceira de confiança no setor industrial. 
      Por décadas, temos nos dedicado a fornecer soluções inovadoras que 
      capacitam empresas a se destacarem em seus respectivos campos.
      ') ?>
    </p>

    <img class="w-full sm:w-2/3 lg:w-1/3 h-full" loading="lazy" src="/public/assets/images/delivery_img.svg"
      alt="<?= _('Imagem de entregador com uma encomenda') ?>">
  </section>

  <hr />

  <section class="flex w-full flex-col gap-12 items-center">
    <h2 class="font-bold text-xl sm:text-2xl text-center">
      <?= _('Nossos produtos:') ?>
    </h2>

    <div class="w-full grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 lg:gap-8">
      <? for ($i = 0; $i < 8; $i++): ?>
        <article class="w-full bg-indigo-50 text-center rounded-3xl p-4 flex flex-col gap-4">
          <p class="text-lg font-medium">Trator P.24 / 40</p>

          <img loading="lazy" class="py-2 h-52 w-full object-scale-down"
            src="https://www.deere.com.br/assets/images/region-3/products/tractors/5e-series/trator-pequeno-5080e-desktop-1009x768.png"
            alt="Produto em destaque: @TODO TODO COLOCAR O NOME AQUI...">

          <p class="text-end">10x de <strong class="text-lg">R$ 9999,99</strong></p>

          <_buttons.accent class="w-full h-10">
            <?= _('Adicionar') ?>
          </_buttons.accent>

          <_buttons.secondary class="w-full h-10">
            <?= _('Ver detalhes') ?>
          </_buttons.secondary>
        </article>
      <? endfor ?>
    </div>

    <a href="/products" class="w-full text-center">
      <_buttons.primary class="w-full sm:max-w-96 h-14 text-xl">
        <?= _('Ver mais produtos') ?>
      </_buttons.primary>
    </a>
  </section>
</main>

<_footer></_footer>