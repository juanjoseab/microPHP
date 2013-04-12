
<?php
$alerts = $this->activesMsgs();
if ($alerts) {
    echo $alerts;
}
?>
<div class="hero-unit">
    <h1>Business Intelligence</h1>                
    <p>Sistema unificado de reportes de aplicaciónes integrados a la plataforma de inteligencia de negocios</p>
    <p>Para poder ingresar debes ingresar tu nombre de usuario y contrase&ntilde;a</p>

    <form class="form-inline" action="<?php echo $this->baseUrl();?>?action=login" method="post">
        <input type="text" id="usuario" name="usuario" placeholder="Nombre de usuario">
        <input type="password" id="passwd" name="passwd" placeholder="Password">        
        <button type="submit" class="btn btn-primary">Ingresar</button>
    </form>
</div>



<div class="row">
    <div class="span4 text-center">
        <img src="<?php echo $this->templateUrl(); ?>/img/synctoy.png" />
        <h2>Integración</h2>
        <p>Datos de todos tus formularios en un solo lugar.</p>
    </div>
    <div class="span4 text-center">
        <img src="<?php echo $this->templateUrl(); ?>/img/download.png" />
        <h2>Disponibilidad</h2>
        <p>Tus datos en cualquier momento, no importa la hora, siempre estar&aacute;n ahi para t&iacute;</p>
    </div>
    <div class="span4 text-center">
        <img src="<?php echo $this->templateUrl(); ?>/img/rocket.png" />
        <h2>Accesabilidad</h2>
        <p>Accede a tus datos desde cualquier lugar con una conexi&oacute;n a internet.</p>
    </div>

</div>
<div class="row">
    <div class="span4 text-center">
        <img src="<?php echo $this->templateUrl(); ?>/img/mobile.png" />
        <h2>Mobilidad</h2>
        <p>Nuestra interfaz te permite acceder a tus datos desde cualquier dispositivo mov&iacute;l.</p>
    </div>
    <div class="span4 text-center">
        <img src="<?php echo $this->templateUrl(); ?>/img/updates.png" />
        <h2>Tiempo Real</h2>
        <p>Mira los datos ingresados a tus formularios en tiempo real</p>
    </div>
    <div class="span4 text-center">
        <img src="<?php echo $this->templateUrl(); ?>/img/userm.png" />
        <h2>User Friendly</h2>
        <p>Cuando se desarrollo esta plataforma, lo hicimos pensando en t&iacute;</p>
    </div>

</div>


<?php
//base_convert($number, $frombase, $tobase)
//echo base64_encode(hash("sha256", base_convert("tpp",10,32)))."<hr>";  
?>

<div class="row-fluid">

    <div class="span6 offset2">


    </div>
</div>



