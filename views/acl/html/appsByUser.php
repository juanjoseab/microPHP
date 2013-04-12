<div class="row">


    <?php
    $acl = & $this->data['acl'];

    /*
      echo $acl->getId();
      echo $acl->getName();
      echo $acl->getLogin();
      echo $acl->getRole();
      echo "<hr>";
     */
    ?>
    <h1>Aplicaciones <small>Marcar las aplicaciones a las que el usuario tiene acceso</small></h1>
    <hr />

    <div class="span6">
        <h3>Aplicaciones disponibles</h3>
        <div class="input-append" title="Filtrar">
            <input class="input-xlarge" placeholder="Filtrar por nombre" id="filterAvailableApps" type="text">
            <span class="add-on"><i class="icon-filter"></i></span>
        </div>
        <ul class="unstyled appslistBox" id="availableApps">
            <?php
            foreach ($this->data['apps'] AS $app) {

                if (!in_array($app['idApplication'], $this->data['allowedAppsIds'])) {
                    ?><li>
                        <div class="btn-group">
                            <button class="btn btn-navbar text-left"><?php echo $app['name']; ?></button>                    
                            <button class="btn addApp" relapp="<?php echo $app['idApplication']; ?>" reluid="<?php echo $acl->getId() ?>"><i class="icon-plus"></i></button>
                        </div>

                    </li>  
                    <?php
                }
            }
            ?>
        </ul>

    </div>
    <div class="span6">
        <h3>Aplicaciones asignadas</h3>
        <div class="input-append" title="Filtrar">
            <input class="input-xlarge" placeholder="Filtrar por nombre" id="filterAsignedApps" type="text">
            <span class="add-on"><i class="icon-filter"></i></span>
        </div>
        <ul class="unstyled appslistBox" id="asignedApps">
            <?php
            foreach ($this->data['apps'] AS $app) {

                if (in_array($app['idApplication'], $this->data['allowedAppsIds'])) {
                    ?><li>
                        <div class="btn-group">
                            <button class="btn removeApp" relapp="<?php echo $app['idApplication']; ?>" reluid="<?php echo $acl->getId() ?>"><i class="icon-minus"></i></button>
                            <button class="btn btn-navbar text-left"><?php echo $app['name']; ?></button>                    

                        </div>                    
                    </li>  
                    <?php
                }
            }
            ?>
        </ul>

    </div>


</div>



<style>
    .btn-group {
        margin-bottom: 5px !important;
        width: 100%;
    }
    .btn-group .btn.btn-navbar.text-left {
        text-align: left !important;
        width: 80%;

    }
    
    .appslistBox {
        max-height: 500px;
        overflow: auto;
    } 
</style>

<script type="text/javascript" src="<?php echo $this->baseUrl() ?>/views/acl/js/functions.js"></script>