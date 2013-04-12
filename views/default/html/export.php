<table>
  <tr class='titulos'>
    <?php foreach ($this->data['keys'] as $value): ?>
      <th><?= mb_convert_encoding($value,'utf-16','utf-8') ?></th>
    <?php endforeach; ?>
  </tr>
  <?php foreach ($this->data['usuarios'] as $key => $usuario): ?>
  <tr>
    <?php foreach ($this->data['keys'] as $value): ?>
      <td><?= mb_convert_encoding($usuario[$value],'utf-16','utf-8') ?></td>
    <?php endforeach; ?>
  </tr>
  <?php endforeach; ?>
</table>