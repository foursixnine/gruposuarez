<?php
$this->breadcrumbs=array(
	'Tablero',
);

$this->menu=array(
array('label'=>'Volver','url'=>array('index')),

);
?>


<script src="http://code.highcharts.com/highcharts.js"></script>
<script src="http://code.highcharts.com/modules/exporting.js"></script>


<h1>Tableros</h1>



<span class="label label-success">Operativos</span>
<div class="well">
    
   <br/>
  <!-- <a href="#"><span class="label label-danger">Gesti&oacute;n</span></a><br/>-->
    <br/>

 
         <a href="/gruposuarez/tablero/anillos"><span class="label label-danger"> Gestion</span></a> <br/>  
         <br/>    
        <a href="/gruposuarez/tablero/expediente"><span class="label label-danger"> Expedientes</span></a> <br/>    
    
</div>

   
<span class="label label-success">FINANCIERO</span>
<div class="well">
   
    <br/>
    <a href="/gruposuarez/tablero/estatuscartera"><span class="label label-danger">Cartera</span></a><br/>
    <br/>
    <a href="/gruposuarez/tablero/metascobranzas"><span class="label label-danger">Pagos</span></a><br/>

    <br/>
    <a href="/gruposuarez/tablero/recuperacioncartera"><span class="label label-danger">Recuperacion</span></a>  
</div>