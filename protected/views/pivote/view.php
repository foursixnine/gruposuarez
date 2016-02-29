<?php
$this->breadcrumbs=array(
	'Pivotes'=>array('index'),
	$model->id_calculo_vencidad,
);

$this->menu=array(
array('label'=>'List Pivote','url'=>array('index')),
array('label'=>'Create Pivote','url'=>array('create')),
array('label'=>'Update Pivote','url'=>array('update','id'=>$model->id_calculo_vencidad)),
array('label'=>'Delete Pivote','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_calculo_vencidad),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Pivote','url'=>array('admin')),
);
?>

<h1>View Pivote #<?php echo $model->id_calculo_vencidad; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_calculo_vencidad',
		'monto',
		'treinta',
		'sesenta',
		'noventa',
		'cientoveinte',
		'id_crm_proyecto',
		'mes',
),
)); ?>
