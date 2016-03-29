<?php
$this->breadcrumbs=array(
	'Tramites',
);

$this->menu=array(
//array('label'=>'Crear Tramite','url'=>array('create')),
array('label'=>'Volver','url'=>array('../gruposuarez')),
);
?>

<style>

.cajademo {
 margin: 0;
 padding: 10px 40px 20px 80px;
}
.cajademo span {
 float: left;
 margin: 0 8px;
 padding: 4px;
 background: #990000;
 color: #eee;
 border: 2px solid #333;
}
</style>

<br/>
   <button type="button" class="btn btn-warning">TRAMITES </button>
<br/>


 <div class="cajademo">   


    <a href="<?php echo Yii::app()->createUrl('tramite/admin'); ?>">    
        <img width="110px" height="110px" src="<?php echo Yii:: app()->baseUrl.'/images/asiganciondetramites.png' ?> " />
        <button type="button" class="btn btn-warning">ADMINISTRAR <br/>TRAMITES</button>
  
    </a>   

    <!-- Tableros -->
    <a href="<?php echo Yii::app()->createUrl('tramite/continuartramites'); ?>">
        <img width="110px" height="110px" src="<?php echo Yii:: app()->baseUrl.'/images/actualizaciondetramites.png' ?> "  />
        <button type="button" class="btn btn-warning">CONTINUAR <br/>TRAMITE</button>
    </a>
  <br/>
   
</div>

<br/>
   <button type="button" class="btn btn-warning">REPORTES TRAMITES</button>
<br/>


 <div class="cajademo">   

     <!-- Tableros -->
    <a href="<?php echo Yii::app()->createUrl('tramitePasos/reporte'); ?>">
        <img width="110px" height="110px" src="<?php echo Yii:: app()->baseUrl.'/images/tramites.png' ?> "  />
        <button type="button" class="btn btn-warning">REPORTE <br/>TRAMITE</button>
    </a>
    &nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;
  &nbsp;&nbsp;&nbsp;
  &nbsp;&nbsp;&nbsp;

          <!-- Tableros -->
    <a href="<?php echo Yii::app()->createUrl('tramite/reportetramite'); ?>">
        <img width="110px" height="110px" src="<?php echo Yii:: app()->baseUrl.'/images/tramites.png' ?> "  />
        <button type="button" class="btn btn-warning">ESTATUS<br/>ACTUAL</button>
    </a>
          <!-- Tableros -->
    <a href="<?php echo Yii::app()->createUrl('tramitePasos/reportepasos'); ?>">
        <img width="110px" height="110px" src="<?php echo Yii:: app()->baseUrl.'/images/tramites.png' ?> "  />
        <button type="button" class="btn btn-warning">REPORTE<br/>LIQUIDACIONES</button>
    </a>


       <!-- Tableros -->
<a href="<?php echo Yii::app()->createUrl('tramite/reportebancos'); ?>">
        <img width="110px" height="110px" src="<?php echo Yii:: app()->baseUrl.'/images/tramites.png' ?> "  />
        <button type="button" class="btn btn-warning">REPORTE<br/>BANCOS</button>
    </a>

  

</div>