<?php
$this->breadcrumbs=array(
	'Bancos'=>array('index'),
	$model->id_banco,
);

$this->menu=array(
array('label'=>'List Banco','url'=>array('index')),
array('label'=>'Create Banco','url'=>array('create')),
array('label'=>'Update Banco','url'=>array('update','id'=>$model->id_banco)),
array('label'=>'Delete Banco','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_banco),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Banco','url'=>array('admin')),
);
?>

<h1>View Banco #<?php echo $model->id_banco; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_banco',
		'descripcion',
),
)); ?>
