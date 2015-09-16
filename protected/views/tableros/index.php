<?php
$this->breadcrumbs=array(
	'Tableros',
);
?>
<br/>
<h2 class="titulo">INDICADORES</h2>

<?php /*$this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); */?>

<script src="http://code.highcharts.com/highcharts.js"></script>
<script src="http://code.highcharts.com/modules/exporting.js"></script>

<h2 class="titulo">Cobros</h2>

<div class="well">

    <a href="/gruposuarez/tableros/createanillos/"><span class="label label-danger"> 
             <button type="button" class="btn btn-warning"> Gesti&oacute;n de Cobros</button>
            
           </span></a> <br/>  
    <br/>    
    
    <a href="/gruposuarez/tableros/createmetascobranzas"><span class="label label-danger">
            <button type="button" class="btn btn-warning">Pagos</button>
            </span></a><br/>
    
    <br/>
    <a href="/gruposuarez/tableros/createestatuscartera"><span class="label label-danger">
            <button type="button" class="btn btn-warning">Estado de Cartera</button>
            </span></a><br/>

    <br/>
</div>



<h2 class="titulo">TRAMITES</h2>
<div class="well">

    <br/>
    <a href="/gruposuarez/tableros/createtramitesone"><span class="label label-danger">
                    <button type="button" class="btn btn-warning">Liquidaciones</button>
            </span></a><br/>
    <br/>
    <a href="/gruposuarez/tableros/createtramitestwo"><span class="label label-danger">
            <button type="button" class="btn btn-warning">Tiempos por pasos</button>
           </span></a><br/>
    <br/>
      
    <a href="/gruposuarez/tableros/createTramitebancos"><span class="label label-danger">
             <button type="button" class="btn btn-warning">Tiempos por banco</button>
            </span></a><br/>
    <br/>
    <!--<a href="/gruposuarez/tableros/recuperacioncartera"><span class="label label-danger">Recuperacion</span></a>  -->
</div>


