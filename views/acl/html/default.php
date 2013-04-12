<script type="text/javascript" lang="JavaScript">

</script>

<div class="span12">   



    <div class="masthead">
        <ul class="nav nav-pills pull-right">
            <li class="active"><a href="#">Lista</a></li>
            <li><a href="<?php echo $this->createLink("acl", "addUserForm"); ?>">Crear Usuario</a></li>                      
        </ul>
        <h1>Lista de usuarios</h1>
    </div>


    <?php
    $alerts = $this->activesMsgs();
    if ($alerts) {
        echo $alerts;
    }
    ?>


    <? $this->getUserList(false); ?>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Login</th>
                <th>Role</th>
                <th></th>
            </tr>
        </thead>


        <?
        if (count($this->grid) > 0) {
            foreach ($this->grid AS $row => $r) {
                ?>
                <tr>
                    <td><?= $r['id'] ?></td>
                    <td><?= $r['name'] ?></td>
                    <td><?= $r['login'] ?></td>
                    <td><?= $r['role'] ?></td>
                    <td>

                        <div class="btn-group">
                            <a href="#" data-toggle="dropdown" class="btn dropdown-toggle">
                                Opciones
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">

                                <?php if($r['role']=="client"){?> <li><a href="<?php echo $this->createLink("acl", "userApps", "uid=" . $r['id']); ?>">Editar Aplicaciones</a></li><?php } ?>
                                <li><a href="<?php echo $this->createLink("acl", "viewEditUser", "uid=" . $r['id']); ?>">Editar Usuario</a></li>
                                <li><a href="<?php echo $this->createLink("acl", "deleteUser", "uid=" . $r['id']); ?>" class="needAlertConfirm">Eliminar Usuario</a></li>

                            </ul>
                        </div>
                    </td>
                </tr>
                <?
            }
        }
        ?>
    </table>
    <?
    if ($_GET['filtro'] == 1) {
        if ($_POST['aclname']) {
            $extras = "filtro=1&aclname=" . $_POST['aclname'];
        } elseif ($_GET['aclname']) {
            $extras = "filtro=1&aclname=" . $_GET['aclname'];
        }
    }
    $pags = $this->getArrayPaginacion();
    if ($_GET['pag'] == 0 || !$_GET['pag']) {
        $pageActive = 0;
    } else {
        $pageActive = $_GET['pag'];
    }
    ?> 
    <div class="pagination pagination-centered">
        <ul>
            <li><a href="<?php echo $this->returnThisUrl($extras); ?>&pag=0">Primero</a></li>
            <?php
            if (count($pags) == 1) {
                ?>
                <li class="active"><a href="#">1</a></li>
                    <?
                } else {
                    foreach ($pags as $pag) {
                        ?>
                    <li <?php
                    if ($pag == $pageActive) {
                        echo 'class="active"';
                    }
                    ?>><a href="<?php echo $this->returnThisUrl($extras); ?>&pag=<?= $pag ?>"><?= ($pag + 1) ?></a></li>
                        <?
                    }
                }
                ?>
            <li><a href="<?php echo $this->returnThisUrl($extras); ?>&pag=<?= ($this->getPaginacionPosition()) - 1 ?>">Ultimo</a></li>
        </ul>
    </div>


</div>

