<?php

use App\Utils\Formatter;

?>

<Backoffice\Main>
  <Breadcrumb>
    <?= _('Produtos') ?> : /backoffice/products;
    <?= $product ? _('Editar') : _('Adicionar') ?>
  </Breadcrumb>

  <form action="" class="flex gap-2" data-hook="fill-form"
    data-hook-values="<?= Formatter::array_to_attribute($product) ?>">
    <Input\Generic id="product-name" name="name" maxlength="155"
      label="<?= _('Nome') ?>">
    </Input\Generic>

    <Input\Generic id="product-description" name="description" maxlength="2000"
      label="<?= _('Descrição') ?>">
    </Input\Generic>

    <Input\Generic id="product-value" name="value" type="number" min="0"
      label="<?= _('Valor') ?>">
    </Input\Generic>

    <Input\Generic id="product-in-stock" name="in_stock" type="number" min="0"
      label="<?= _('Estoque') ?>">
    </Input\Generic>

    <Input\Generic id="product-is-installment" name="is_installment"
      label="<?= _('Parcelável') ?>">
    </Input\Generic>
  </form>
</Backoffice\Main>