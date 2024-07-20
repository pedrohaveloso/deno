<?php

use App\Utils\Formatter;

?>

<Backoffice\Main>
  <Backoffice\Main\Header>
    <Breadcrumb>
      <?= _('Produtos') ?> : /backoffice/products;
      <?= $product ? _('Editar') : _('Adicionar') ?>
    </Breadcrumb>

    <Button\Primary type="submit" form="product-form" class="px-8 py-2">
      <?= _('Salvar') ?>
    </Button\Primary>
  </Backoffice\Main\Header>

  <form hx-post="/backoffice/products/save" id="product-form"
    class="flex gap-4 flex-wrap *:grow *:basis-52" data-hook="fill-form"
    data-hook-values="<?= Formatter::array_to_attribute($product) ?>">
    <Input\Hidden name="id"></Input\Hidden>

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

    <Input\Select id="product-is-installment" name="is_installment"
      label="<?= _('Parcelável') ?>">
      <option value="false"><?= _('Não') ?></option>
      <option value="true"><?= _('Sim') ?></option>
    </Input\Select>

    <Input\Generic id="product-category" list="categories" name="category"
      label="<?= _('Categoria') ?>">
    </Input\Generic>

    <datalist id="categories">
      <? foreach ($categories as $category): ?>
        <option value="<?= $category['id'] ?>">
          <?= $category['name'] ?>
        </option>
      <? endforeach ?>
    </datalist>
  </form>

  <div id="response">
  </div>

  <section class="flex flex-col">
    <p>Atente-se ao salvar um produto:</p>

    <ol>
      <li>
        <p>O nome deve conter no máximo 144 caracteres</p>
      </li>

      <li>
        <p></p>
      </li>
    </ol>
  </section>
</Backoffice\Main>