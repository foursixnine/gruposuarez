<?php
$this->breadcrumbs=array(
	'Pagos'=>array('index'),
	$model->id_pago,
);

$this->menu=array(
array('label'=>'List Pago','url'=>array('index')),
array('label'=>'Create Pago','url'=>array('create')),
array('label'=>'Update Pago','url'=>array('update','id'=>$model->id_pago)),
array('label'=>'Delete Pago','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_pago),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Pago','url'=>array('admin')),
);
?>

<h1>View Pago #<?php echo $model->id_pago; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_pago',
		'fecha_pago',
		'id_proyecto',
		'monto_total',
		'id_cliente',
		'id_tipo_cobro',
		'trienta',
		'sesenta',
		'noventa',
		'cientoveiente',
),
)); ?>
