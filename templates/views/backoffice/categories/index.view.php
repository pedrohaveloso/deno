<main class="px-12 py-10">
  <h1 class="text-2xl font-medium">
    <?= _('Categorias') ?>
  </h1>

  <section>
  </section>

  <div>
    <?= $list_table ?>
  </div>

  <div hx-get="/backoffice/categories?page=1" hx-trigger="click" hx-target="table">
    <Button\Primary class="p-8">
      ANTERIOR
    </Button\Primary>
  </div>

  <div hx-get="/backoffice/categories?page=2" hx-trigger="click" hx-target="table">
    <Button\Primary class="p-8">
      PROXIMO
    </Button\Primary>
  </div>
</main>