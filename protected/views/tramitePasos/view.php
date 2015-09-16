<?php
$this->breadcrumbs=array(
	'Tramite Pasoses'=>array('index'),
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


<h1>View TramitePasos #<?php echo $model->id_tramite_pasos; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_tramite_pasos',
		'id_tramite',
		'id_cliente_gs',
		'fecha_pazysalvo',
		'id_expediente_fisico',
		'id_usuario',
		'fecha_inicio',
		'id_pasos',
		'id_abogado',
		'fecha_fin',
		'id_razones_estado',
		'id_proveedores',
		'id_estado',
		'id_paso',
),
)); ?>
