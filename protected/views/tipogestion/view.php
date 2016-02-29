<?php
$this->breadcrumbs=array(
	'Tipogestions'=>array('index'),
	$model->id_tipo_gestion,
);

$this->menu=array(
array('label'=>'List Tipogestion','url'=>array('index')),
array('label'=>'Create Tipogestion','url'=>array('create')),
array('label'=>'Update Tipogestion','url'=>array('update','id'=>$model->id_tipo_gestion)),
array('label'=>'Delete Tipogestion','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_tipo_gestion),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Tipogestion','url'=>array('admin')),
);
?>

<h1>View Tipogestion #<?php echo $model->id_tipo_gestion; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_tipo_gestion',
		'descripcion',
),
)); ?>
