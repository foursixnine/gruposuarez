<?php
$this->breadcrumbs=array(
	'Tramite Pasos'=>array('index'),
	$model->id_tramite_pasos,
);

$this->menu=array(
array('label'=>'Listar Pasos del Tramite','url'=>array('index')),
array('label'=>'Crear pasos del Tramite','url'=>array('tramite','id'=>$model->id_tramite)),
array('label'=>'Actualizar Pasos del Tramite','url'=>array('update','id'=>$model->id_tramite_pasos)),
array('label'=>'Eliminar Pasos del Tramite','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_tramite_pasos),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Administrar Pasos del Tramite','url'=>array('admin')),
);
?>

<br/><br/>
<button type="button" class="btn btn-warning">Paso
<span class="badge"><?php echo $model->idPaso['id_paso']; ?></span>
 <?php echo $model->idPaso['descripcion']; ?></button>



<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'idClienteGs.proyecto',
		'idClienteGs.numero_de_lote',
		'idClienteGs.nombre_de_empresa',
		'idExpedienteFisico.descripcion',
		'idPaso.abrev',
		'idPaso.descripcion',
		'idRazonesEstado.descripcion',
		'fecha_inicio',
		'fecha_fin',		
		'firma_cliente',
  		'firma_promotora', 
		),
)); ?>


<br/><br/>
<button type="button" class="btn btn-warning">
 ACTIVIDADES DEL TRAMITE</button>




<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'tramite-actividad-grid',
'dataProvider'=>$tramitesactividad,
'columns'=>array(
			'idPaso.descripcion',
			'idEstado.descripcion',
			'id_tramite',

			'fecha_tramite_actividad',                              

			'observaciones',                           
                           
           
             
    
    
 
)
)
    );?>
