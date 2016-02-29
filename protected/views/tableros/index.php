<?php
$this->breadcrumbs=array(
	'Tableros',
);
?>
<br/>


<?php /*$this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); */?>

<script src="http://code.highcharts.com/highcharts.js"></script>
<script src="http://code.highcharts.com/modules/exporting.js"></script>

<h2 class="titulo">COBROS</h2>

<div class="well">

    <a href="/gruposuarez/tableros/createanillos/">
            <button type="button" class="btn btn-warning btn-lg btn-block"> 
                GESTI&Oacute;N DE COBROS
            </button>
    </a><br/>  
    <br/>    
    
    <a href="/gruposuarez/tableros/createmetascobranzas">
            <button type="button" class="btn btn-warning btn-lg btn-block">PAGOS</button>
    </a><br/>
    
     <a href="/gruposuarez/tableros/createestatuscartera">
            <button type="button" class="btn btn-warning btn-lg btn-block">ESTATUS CARTERA</button>
    </a>
  
    <br/>

</div>



<h2 class="titulo">TRAMITES</h2>
<div class="well">

    <br/>

    <a href="/gruposuarez/tableros/createtramitesone">
            <button type="button" class="btn btn-warning btn-lg btn-block"> 
                LIQUIDACIONES
            </button>
    </a><br/>  
    <br/>    

    <a href="/gruposuarez/tableros/createtramitestwo">
            <button type="button" class="btn btn-warning btn-lg btn-block"> 
                TIEMPO POR PASOS
            </button>
    </a><br/>  
    <br/>    
    
    <a href="/gruposuarez/tableros/createTramitebancos">
            <button type="button" class="btn btn-warning btn-lg btn-block"> 
                TIEMPO POR BANCOS
            </button>
    </a><br/>  
    <br/>
</div>


