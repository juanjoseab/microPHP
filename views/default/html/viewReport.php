<?php $cont=0 ?>
<div class="row">
    <div class="span12">
        <div class="opciones">
            <a class="btn btn-primary" href="index.php">Regresar</a>
            <a class="btn btn-primary" href="index.php?v=default&action=export&id=<?= $_GET['id'] ?>">Exportar</a>
        </div>
        <h2><?= $this->data['aplicacion'] ?> <small>Usuarios registrados</small></h2>
        <table id="datos-usuarios" class="table table-bordered">

            <thead>
                <tr>
                    <th>No.</th>
                    <?php foreach ($this->data['keys'] as $value): ?>
                        <th><?= $value ?></th>
                    <?php endforeach; ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($this->data['usuarios'] as $key => $usuario): ?>
                    <tr>
                        <td><?= ++$cont ?></td>
                        <?php foreach ($this->data['keys'] as $value): ?>
                            <td><?= $usuario[$value] ?></td>
                        <?php endforeach; ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>        
    </div>
</div>

<script src="./template/js/paginator.js" type="text/javascript"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#datos-usuarios').tablePagination({});
    });
</script>