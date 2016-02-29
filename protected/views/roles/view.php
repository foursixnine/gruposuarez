<?php
$this->breadcrumbs=array(
	'Roles'=>array('index'),
	$model->id_rol,
);

$this->menu=array(
array('label'=>'List Roles','url'=>array('index')),
array('label'=>'Create Roles','url'=>array('create')),
array('label'=>'Update Roles','url'=>array('update','id'=>$model->id_rol)),
array('label'=>'Delete Roles','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_rol),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Roles','url'=>array('admin')),
);
?>

<h1>View Roles #<?php echo $model->id_rol; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_rol',
		'descripcion',
),
)); ?>
