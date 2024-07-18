<?

use App\Utils\Formatter;

?>

<? if ($paginator->total === 0): ?>
  <p><?= _('Nenhum resultado encontrado') ?>.</p>
<? else: ?>
  <table>
    <thead>
      <tr>
        <th><?= _('Nome') ?></th>
        <th><?= _('Descrição') ?></th>
        <th><?= _('Última atualização') ?></th>
        <th><?= _('Ações') ?></th>
      </tr>
    </thead>

    <tbody>
      <? foreach ($paginator->results as $category): ?>
        <tr>
          <td>
            <?= Formatter::text_max_length($category['name'], 30) ?>
          </td>
          <td>
            <?= Formatter::text_max_length($category['description'], 30) ?>
          </td>
          <td>
            <?= Formatter::to_datetime_default($category['updated_at']) ?>
          </td>
          <td>
            <a href="/backoffice/product/edit/<?= $category['id'] ?>" class="w-full h-full">
              Editar
            </a>
          </td>
        </tr>
      <? endforeach ?>
    </tbody>
  </table>

  <?= $paginator->render() ?>
<? endif ?>