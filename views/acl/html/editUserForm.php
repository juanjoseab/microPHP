<?php
MasterController::requerirModelo("acl");
$acl = new acl();

$acl->setId($_GET['uid']);
$acl->getValuesBySetedId();

//echo $acl->constructForm("addUser", $this->createLink("acl", "addUser"), "Nuevo Usuario", "post", "Crear");
?>
<form accept-charset="utf-8" class="form-horizontal" id="addUser" method="post" action="<?php echo $this->createLink("acl", "editUser", "uid={$acl->getId()}"); ?>" >
    <fieldset>
        <legend>Edici&oacute;n de usuario</legend>
        <div class="control-group">
            <label class="control-label" for="inputEmail">Nombre</label>
            <div class="controls">
                <input type="text" class=" stringField signedField notNulleable" required="required"  placeholder="Nombre del Usuario"  id="Name"  name="name" value="<? echo $acl->getName() ?>" />
            </div>
        </div><div class="control-group">
            <label class="control-label" for="inputEmail">Login</label>
            <div class="controls">
                <input type="text" class=" stringField signedField notNulleable" readonly="readonly"  placeholder="Login del usuario"  id="Login"  name="login" value="<?= $acl->getLogin() ?>" />
            </div>
        </div><div class="control-group">
            <label class="control-label" for="inputEmail">Contrase&ntilde;a</label>
            <div class="controls">
                <input type="password" class="stringField signedField"  placeholder="Clave"  id="Pws"  name="pws" value="" />
            </div>
        </div><div class="control-group">
            <label class="control-label" for="inputEmail">Role</label>
            <div class="controls">
                <select class="signedField notNulleable" required="required"  id="Role"  name="role">
                    <option <?php
                    if ($acl->getRole() == 'client') {
                        echo 'selected="selected"';
                    }
                    ?> value="client">Cliente</option>
                    <option <?php
                    if ($acl->getRole() == 'developer') {
                        echo 'selected="selected"';
                    }
                    ?> value="developer">Desarrollador</option>
                    <option <?php
                        if ($acl->getRole() == 'admin') {
                            echo 'selected="selected"';
                        }
                    ?>value="admin">Admin</option>
                </select>
            </div>
        </div><div class="control-group">
            <div class="controls">

                <button type="submit" class="btn btn-primary">Guardar</button>
                <button type="reset" class="btn btn-warning" onclick="javascript:window.location.href = '<?php echo $this->createLink("acl", "default"); ?>'">Cancelar</button>
            </div>
        </div>
    </fieldset></form>