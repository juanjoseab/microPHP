<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of defaultController
 *
 * @author webmaster
 */
class aclController extends Display {

    var $data = array();

    function deploy() {


        $this->vista = "acl";

        if (!isset($_COOKIE[$_SESSION['sesKeyName']]) || $_COOKIE[$_SESSION['sesKeyName']] != $_SESSION['sesKeyVal']) {
            $this->vista = "default";
            $this->loadContentView("loginform");
            //$this->getContentView();
            //return;
        }

        if ($this->decode($_COOKIE['ROLE']) != "admin") {
            $this->error = TRUE;
            $this->errorMsg = "<h4>Acceso Restringido!</h4>No tienes sufiecientes privilegios para ingresar al area de <b>Gesti&oacute;n de Usuarios</b>";
            $this->vista = "default";
            //$this->loadContentView("loginform");
        } elseif (!empty($_GET['action'])) {
            $action = $_GET['action'];
            if (method_exists($this, $action)) {
                $this->$action();
            }
        }


        require_once P_THEME . DS . "index.php";
    }

    private function getValueName($id) {
        $sl = new MysqlSelect();
        $sl->setTableReference("value");
        $sl->addFilter("value", "id", $id, "=");
        $sl->execute();
        if ($sl->rowsCount() > 0) {
            return $sl->rows[0]['name'];
        }
    }

    function getAppList() {
        $role = $this->decode($_COOKIE['ROLE']);
        MasterController::requerirClase("MysqlSelect");
        $mselect = new MysqlSelect();

        $mselect->setTableReference("application");
        $mselect->addCustomSelection("application.*");
        $mselect->addSelection("country", "name", "countryname");

        $mselect->addJoin("country", "idPais", "=", "application", "country_idPais");
        if ($role == "client") {
            $mselect->addJoin("appbyacl", "app", "=", "application", "idApplication");
            $mselect->addJoin("acl", "acl", "=", "appbyacl", "acl");
            $mselect->addFilter("appbyacl", "acl", $this->decode($_COOKIE['UID']), "=");
        }



        if ($_GET['filtro'] == 1) {
            if ($_POST['appname']) {
                $mselect->addFilter("application", "name", "%{$_POST['appname']}%", "=");
            } elseif ($_GET['appname']) {
                $mselect->addFilter("application", "name", "%{$_POST['appname']}%", "=");
            }
        }

        if ($_GET['pag'] > 0) {
            $pag = ($_GET['pag'] * ITEMSPERPAGE);
            $mselect->addComplexLimit($pag, ITEMSPERPAGE);
        } else {
            $mselect->addSimpleLimit(ITEMSPERPAGE);
        }

        if ($mselect->execute()) {
            $this->grid = $mselect->rows;
        }

        $this->rowsCount = $mselect->rowsCount();
    }

    function getUserList() {

        MasterController::requerirClase("MysqlSelect");
        $mselect = new MysqlSelect();

        $mselect->setTableReference("acl");

        if ($_GET['filtro'] == 1) {
            if ($_POST['aclname']) {
                $mselect->addFilter("acl", "name", "%{$_POST['name']}%", "=");
            } elseif ($_GET['aclname']) {
                $mselect->addFilter("acl", "name", "%{$_GET['name']}%", "=");
            }
        }

        if ($_GET['pag'] > 0) {
            $pag = ($_GET['pag'] * ITEMSPERPAGE);
            $mselect->addComplexLimit($pag, ITEMSPERPAGE);
        } else {
            $mselect->addSimpleLimit(ITEMSPERPAGE);
        }

        if ($mselect->execute()) {
            $this->grid = $mselect->rows;
        }

        $this->rowsCount = $mselect->rowsCount();
    }

    function getPaginacionPosition() {
        return ceil($this->rowsCount / ITEMSPERPAGE);
    }

    function getArrayPaginacion() {
        $totalpags = $this->getPaginacionPosition();
        if ($totalpags < 7) {
            $pags = Array();
            for ($i = 0; $i < $totalpags; $i++) {
                $pags[] = $i;
            }
            return $pags;
        } else {
            if ($_GET['pag'] > 3) {
                $initpage = $_GET['pag'] - 3;
                if ($initpage + 6 < $totalpags) {
                    $topage = $initpage + 6;
                } else {
                    $topage = $initpage + (($totalpags - $initpage) - 1);
                }
                for ($i = $initpage; $i <= $topage; $i++) {
                    $pags[] = $i;
                }
            } else {
                $pags = Array();
                for ($i = 0; $i < 7; $i++) {
                    $pags[] = $i;
                }
            }
            return $pags;
        }
    }

    function addUserForm() {
        $this->loadContentView("newUserForm");
    }

    function viewEditUser() {
        $this->loadContentView("editUserForm");
    }

    function userApps() {
        if (isset($_GET['uid'])) {
            MasterController::requerirModelo("acl");
            MasterController::requerirClase("MysqlSelect");


            $acl = new acl();
            $acl->setId($_GET['uid']);
            $acl->getValuesBySetedId();

            if ($acl->getRole() != "client") {
                $this->info = TRUE;
                $this->infoMsg = "<h4>Acceso total</h4>Este usuario puede ver todas las aplicaciones porque tiene rol de <b>" . $acl->getRole() . "</b>";
                return;
            } else {
                $sl = new MysqlSelect();
                $sel = new MysqlSelect();
                $sl->setTableReference("application");
                $sl->execute();

                $this->data['apps'] = $sl->rows;
                $this->data['appsCount'] = $sl->rowsCount();

                $sel->setTableReference("appbyacl");
                $sel->addSelection("appbyacl", "app", "appId");
                $sel->addFilter("appbyacl", "acl", $acl->getId(), "=");
                $sel->execute();

                $appsIds = array();
                foreach ($sel->rows AS $r) {
                    $appsIds[] = $r['appId'];
                }
                $this->data['allowedAppsIds'] = $appsIds;
                $this->data['allowedAppsCount'] = $sel->rowsCount();

                $this->data['acl'] = & $acl;
                $this->loadContentView("appsByUser");
            }
        } else {
            $this->error = TRUE;
            $this->errorMsg = "<h4>Error de solicitud</h4>No se ha indicado ningun usuario";
            return;
        }
    }

    function addUser() {
        if (isset($_POST)) {
            MasterController::requerirModelo("acl");
            $acl = new acl();
            $acl->postToObject();
            $acl->setPws($this->hashPass($acl->getPws()));
            $this->transaction->loadClass($acl);
            if ($this->transaction->save()) {
                $this->done = true;
                $this->doneMsg = "<h4>Usuario Creado</h4>El usuario {$acl->login} fue creado con exito";
            }
        }
    }

    function deleteUser() {
        if (isset($_GET['uid'])) {
            MasterController::requerirModelo("acl");
            MasterController::requerirModelo("appbyacl");
            MasterController::requerirClase("MysqlSelect");

            $acl = new acl();
            $acl->setId($_GET['uid']);
            $acl->getValuesBySetedId();



            if ($acl->getRole() == "client") {

                $sl = new MysqlSelect();
                $sl->setTableReference("appbyacl");
                $sl->addFilter("appbyacl", "acl", $acl->getId(), "=");
                $sl->execute();

                if ($sl->rows > 0) {
                    foreach ($sl->rows AS $r) {
                        $appbyacl = new appbyacl();
                        $appbyacl->setAcl($acl->getId());
                        $appbyacl->setApp($r['app']);
                        $this->transaction->loadClass($appbyacl);
                        $this->transaction->delete();
                    }
                }
            }
            $this->transaction->loadClass($acl);
            $this->transaction->delete();
            $this->done = true;
            $this->doneMsg = "<h4>Usuario Eliminado</h4>El usuario fue borrado con exito";
        }
    }

    function editUser() {
        if (isset($_GET['uid'])) {
            MasterController::requerirModelo("acl");

            $acl = new acl();
            $acl->setId($_GET['uid']);
            $acl->getValuesBySetedId();

            $updateAcl = new acl();
            $updateAcl->postToObject();

            /*
              echo "<pre>"; print_r($acl); echo "</pre>";
              echo "<pre>"; print_r($updateAcl); echo "</pre>";
              return;
             */
            if ($acl->getName() != $updateAcl->getName()) {
                $acl->setName($updateAcl->getName());
            }
            $pws = $updateAcl->getPws();
            if (!empty($pws)) {
                $acl->setPws($this->hashPass($pws));
            }



            if ($acl->getRole() != $updateAcl->getRole()) {
                $acl->setRole($updateAcl->getRole());
            }

            $this->transaction->loadClass($acl);
            $this->transaction->update();
            $this->done = true;
            $this->doneMsg = "<h4>Usuario Editado</h4>Los datos del usuario fueron editados con exito";
        }
    }

    function addApptoUser() {
        if ($this->decode($_COOKIE['ROLE']) == "admin") {
            if (isset($_POST) && ( isset($_POST['app']) && isset($_POST['uid']) )) {


                MasterController::requerirClase('MysqlSelect');
                $s = new MysqlSelect();
                $s->setTableReference("appbyacl");
                $s->addFilter("appbyacl", "app", $_POST['app'], "=");
                $s->addFilter("appbyacl", "acl", $_POST['uid'], "=");
                $s->execute();
                if ($s->rowsCount() > 0) {
                    
                } else {
                    MasterController::requerirModelo("appbyacl");
                    $appacl = new appbyacl();
                    $appacl->setAcl($_POST['uid']);
                    $appacl->setApp($_POST['app']);

                    $this->transaction->loadClass($appacl);
                    if ($this->transaction->save(TRUE, FALSE)) {

                        MasterController::requerirModelo("application");
                        $app = new application();
                        $app->setIdApplication($_POST['app']);
                        $app->getValuesBySetedId();
                        echo '<li>
                                    <div class="btn-group">                                        
                                        <button class="btn removeApp" relapp=' . $appacl->getApp() . ' reluid="' . $appacl->getAcl() . '"><i class="icon-minus"></i></button>
                                        <button class="btn btn-navbar text-left">' . $app->getName() . '</button>                    
                                    </div>                    
                                </li>';
                        die;
                    }
                }
            }
        }
    }

    function removeApptoUser() {
        //echo "1";die;
        if ($this->decode($_COOKIE['ROLE']) == "admin") {
            if (isset($_POST) && ( isset($_POST['app']) && isset($_POST['uid']) )) {
                
                MasterController::requerirModelo("appbyacl");
                MasterController::requerirModelo("application");

                $app = new application();
                $app->setIdApplication($_POST['app']);
                $app->getValuesBySetedId();

                $appacl = new appbyacl();
                $appacl->setAcl($_POST['uid']);
                $appacl->setApp($_POST['app']);
                $this->transaction->loadClass($appacl);
                if ($this->transaction->delete()) {
                    echo '<li>
                                    <div class="btn-group">
                                        <button class="btn btn-navbar text-left">' . $app->getName() . '</button>                    
                                        <button class="btn addApp" relapp=' . $appacl->getApp() . ' reluid="' . $appacl->getAcl() . '"><i class="icon-plus"></i></button>
                                    </div>                    
                                </li>';
                    die;
                }
            }
        }
    }

}

?>
