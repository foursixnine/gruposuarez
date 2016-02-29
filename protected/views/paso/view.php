<?php
$this->breadcrumbs=array(
	'Pasos'=>array('index'),
	$model->id_paso,
);

$this->menu=array(
array('label'=>'List Paso','url'=>array('index')),
array('label'=>'Create Paso','url'=>array('create')),
array('label'=>'Update Paso','url'=>array('update','id'=>$model->id_paso)),
array('label'=>'Delete Paso','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_paso),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Paso','url'=>array('admin')),
);
?>

<h1>View Paso #<?php echo $model->id_paso; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_paso',
		'descripcion',
),
)); ?>
