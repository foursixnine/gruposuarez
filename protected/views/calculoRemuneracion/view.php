<?php
$this->breadcrumbs=array(
	'Calculo Remuneracions'=>array('index'),
	$model->id_calculo_remuneracion,
);

$this->menu=array(
array('label'=>'List calculoRemuneracion','url'=>array('index')),
array('label'=>'Create calculoRemuneracion','url'=>array('create')),
array('label'=>'Update calculoRemuneracion','url'=>array('update','id'=>$model->id_calculo_remuneracion)),
array('label'=>'Delete calculoRemuneracion','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_calculo_remuneracion),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage calculoRemuneracion','url'=>array('admin')),
);
?>

<h1>View calculoRemuneracion #<?php echo $model->id_calculo_remuneracion; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_calculo_remuneracion',
		'id_usuario',
		'resultado',
		'id_pago_remuneracion',
		'cumplimiento',
),
)); ?>
