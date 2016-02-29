<?php
$this->breadcrumbs=array(
	'Carteras'=>array('index'),
	$model->id_cartera,
);

$this->menu=array(
array('label'=>'List Cartera','url'=>array('index')),
array('label'=>'Create Cartera','url'=>array('create')),
array('label'=>'Update Cartera','url'=>array('update','id'=>$model->id_cartera)),
array('label'=>'Delete Cartera','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_cartera),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Cartera','url'=>array('admin')),
);
?>

<h1>View Cartera #<?php echo $model->id_cartera; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_cartera',
		'descripcion',
),
)); ?>
