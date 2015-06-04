<?php
$this->breadcrumbs=array(
	'Pago Remuneracions'=>array('index'),
	$model->id_pago_remuneracion,
);

$this->menu=array(
array('label'=>'Listar - Plan de Remuneracion','url'=>array('index')),
array('label'=>'Crear - Plan de Remuneracion','url'=>array('create')),
array('label'=>'Actualizar - Plan de Remuneracion','url'=>array('update','id'=>$model->id_pago_remuneracion)),
array('label'=>'Eliminar - Plan de Remuneracion','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_pago_remuneracion),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Administrar - Plan de Remuneracion','url'=>array('admin')),
);
?>

<h1>Plan de Remuneraci&oacute;n #<?php echo $model->id_pago_remuneracion; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'idTipoCartera.descripcion',
		'porcentaje',
		'dinero',
),
)); ?>
