<?

use App\Utils\Formatter;

?>

<table>
  <thead>
    <tr>
      <th><?= _('Nome') ?></th>
      <th><?= _('Descrição') ?></th>
      <th><?= _('Atualizado em') ?></th>
      <th><?= _('Criado em') ?></th>
    </tr>
  </thead>

  <tbody>
    <? foreach ($categories as $category): ?>
      <tr>
        <td><?= $category['name'] ?></td>
        <td><?= $category['description'] ?></td>
        <td><?= Formatter::to_datetime_default($category['updated_at']) ?></td>
        <td><?= Formatter::to_datetime_default($category['created_at']) ?></td>
      </tr>
    <? endforeach ?>
  </tbody>
</table>