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
class defaultController extends Display {

    var $data = array();

    function deploy() {


        $this->vista = "default";

        if (!isset($_COOKIE[$_SESSION['sesKeyName']]) || $_COOKIE[$_SESSION['sesKeyName']] != $_SESSION['sesKeyVal']) {
            $this->loadContentView("loginform");
            //$this->getContentView();
            //return;
        }


        if (!empty($_GET['action'])) {
            $action = $_GET['action'];
            if (method_exists($this, $action)) {
                $this->$action();
            }
        }


        require_once P_THEME . DS . "index.php";
    }

    function returnMunicipios() {
        $deptoid = $_POST['dpid'];
        $sl = new MysqlSelect();
        $sl->setTableReference("value");
        $sl->addFilter("value", "idParentValue", $deptoid, "=");
        if ($sl->execute()) {
            $this->mun = $sl->rows;
        }
        $this->loadContentView("munis");
        $this->getContentView();
        die;
    }

    /**
     * 
     * @return boolean
     */
    //SELECT a.* FROM appbyacl LEFT JOIN application a ON (appbyacl.app = a.idApplication) WHERE app = 1 AND acl = 1



    function login() {
        if (isset($_POST['usuario']) && isset($_POST['passwd'])) {
            $us = $_POST['usuario'];
            $hashPass = $this->hashPass($_POST['passwd']); //base64_encode(hash("sha256", base_convert($_POST['passwd'], 10, 32)));
            //MasterController::requerirModelo("acl");
            MasterController::requerirClase("MysqlSelect");

            $sl = new MysqlSelect();
            $sl->setTableReference("acl");
            $sl->addSelection("acl", "id", "id");
            $sl->addSelection("acl", "name", "name");
            $sl->addSelection("acl", "role", "role");
            $sl->addSelection("appbyacl", "app", "app");
            $sl->addJoin("appbyacl", "acl", "=", "acl", "id", "LEFT");
            $sl->addFilter("acl", "login", $us, "=");
            $sl->addFilter("acl", "pws", $hashPass, "=");
            if ($sl->execute()) {
                if (count($sl->rows) > 0) {

                    //if (!isset($_COOKIE[$_SESSION['sesKeyName']]) || $_COOKIE[$_SESSION['sesKeyName']] != $_SESSION['sesKeyVal']) {
                    $sesKeyName = hash("sha256", base_convert(rand(999999, 999999999), 10, 32));
                    $sesKeyVal = hash("sha256", md5(base_convert(rand(999999, 999999999), 10, 24)));
                    $_SESSION['sesKeyName'] = $sesKeyName;
                    $_SESSION['sesKeyVal'] = $sesKeyVal;
                    setcookie("UNAME", $sl->rows[0]['name'], time() + 3600);
                    setcookie("UID", $this->enconde($sl->rows[0]['id']), time() + 3600);
                    setcookie("ROLE", $this->enconde($sl->rows[0]['role']), time() + 3600);
                    setcookie($sesKeyName, $sesKeyVal, time() + 3600);
                    //setcookie("UID", , time() + 3600);
                    //$this->loadContentView("default");
                    $this->systemRedirect($this->baseUrl());
                } else {
                    unset($_SESSION['sesKeyName']);
                    unset($_SESSION['sesKeyVal']);
                    $this->error = true;
                    $this->errorMsg = "<h4>Error en el registro!</h4>Es posible que el usuario y/o la clave esten incorrectos, por favor intente de nuevo";
                    $this->loadContentView("loginform");
                }
            } else {
                $this->error = true;
                $this->errorMsg = "<h4>No se pudo ejecutar la sentencia!</h4>";
                $this->loadContentView("loginform");
            }
        } else {
            $this->error = true;
            $this->errorMsg = "<h4>Datos no recibidos!</h4>No se recibieron datos";
            $this->loadContentView("loginform");
        }
    }

    function logout() {
        setcookie($_SESSION['sesKeyName'], null, time() - 3600);
        $_SESSION['sesKeyName'] = false;
        $_SESSION['sesKeyVal'] = false;
        unset($_SESSION['sesKeyName']);
        unset($_SESSION['sesKeyVal']);
        setcookie("UNAME", NULL, time() - 3600);
        setcookie("UID", NULL, time() - 3600);
        setcookie("ROLE", NULL, time() - 3600);


        $this->done = true;
        $this->doneMsg = "<h4>Sesi&oacute;n Finalizada!</h4>ha salido de la sesi&oacute;n";
        $this->loadContentView("loginform");
        $this->systemRedirect($this->baseUrl());
    }

    private function is_valid_email($email) {

        if (preg_match('/^[A-Za-z0-9-_.+%]+@[A-Za-z0-9-.]+\.[A-Za-z]{2,4}$/', $email) > 0)
            return true;
        else
            return false;
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
            $mselect->addJoin("acl", "id", "=", "appbyacl", "acl");
            $mselect->addFilter("appbyacl", "acl", $this->decode($_COOKIE['UID']), "=");
        }



        if ($_GET['filtro'] == 1) {
            if ($_POST['appname']) {
                $mselect->addFilter("application", "name", "%{$_POST['appname']}%", "LIKE");
            } elseif ($_GET['appname']) {
                $mselect->addFilter("application", "name", "%{$_GET['appname']}%", "LIKE");
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

    function viewReport() {
        if (isset($_GET['id'])) {

            $uid = $this->decode($_COOKIE['UID']);
            $app = $_GET['id'];
            MasterController::requerirClase("MysqlSelect");
            $sl = new MysqlSelect();
            $sl->setTableReference("appbyacl");
            $sl->addFilter("appbyacl", "app", $app, "=");
            $sl->addFilter("appbyacl", "acl", $uid, "=");
            $sl->execute();
            if ($sl->rowsCount() > 0 || $this->decode($_COOKIE['ROLE']) != 'client' ) {
                $dbo = $this->findUsuarios();
                $usuario = array();
                while ($dato = $dbo->getArray()) {
                    $usuario[$dato['user']][$dato['field']] = $dato['value'];
                    $temp = $dato['aplicacion'];
                }

                $primero = array_slice($usuario, 0, 1);
                $this->data['usuarios'] = $usuario;
                if (count($primero) > 0) {
                    $this->data['keys'] = array_keys($primero[0]);
                    $this->data['aplicacion'] = $temp;
                } else {
                    $this->data['keys'] = array();
                }

                $this->loadContentView("viewReport");
            }else{
                $this->error=TRUE;
                $this->errorMsg = "<h4>Acceso Restringido</h4>No tienes asignados los permisos para ver los resultados de esta aplicaci&oacute;n";
            }
        }
    }

    public function export() {
        $dbo = $this->findUsuarios();
        $usuario = array();
        while ($dato = $dbo->getArray()) {
            $usuario[$dato['user']][$dato['field']] = $dato['value'];
            $temp = $dato['aplicacion'];
        }

        if (count($usuario) < 1) {
            return;
        }

        $primero = array_slice($usuario, 0, 1);
        $this->data['usuarios'] = $usuario;
        $this->data['keys'] = array_keys($primero[0]);
        $this->data['aplicacion'] = $temp;

        header("Content-Type:   application/vnd.ms-excel;");
        header("Content-type:   application/x-msexcel;");
        header("Content-Disposition: filename=usuarios.xls");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Cache-Control: private", false);

        $this->loadContentView("export");
        $this->getContentView();
        die();
    }

    private function findUsuarios() {
        $id = $_GET['id'];
        $sql = "SELECT up.user_idUser user, f.name field,
        if(f.name='department' OR f.name='municipality' OR f.name='gender',(select val.name from value val where val.id = up.value),up.value) AS value, ap.name aplicacion
        FROM userprofilepersonal up JOIN fieldByApp fa ON (up.fieldByApp_idEventAttribute = fa.idEventAttribute) JOIN field f ON (fa.idField = f.idField ) JOIN application  ap ON ( fa.idEvents = ap.idApplication) WHERE ap.idApplication = {$id}";
        $dbo = new Dbexec();
        $dbo->queryExecute($sql);

        return $dbo;
    }

}
?>