<?php
$this->breadcrumbs=array(
	'Gestion Seguimientos'=>array('index'),
	$model->id_gestion_seguimiento,
);

$this->menu=array(
array('label'=>'List GestionSeguimiento','url'=>array('index')),
array('label'=>'Create GestionSeguimiento','url'=>array('create')),
array('label'=>'Update GestionSeguimiento','url'=>array('update','id'=>$model->id_gestion_seguimiento)),
array('label'=>'Delete GestionSeguimiento','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_gestion_seguimiento),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage GestionSeguimiento','url'=>array('admin')),
);
?>

<h1>View GestionSeguimiento #<?php echo $model->id_gestion_seguimiento; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_gestion_seguimiento',
		'id_gestion',
		'fecha_gestion_seguimiento',
		'observaciones',
),
)); ?>
