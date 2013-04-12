<div class="row">
    <div class="span6"><h1>Aplicaciones</h1></div>
    <div class="span3 offset9">        
        <form action="<?php echo $this->createLink(null,null,"filtro=1"); ?>" method="GET" >
            <div class="input-append">
                <input class="span2" placeholder="Nombre de aplicacion" id="appendedInputButtons" name="appname" type="text">
                <input type="hidden" name="filtro" value="1" />
                <button class="btn" type="submit"><i class="icon-search"></i> Buscar</button>        
            </div>
        </form>
    </div>

    <div class="span12">   

        

        <?php
        $alerts = $this->activesMsgs();
        if ($alerts) {
            echo $alerts;
        }
        ?>


        <? $this->getAppList(false); ?>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th width="5%">ID</th>
                    <th width="50%">Nombre</th>
                    <th width="35%">Descripci&oacute;n</th>
                    <th width="10%">Pa&iacute;s</th>
                </tr>
            </thead>


            <?
            if (count($this->grid) > 0) {
                foreach ($this->grid AS $row => $r) {
                    ?>
                    <tr>
                        <td><?= $r['idApplication'] ?></td>
                        <td><a href="<?php echo $this->createLink("default", "viewReport", "id=" . $r['idApplication']); ?>"><?= $r['name'] ?></a></td>
                        <td><?= $r['description'] ?></td>
                        <td><?= $r['countryname'] ?></td>

                    </tr>
                    <?
                }
            }
            ?>
        </table>
        <?
        if ($_GET['filtro'] == 1) {
            if ($_POST['appname']) {
                $extras = "filtro=1&appname=" . $_POST['appname'];
            } elseif ($_GET['appname']) {
                $extras = "filtro=1&appname=" . $_GET['appname'];
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
</div>
