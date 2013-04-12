
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title><?= SITE_NAME ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- Le styles -->
        <link href="<?= $this->templateUrl() ?>/css/jquery-ui-1.10.1.custom.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= $this->templateUrl() ?>/css/main.css" rel="stylesheet" type="text/css" />
        <link href="<?= $this->templateUrl() ?>/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= $this->templateUrl() ?>/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css" />       
        <style type="text/css">
            body {
                padding-top: 60px;
                padding-bottom: 40px;
            }
        </style>


        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="../assets/js/html5shiv.js"></script>
        <![endif]-->

        <!-- Fav and touch icons -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
        <link rel="shortcut icon" href="../assets/ico/favicon.png">
        <script type="text/javascript" language="JavaScript" src="<?= $this->templateUrl() ?>/js/jq191_min.js" charset="utf-8"></script>
        <script type="text/javascript" language="JavaScript" src="<?= $this->templateUrl() ?>/js/jquery-ui-1.10.1.custom.min.js" charset="utf-8" ></script>
        <script type="text/javascript" language="JavaScript" src="<?= $this->templateUrl() ?>/js/bootstrap.min.js" charset="utf-8"></script>        
    </head>

    <body>
        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="brand" href="index.php"><?= SITE_NAME ?></a>                    
                    <div class="nav-collapse collapse">
                        <?php
                        if (isset($_COOKIE[$_SESSION['sesKeyName']]) && $_COOKIE[$_SESSION['sesKeyName']] == $_SESSION['sesKeyVal']) {
                            ?>
                            <p class="navbar-text pull-right">
                                <a href="#" class="navbar-link"><?php echo $_COOKIE['UNAME']; ?></a> | <a href="?v=default&action=logout" class="label label-important">Cerrar sesi&oacute;n</a> 
                            </p>
                            <?php
                        }
                        ?>
                        <ul class="nav">
                            <?php
                            if (isset($_COOKIE[$_SESSION['sesKeyName']]) && $_COOKIE[$_SESSION['sesKeyName']] == $_SESSION['sesKeyVal']) {
                                ?>
                                <li ><a href="./">Inicio</a></li>
                                <?php if ($this->decode($_COOKIE['ROLE']) == "admin") { ?> <li><a href="<?php echo $this->createLink("acl", "default"); ?>">Gesti&oacute;n de Usuarios</a></li> <?php } ?>                                
                                <li><a href="?v=default&action=logout">Cerrar sesi&oacute;n</a></li>
                                <?php
                            }
                            ?>
                        </ul>
                    </div><!--/.nav-collapse -->
                </div>
            </div>
        </div>



        <div class="container">
            <? $this->getContentView() ?>


            <hr>

            <footer>
                <p>&copy; Claro - TPP <?php echo date('Y'); ?></p>
            </footer>

        </div>
        <script type="text/javascript">
            $(document).ready(function() {
                $(".needAlertConfirm").click(function() {
                    var decide = confirm("Realmente desea eliminar este apartado?");
                    if (decide) {
                        return true;
                    } else {
                        return false;
                    }
                });
            });
        </script>

    </body>
</html>