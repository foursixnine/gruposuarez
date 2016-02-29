<?php
$this->breadcrumbs=array(
	'Tramites'=>array('index'),
	$model->id_tramite,
);

$this->menu=array(
array('label'=>'List Tramite','url'=>array('index')),
array('label'=>'Create Tramite','url'=>array('create')),
array('label'=>'Update Tramite','url'=>array('update','id'=>$model->id_tramite)),
array('label'=>'Delete Tramite','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_tramite),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Tramite','url'=>array('admin')),
);
?>

<h1>View Tramite #<?php echo $model->id_tramite; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_tramite',
		'id_cliente_gs',
		'descripcion',
		'fecha_pazysalvo',
		'id_expediente_fisico',
		'id_usuario',
		'fecha_inicio',
		'id_pasos',
		'id_abogado',
		'fecha_fin',
		'id_razones_estado',
		'id_proveedor',
),
)); ?>
