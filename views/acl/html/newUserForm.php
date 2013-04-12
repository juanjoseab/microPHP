<?php
MasterController::requerirModelo("acl");

//echo acl::constructForm("addUser", $this->createLink("acl","addUser"), "Nuevo Usuario", "post", "Crear");
$acl = new acl();

//echo $acl->constructForm("addUser", $this->createLink("acl", "addUser"), "Nuevo Usuario", "post", "Crear");
?>
<form accept-charset="utf-8" class="form-horizontal" id="addUser" method="post" action="<?php echo $this->createLink("acl","addUser");?>" ><fieldset><legend>Nuevo Usuario</legend><div class="control-group">
            <label class="control-label" for="inputEmail">Nombre</label>
            <div class="controls">
                <input type="text" class=" stringField signedField notNulleable" maxsize=""  required="required"  placeholder="Nombre del Usuario"  id="Name"  name="name" value="" />
            </div>
        </div><div class="control-group">
            <label class="control-label" for="inputEmail">Login</label>
            <div class="controls">
                <input type="text" class=" stringField signedField notNulleable" maxsize=""  required="required"  placeholder="Login del usuario"  id="Login"  name="login" value="" />
            </div>
        </div><div class="control-group">
            <label class="control-label" for="inputEmail">Contrase&ntilde;a</label>
            <div class="controls">
                <input type="password" class=" stringField signedField notNulleable" required="required"  placeholder="Clave"  id="Pws"  name="pws" value="" />
            </div>
        </div><div class="control-group">
            <label class="control-label" for="inputEmail">Role</label>
            <div class="controls">
                <select class="signedField notNulleable" required="required"  id="Role"  name="role">
                    <option value="client">Cliente</option>
                    <option value="developer">Desarrollador</option>
                    <option value="admin">Admin</option>
                </select>
            </div>
        </div><div class="control-group">
            <div class="controls">

                <button type="submit" class="btn btn-primary">Crear</button>
                <button type="reset" class="btn btn-warning" onclick="javascript:window.location.href = '<?php echo $this->createLink("acl","default");?>'">Cancelar</button>
            </div>
        </div>
    </fieldset></form>