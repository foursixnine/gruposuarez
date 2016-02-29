<?php
$this->breadcrumbs=array(
	'Cobroses'=>array('index'),
	$model->id_cobros,
);

$this->menu=array(
array('label'=>'List Cobros','url'=>array('index')),
array('label'=>'Create Cobros','url'=>array('create')),
array('label'=>'Update Cobros','url'=>array('update','id'=>$model->id_cobros)),
array('label'=>'Delete Cobros','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_cobros),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Cobros','url'=>array('admin')),
);
?>

<h1>View Cobros #<?php echo $model->id_cobros; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_cobros',
		'fecha_cobro',
		'id_proyecto',
		'monto_total',
		'monto_abonado',
		'id_cliente',
		'id_tipo_cobro',
		'id_cartera',
		'monto_liquidacion',
		'monto_ultimo_pago',
),
)); ?>
