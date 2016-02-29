<?php
$this->breadcrumbs=array(
	'Corte Cartera Mes'=>array('index'),
	$model->id_corte_cartera_mes,
);

$this->menu=array(
array('label'=>'List CorteCarteraMes','url'=>array('index')),
array('label'=>'Create CorteCarteraMes','url'=>array('create')),
array('label'=>'Update CorteCarteraMes','url'=>array('update','id'=>$model->id_corte_cartera_mes)),
array('label'=>'Delete CorteCarteraMes','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_corte_cartera_mes),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage CorteCarteraMes','url'=>array('admin')),
);
?>

<h1>View CorteCarteraMes #<?php echo $model->id_corte_cartera_mes; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_corte_cartera_mes',
		'monto',
		'mes',
),
)); ?>
