<main class="flex flex-col px-12 py-10 gap-8">
  <div class="flex justify-between items-center">
    <h1 class="text-2xl font-medium">
      <?= _('Produtos') ?>
    </h1>

    <Button\Primary href="/backoffice/products/add" class="px-8 py-2">
      <?= _('Adicionar') ?>
    </Button\Primary>
  </div>

  <form action="/backoffice/products" class="flex gap-2 bg-gray-50 rounded-3xl p-8">
    <Input\Filter name="filter[name]" placeholder="<?= _('Nome') ?>">
    </Input\Filter>

    <Input\Filter name="filter[description]" placeholder="<?= _('Descrição') ?>">
    </Input\Filter>

    <Button\Accent type="submit" class="px-12">Filtrar</Button\Accent>
  </form>

  <div id="paginator" class="flex flex-col gap-8">
    <?= $paginator_brick ?>
  </div>
</main>