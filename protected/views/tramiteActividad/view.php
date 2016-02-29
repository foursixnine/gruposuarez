<?php
$this->breadcrumbs=array(
	'Tramite Actividads'=>array('index'),
	$model->id_tramite_actividad,
);

$this->menu=array(
array('label'=>'List TramiteActividad','url'=>array('index')),
array('label'=>'Create TramiteActividad','url'=>array('create')),
array('label'=>'Update TramiteActividad','url'=>array('update','id'=>$model->id_tramite_actividad)),
array('label'=>'Delete TramiteActividad','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_tramite_actividad),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage TramiteActividad','url'=>array('admin')),
);
?>

<h1>View TramiteActividad #<?php echo $model->id_tramite_actividad; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_tramite_actividad',
		'id_tramite',
		'fecha_tramite_actividad',
		'id_estado',
		'id_paso',
		'observaciones',
),
)); ?>
