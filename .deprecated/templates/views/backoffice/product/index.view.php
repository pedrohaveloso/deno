<Backoffice.Main>
  <Backoffice.Main.Header>
    <Breadcrumb>
      <?= _('Produtos') ?>
    </Breadcrumb>

    <Button.Primary href="/backoffice/products/add" class="px-8 py-2">
      <?= _('Adicionar') ?>
    </Button.Primary>
  </Backoffice.Main.Header>

  <form action="/backoffice/products"
    class="flex gap-2 bg-gray-50 rounded-3xl p-8">
    <Input.Filter name="filter[name]" placeholder="<?= _('Nome') ?>">
    </Input.Filter>

    <Input.Filter name="filter[description]"
      placeholder="<?= _('Descrição') ?>">
    </Input.Filter>

    <Button.Accent type="submit" class="px-12">
      Filtrar
    </Button.Accent>
  </form>

  <div id="paginator" class="flex flex-col gap-8">
    <?= $paginator_brick ?>
  </div>
</Backoffice.Main>