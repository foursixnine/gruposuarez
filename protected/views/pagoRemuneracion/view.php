<?php
$this->breadcrumbs=array(
	'Pago Remuneracions'=>array('index'),
	$model->id_pago_remuneracion,
);

$this->menu=array(
array('label'=>'List PagoRemuneracion','url'=>array('index')),
array('label'=>'Create PagoRemuneracion','url'=>array('create')),
array('label'=>'Update PagoRemuneracion','url'=>array('update','id'=>$model->id_pago_remuneracion)),
array('label'=>'Delete PagoRemuneracion','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_pago_remuneracion),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage PagoRemuneracion','url'=>array('admin')),
);
?>

<h1>View PagoRemuneracion #<?php echo $model->id_pago_remuneracion; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_pago_remuneracion',
		'porcentaje',
		'dinero',
		'bono',
),
)); ?>
