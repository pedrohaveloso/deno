<main class="py-8 p-4 sm:p-12 flex flex-col grow gap-8 lg:gap-16 items-center">
  <header
    class="flex flex-col lg:flex-row lg:items-center justify-between w-full gap-8">
    <div class="flex items-center gap-4 lg:gap-8">
      <Button.Secondary class="py-2 px-4" onclick="history.go(-1)">
        <?= _('Voltar') ?>
      </Button.Secondary>

      <h1 class="text-2xl font-medium">
        <?= _('Seu carrinho') ?>
      </h1>
    </div>

    <div
      class="flex flex-col-reverse lg:flex-row items-center gap-4 w-full lg:w-fit">
      <p class="px-4">
        <strong><?= _('Total:') ?></strong>
        R$ 530.000,00
      </p>

      <template data-hook-modal-name="clear-cart">
        <p>
          <?= _('Tem certeza que deseja limpar o carrinho?') ?>
        </p>

        <div class="flex">
          <Button.Secondary data-hook-modal-close="clear-cart">
            <?= _('Cancelar') ?>
          </Button.Secondary>

          <Button.Primary>
            <?= _('Limpar') ?>
          </Button.Primary>
        </div>
      </template>

      <Button.Secondary class="py-2 px-4 w-full lg:w-fit" data-hook="modal"
        data-hook-modal-open="clear-cart">
        <?= _('Limpar carrinho') ?>
      </Button.Secondary>

      <Button.Primary class="py-2 px-4 w-full lg:w-fit">
        <?= _('Prosseguir com a compra') ?>
      </Button.Primary>
    </div>
  </header>

  <section
    class="grid sm:grid-cols-1 md:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4 gap-4 place-items-center grow w-fit">
    <? for ($i = 0; $i < 10; $i++): ?>
      <article
        class="rounded-3xl p-4 gap-4 text-center border-2 border-indigo-100 flex flex-col">
        <h2 class="text-lg">
          <strong>4×</strong>
          Trator P.24 / 40
        </h2>

        <div class="flex gap-4">
          <img loading="lazy" class="py-2 h-32 w-full object-scale-down"
            src="https://www.deere.com.br/assets/images/region-3/products/tractors/5e-series/trator-pequeno-5080e-desktop-1009x768.png"
            alt="Produto em destaque: @TODO TODO COLOCAR O NOME AQUI...">

          <div class="flex flex-col w-full gap-2">
            <p>10x de R$ 9999,99</p>

            <Button.Accent class="py-2 px-4">
              <?= _('Ver detalhes') ?>
            </Button.Accent>

            <Button.Secondary class="py-2 px-4">
              <?= _('Remover') ?>
            </Button.Secondary>
          </div>
        </div>
      </article>
    <? endfor ?>
  </section>
</main>